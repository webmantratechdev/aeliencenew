<template>
    <div class="px-5 border-top py-5">
        <div class="h4 d-flex align-item-center">
            Pending KYC
            <v-spacer></v-spacer>
            <div style="max-width:300px;display: flex;">
                <input type="text" class="form-control" placeholder="Your Email" v-model="searchkey">
                <div class="input-group-append">
                    <button class="input-group-text" @click="filterdata">Find</button>
                </div>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Referral</th>
                    <th scope="col">Regd. Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <tr v-for="user in users.data">
                    <th scope="row">{{ user.name }}</th>
                    <th scope="row">{{ user.email }}</th>
                    <th scope="row">{{ user.phone }}</th>
                    <th scope="row">{{ user.refferal_code }}</th>
                    <th scope="row">{{ user.created_at }}</th>


                    <th scope="row">
                        <select class="form-select" aria-label="Default select example"
                            @change="onChange(user.id, $event)">
                            <option value="A" v-if="user.status == 'A'" selected>Approve</option>
                            <option value="A" v-else>Approve</option>
                            <option value="M" v-if="user.status == 'M'" selected>Missing</option>
                            <option value="M" v-else>Missing</option>
                            <option value="P" v-if="user.status == 'P'" selected>Pending</option>
                            <option value="P" v-else>Pending</option>
                        </select>
                    </th>

                    <th scope="row">
                        <button class="btn-sm btn btn-danger mr-2" @click="deletItme(user.id)"><i class="fa fa-trash-o"
                                aria-hidden="true"></i></button>
                        <button class="btn-sm btn btn-info " @click="viewItem(user.id)"><i class="fa fa-pencil"
                                aria-hidden="true"></i></button>
                    </th>

                </tr>

            </tbody>
        </table>

        <v-pagination v-model="pagination.current" :total-visible="7" :length="pagination.total" @next="next()"
            @prev="prev" @update:modelValue="handlePageChange"></v-pagination>


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
            this.getAllUsers();
        },
        next() {
            this.getAllUsers();
        },
        prev() {
            this.getAllUsers();
        },

        getAllUsers() {
            axios.get('/api/getAllUsers?page=' + this.pagination.current+'&kycstatus=P').then((response) => {
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
                    this.getAllUsers();
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