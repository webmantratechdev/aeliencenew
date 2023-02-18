<template>
    <div class="px-5 border-top py-5">
        <div class="h4 d-flex align-item-center">
            Log
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
                    <th scope="col">symbol</th>
                    <th scope="col">cost</th>
                    <th scope="col">staked</th>
                    <th scope="col">last_stake_date</th>
                    <th scope="col">Status</th>
                    <th scope="col">start_date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <tr v-for="user in users.data">
                    <th scope="row">{{ user.symbol }}</th>
                    <th scope="row">{{ user.cost }}</th>
                    <th scope="row">{{ user.staked }}</th>
                    <th scope="row">{{ user.last_stake_date }}</th>
                    <th scope="row">
                            <span v-if="user.status == 1" selected>Success</span>
                            <span  v-else selected>Faild</span>
                    </th>
                    <th scope="row">{{ user.created_at }}</th>
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
            this.getStackingLog();
        },
        next() {
            this.getStackingLog();
        },
        prev() {
            this.getStackingLog();
        },

        getStackingLog() {
            axios.get('/api/getStackingLog?page=' + this.pagination.current).then((response) => {
                this.users = response.data;
                this.pagination.current = response.data.current_page;
                this.pagination.total = response.data.last_page;
            })
        },

        filterdata() {
            this.getStackingLog();
        },

        onChange(userid, event) {

            var dataString = {
                userid: userid,
                status: event.target.value,
            }

            axios.post('/api/getStackingLog', dataString).then((response) => {
                if (response.data == 1) {
                    this.snackbar = true;
                    this.snackbartext = 'KYC status has been updated..';
                }
            })
        },
        deletItme(userid) {
           
        },
        viewItem(userid) {
         
        }


    },
    created() {
        this.getStackingLog()
    }
}
</script>