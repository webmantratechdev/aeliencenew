<template>
    <div class="px-5 border-top py-5">
        <div class="h4 d-flex align-item-center mb-5">
            Pending Stacking [ {{ users.total }} ]
            <v-spacer></v-spacer>
        </div>

        <v-card class="mb-5 elevation-0">
            <v-card-text>
                <v-row>
                    <v-col cols="12" md="6">
                        <v-text-field prepend-inner-icon="mdi-magnify" density="compact"
                            placeholder="What are you looking for?" variant="outlined" hide-details=""
                            v-model="searchkey"></v-text-field>
                    </v-col>
                    <v-col cols="12" md="2">
                        <v-text-field density="compact" placeholder="Status" variant="outlined"
                            hide-details=""></v-text-field>
                    </v-col>
                    <v-col cols="12" md="2">
                        <v-text-field density="compact" variant="outlined" hide-details="" type="date"></v-text-field>
                    </v-col>

                    <v-col cols="12" md="2"><v-btn color="grey-darken-4" class="elevation-0" @click="filterdata"
                            block>Search</v-btn></v-col>
                </v-row>
            </v-card-text>
        </v-card>

        <v-card class="elevation-0">
            <v-card-title class="d-flex align-center">
                <p>Records</p>
                <v-spacer></v-spacer>
                <v-pagination density="compact" v-model="pagination.current" :total-visible="7" :length="pagination.total"
                    @next="next()" @prev="prev" @update:modelValue="handlePageChange"></v-pagination>
            </v-card-title>
            <v-card-text>
                <table class="table table">
                    <thead>
                        <tr>
                            <th scope="col"><input type="checkbox"></th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Deposit Address</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody v-if="users.data">

                        <tr v-for="user in users.data">
                            <th scope="col"><input type="checkbox"></th>
                            <th scope="row">{{ user.name }}</th>
                            <th scope="row">{{ user.phone }}</th>
                            <th scope="row">{{ user.email }}</th>
                            <th scope="row">{{ user.address }}</th>
                            <th scope="row">{{ user.balance }} {{ user.symbol }}</th>
                            <th scope="row">{{ user.created_at }}</th>
                            <th scope="row">
                                <button class="btn-sm btn btn-warning mr-2"
                                    @click="stacknow(user.user_id, user.id, user.balance)"
                                    title="Stack Now"><v-icon>mdi-send</v-icon></button>
                                <button class="btn-sm btn btn-dark" title="Transaction History"
                                    @click="transactionhistory(user.id)"><v-icon>mdi-swap-horizontal</v-icon></button>
                            </th>
                        </tr>

                    </tbody>
                    <tbody v-else>
                        <tr v-for="nu in 10" class="order_item">
                            <td colspan="8" style="padding: 15px 0px;">
                                <v-progress-linear color="indigo-lighten-5" indeterminate model-value="20"
                                    :height="12"></v-progress-linear>
                            </td>
                        </tr>
                    </tbody>

                </table>

            </v-card-text>
        </v-card>


        <v-dialog max-width="400" v-model="stackconfirm">
            <v-card>
                <v-toolbar dark color="grey-darken-4">
                    <v-toolbar-title>Stack Amount</v-toolbar-title>
                    <v-spacer></v-spacer>
                    <v-btn icon dark @click="stackconfirm = false">
                        <v-icon>mdi-close</v-icon>
                    </v-btn>
                </v-toolbar>
                <v-card-text class="py-10">

                    <v-text-field variant="outlined" label="Total Amount" v-model="availableAmt"></v-text-field>
                    <v-text-field variant="outlined" label="Stacking Amount" v-model="deductAmt"></v-text-field>
                   
                    <v-btn @click="stacknowconfirm" :loading="stacknowconfirmload" color="grey-darken-4" size="large">Stack Confirm</v-btn>
                </v-card-text>
            </v-card>
        </v-dialog>

        <v-snackbar v-model="snackbar">
            {{ snackbartext }}
        </v-snackbar>


    </div>
</template>

<script>
export default {
    data: () => ({

        stackconfirm: false,

        users: [],
        searchkey: '',
        pagination: {
            current: 1,
            total: 0
        },

        snackbar: false,
        snackbartext: null,



        userid: null,
        coin_id: null,
        deductAmt: null,
        availableAmt: null,

        stacknowconfirmload: false,

    }),
    methods: {
        handlePageChange() {
            this.pendingstacking();
        },
        next() {
            this.pendingstacking();
        },
        prev() {
            this.pendingstacking();
        },

        pendingstacking() {
            this.users = [];
            axios.get('/api/pendingstacking?page=' + this.pagination.current + '&keyword=' + this.searchkey).then((response) => {

                console.log(response.data);
                this.users = response.data;
                this.pagination.current = response.data.current_page;
                this.pagination.total = response.data.last_page;
            })
        },

        filterdata() {
            this.pendingstacking();
        },


        stacknow(userid, coin_id, amount) {
            this.userid = userid;
            this.coin_id = coin_id;
            this.deductAmt = amount;
            this.availableAmt = amount;
            this.stackconfirm = true;
        },


        stacknowconfirm() {
            
            this.stacknowconfirmload = true;

                var dataString = {
                    userid: this.userid,
                    coin_id: this.coin_id,
                    deductAmt: this.deductAmt,
                    availableAmt: this.availableAmt,
                }


                axios.post("/api/createstackinglog", dataString).then((response) => {

                    if (response.data.txId) {

                        this.updatewalletamountAfterstack(response.data.txId);

                        this.stackconfirm = false;
                       
                    } else {
                        this.snackbar = true;
                        this.snackbartext = `Something went wrong. Please try after sometime..`;
                    }

                    this.stacknowconfirmload = false;

                })

            
        },
        updatewalletamountAfterstack(txtid){
            axios.get("/api/updatewalletamountAfterstack/"+txtid).then((response) => {
                this.pendingstacking();
            })
        },

        transactionhistory(userid) {

        }


    },
    created() {
        this.pendingstacking()
    }
}
</script>