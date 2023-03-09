<template>
    <div class="px-5 border-top py-5">
        <div class="h4 d-flex align-item-center mb-5">
            Wallet History
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
                            <th scope="col">From</th>
                            <th scope="col">To</th>
                            <th scope="col">Type</th>
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
                            <th scope="row">{{ user.owner_address }}</th>
                            <th scope="row">{{ user.to_address }}</th>
                            <th scope="row">{{ user.operationType }}</th>
                            <th scope="row">{{ user.amount }} {{ user.depositincurrencu }}</th>
                            <th scope="row">{{ user.created_at }}</th>
                            <th scope="row">
                                <button class="btn-sm btn btn-dark " @click="viewItem(user.id)"><i class="fa fa-eye"
                                        aria-hidden="true"></i></button>
                            </th>
                        </tr>

                    </tbody>
                    <tbody v-else>
                        <tr v-for="nu in 10" class="order_item">
                            <td colspan="9" style="padding: 15px 0px;">
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


        headers: [
            {
                title: 'Dessert (100g serving)',
                align: 'start',
                sortable: false,
                key: 'name',
            },
            { title: 'Calories', align: 'end', key: 'calories' },
            { title: 'Fat (g)', align: 'end', key: 'fat' },
            { title: 'Carbs (g)', align: 'end', key: 'carbs' },
            { title: 'Protein (g)', align: 'end', key: 'protein' },
            { title: 'Iron (%)', align: 'end', key: 'iron' },
        ],

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
            this.getAllUsers();
        },
        next() {
            this.getAllUsers();
        },
        prev() {
            this.getAllUsers();
        },

        getAllUsers() {

            var keyword = this.$route.query.keyword;
            if(keyword){
                this.searchkey = keyword;
            }

            this.users = [];
            axios.get('/api/getAllDeposit?page=' + this.pagination.current + '&keyword=' + this.searchkey).then((response) => {
                this.users = response.data;
                this.pagination.current = response.data.current_page;
                this.pagination.total = response.data.last_page;
            })
        },

        filterdata() {
            this.getAllUsers();
        },

        onChange(userid, event) {

            var dataString = {
                userid: userid,
                status: event.target.value,
            }

            axios.post('/api/updateuserstatus', dataString).then((response) => {
                if (response.data == 1) {
                    this.snackbar = true;
                    this.snackbartext = 'KYC status has been updated..';
                }
            })
        },
        
        viewItem(userid) {
         
        }


    },
    created() {
        this.getAllUsers()
    }
}
</script>