<template>
    <div class="px-5 border-top py-5">
        <div class="h4 d-flex align-item-center">
            All Deposit
            <v-spacer></v-spacer>
            <div style="max-width:300px;display: flex;">
                <input type="text" class="form-control" placeholder="Your Email" v-model="searchkey">
                <div class="input-group-append">
                    <button class="input-group-text" @click="filterdata">Find</button>
                </div>
            </div>
        </div>


        <table class="table table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Deposit Address</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>
            <tbody v-if="users.data">

                <tr v-for="user in users.data">
                    <th scope="row">{{ user.name }}</th>
                    <th scope="row">{{ user.phone }}</th>
                    <th scope="row">{{ user.owner_address }}</th>
                    <th scope="row">{{ user.amount }} {{ user.depositincurrencu }}</th>
                    <th scope="row">{{ user.created_at }}</th>
                </tr>

            </tbody>
            <tbody v-else>
                <tr v-for="nu in 10" class="order_item">
                    <td colspan="7" style="padding: 15px 0px;">
                        <v-progress-linear color="indigo-lighten-5" indeterminate model-value="20"
                            :height="12"></v-progress-linear>
                    </td>
                </tr>
            </tbody>

        </table>

        <v-pagination v-model="pagination.current" :total-visible="7" :length="pagination.total" @next="next()" @prev="prev"
            @update:modelValue="handlePageChange"></v-pagination>


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
            this.users = [];
            axios.get('/api/getAllDeposit?page=' + this.pagination.current+'&keyword='+this.searchkey).then((response) => {
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
        deletItme(userid) {
            if (confirm('Are you sure want to delete??')) {
                var dataString = {
                    userid: userid,
                }
                axios.post('/api/deleteuser', dataString).then((response) => {
                    if (response.data == 1) {
                        this.getAllUsers()
                        this.snackbar = true;
                        this.snackbartext = 'deleted...';
                    }
                })
            }
        },
        viewItem(userid) {
            this.$router.push('/console/users/' + userid);
        }


    },
    created() {
        this.getAllUsers()
    }
}
</script>