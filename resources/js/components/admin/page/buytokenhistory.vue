<template>
    <div class="px-5 border-top py-5">
        <div class="h4 d-flex align-item-center mb-5">
            Buy Token History
            <v-spacer></v-spacer>
            <v-btn color="grey-darken-4" dark class="elevation-0">Create New</v-btn>
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

                    <v-col cols="12" md="2"><v-btn color="grey-darken-4" class="elevation-0" @click="filterdata" block>Search</v-btn></v-col>
                </v-row>
            </v-card-text>
        </v-card>

        <v-card class="elevation-0">
            <v-card-title class="d-flex align-center">
                <p>Records</p>
                <v-spacer></v-spacer>
                <v-pagination  density="compact" v-model="pagination.current" :total-visible="7" :length="pagination.total" @next="next()"
                    @prev="prev" @update:modelValue="handlePageChange"></v-pagination>
            </v-card-title>
            <v-card-text>

                <table class="table table">
                    <thead>
                        <tr>
                            <th scope="col"><input type="checkbox"></th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">symbol</th>
                            <th scope="col">Cost</th>
                            <th scope="col">Amount (USDT)</th>
                            <th scope="col">TxId</th>
                     
                            <th scope="col">Status</th>
                            <th scope="col" style="text-align:right">Action</th>
                        </tr>
                    </thead>
                    <tbody v-if="users.data">

                        <tr v-for="user in users.data">
                            <th scope="row"><input type="checkbox"></th>
                            <th scope="row">{{ user.name }}</th>
                            <th scope="row">{{ user.phone }}</th>
                            <th scope="row">{{ user.symbol }}</th>
                            <th scope="row">{{ user.cost }}</th>
                            <th scope="row">{{ user.amount }}</th>
                            <th scope="row">{{ user.token_txtid }}</th>
                            <th scope="row">
                               <v-chip v-if="user.token_txtid" color="green">Captured</v-chip>
                               <v-chip v-else color="red">failure</v-chip>
                            </th>

                            <th scope="row" style="text-align:right">
                                <button class="btn-sm btn btn-danger mr-2" @click="deletItme(user.id)"><i
                                        class="fa fa-trash-o" aria-hidden="true"></i></button>
                                <button class="btn-sm btn btn-dark " @click="viewItem(user.id)"><i class="fa fa-pencil"
                                        aria-hidden="true"></i></button>
                            </th>

                        </tr>

                    </tbody>
                    <tbody v-else>
                        <tr v-for="nu in 10" class="order_item">
                            <td colspan="10" style="padding: 15px 0px;">
                                <v-progress-linear color="indigo-lighten-5" indeterminate model-value="20"
                                    :height="12"></v-progress-linear>
                            </td>
                        </tr>
                    </tbody>

                </table>



            </v-card-text>
        </v-card>




        <v-snackbar v-model="snackbar">
            {{ snackbartext }}
        </v-snackbar>


    </div>
</template>

<script>
export default {
    data: () => ({



        users: [],
        searchkey: '',
        pagination: {
            current: 1,
            total: 0
        },

        snackbar: false,
        snackbartext: null,

    }),
    methods: {
        handlePageChange() {
            this.getAllbuytokenHistory();
        },
        next() {
            this.getAllbuytokenHistory();
        },
        prev() {
            this.getAllbuytokenHistory();
        },

        getAllbuytokenHistory() {
            this.users = [];
            axios.get('/api/getAllbuytokenHistory?page=' + this.pagination.current).then((response) => {
                this.users = response.data;
                this.pagination.current = response.data.current_page;
                this.pagination.total = response.data.last_page;
            })
        },

        filterdata() {
            this.getAllbuytokenHistory();
        },

        onChange(userid, event) {

          
        },
        deletItme(userid) {
           
        },
        viewItem(userid) {
         
        }


    },
    created() {
        this.getAllbuytokenHistory()
    }
}
</script>