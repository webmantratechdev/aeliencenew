<template>
    <div class="px-5 border-top py-5">
        <div class="h4 d-flex align-item-center mb-5">
            All Wallet [{{ users.total }}]
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
                                <button class="btn-sm btn btn-dark" title="Transaction History"
                                    @click="transactionhistory(user.address)"><v-icon>mdi-swap-horizontal</v-icon></button>
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
            this.getAllWallet();
        },
        next() {
            this.getAllWallet();
        },
        prev() {
            this.getAllWallet();
        },

        getAllWallet() {
            this.users = [];
            axios.get('/api/getAllWallet?page=' + this.pagination.current + '&keyword=' + this.searchkey).then((response) => {
                this.users = response.data;
                this.pagination.current = response.data.current_page;
                this.pagination.total = response.data.last_page;
            })
        },

        filterdata() {
            this.getAllWallet();
        },

        
        transactionhistory(userid) {
            this.$router.push('/console/deposit?keyword='+userid);
        }


    },
    created() {
        this.getAllWallet()
    }
}
</script>