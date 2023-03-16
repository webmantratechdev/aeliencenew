<template>
    <div class="px-5 border-top py-5">
        <div class="h4 d-flex align-item-center mb-5">
            Buy Token
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
                            <th scope="col">symbol</th>
                            <th scope="col">network</th>
                            <th scope="col">Holder Address</th>
                            <th scope="col">Gas Charge</th>
                            <th scope="col">Status</th>
                            <th scope="col" style="text-align:right">Action</th>
                        </tr>
                    </thead>
                    <tbody v-if="users.data">

                        <tr v-for="user in users.data">
                            <th scope="row"><input type="checkbox"></th>
                            <th scope="row">{{ user.name }}</th>
                            <th scope="row">{{ user.symbol }}</th>
                            <th scope="row">{{ user.network }}</th>
                            <th scope="row">{{ user.holder_address }}</th>
                            <th scope="row">{{ user.gas_charge }}</th>
                        
                            <th scope="row">
                                <v-switch color="orange" :model-value="true" v-if="user.status == 1" label="on"
                                    v-on:change="onChange(user.id)"></v-switch>
                                <v-switch :model-value="false" v-else label="on"
                                    v-on:change="onChange(user.id)"></v-switch>
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
            this.getAllbuytoken();
        },
        next() {
            this.getAllbuytoken();
        },
        prev() {
            this.getAllbuytoken();
        },

        getAllbuytoken() {
            this.users = [];
            axios.get('/api/getAllbuytoken?page=' + this.pagination.current).then((response) => {
                this.users = response.data;
                this.pagination.current = response.data.current_page;
                this.pagination.total = response.data.last_page;
            })
        },

        filterdata() {
            this.getAllbuytoken();
        },

        onChange(userid, event) {

          
        },
        deletItme(userid) {
           
        },
        viewItem(userid) {
         
        }


    },
    created() {
        this.getAllbuytoken()
    }
}
</script>