<template>
    <div class="px-5 border-top py-5">
        <div class="h4 d-flex align-item-center mb-5">
           Custom Token
            <v-spacer></v-spacer>
            <v-btn color="grey-darken-4" dark class="elevation-0"  @click="tokenbox = true">Create New</v-btn>
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
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Token</th>
                            <th scope="col">Network</th>
                            <th scope="col">Account</th>
                            <th scope="col">Wallet Address</th>
                            <th scope="col">Balance</th>
                            <th scope="col">supply</th>
                            <th scope="col">Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody v-if="users.data">

                        <tr v-for="user in users.data">
                            <th scope="row">{{ user.name }}</th>
                            <th scope="row">{{ user.chain }}</th>
                            <th scope="row">{{ user.account_id }}</th>
                            <th scope="row">{{ user.master_wallet_address }}</th>
                            <th scope="row">{{ user.master_wallet_balance }}</th>
                            <th scope="row">{{ user.supply }}</th>
                            <th scope="row">{{ user.created_at }}</th>


                            <th scope="row">
                                <button class="btn-sm btn btn-danger mr-2" @click="deletItme(user.id)"><i
                                        class="fa fa-trash-o" aria-hidden="true"></i></button>
                                <button class="btn-sm btn btn-info " @click="viewItem(user.id)"><i class="fa fa-pencil"
                                        aria-hidden="true"></i></button>
                            </th>

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
            </v-card-text>
        </v-card>


        <v-dialog v-model="tokenbox" style="max-width: 500px;">
            <v-card>
                <v-card-text>
                    <div class="modal-body flex-grow-1">
                        <div class="mb-1">
                            <label class="form-label" for="symbol">Symbol</label>
                            <input type="text" class="form-control" name="symbol">
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" class="form-control" name="name">
                            <small class="text-danger">*No Spaces</small>
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="cap">Total Cap</label>
                            <input type="number" class="form-control" name="cap">
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="supply">Supply</label>
                            <input type="number" class="form-control" name="supply">
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="decimals">Digits</label>
                            <input type="number" class="form-control" name="decimals">
                            <small class="text-warning">Number of decimal points</small>
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="hash">Hash</label>
                            <input type="text" class="form-control" name="hash">
                            <small class="text-warning">*Your smart contract creation transaction id</small>
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="token_address">Token Address</label>
                            <input type="text" class="form-control" name="token_address">
                        </div>
                        <div class="mb-1">
                            <label class="form-label" for="holder_address">Holder Address</label>
                            <input type="text" class="form-control" name="holder_address">
                            <small class="text-warning">*Holder address must be identical to the blockchain wallet
                                address
                                to use same Xpub for wallets generation</small>
                        </div>
                        <button type="submit"
                            class="btn btn-primary data-submit me-1 waves-effect waves-float waves-light">Add</button>
                        <button type="reset" class="btn btn-outline-secondary waves-effect" data-bs-dismiss="modal"
                            @click="tokenbox = false">Cancel</button>
                    </div>
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

        tokenbox: false,

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
            this.get_custom_tokens();
        },
        next() {
            this.get_custom_tokens();
        },
        prev() {
            this.get_custom_tokens();
        },

        get_custom_tokens() {
            this.users = [];
            axios.get('/api/get_custom_tokens?page=' + this.pagination.current).then((response) => {
                this.users = response.data;
                this.pagination.current = response.data.current_page;
                this.pagination.total = response.data.last_page;
            })
        },

        filterdata() {
            this.get_custom_tokens();
        },
    },
    created() {
        this.get_custom_tokens()
    }
}
</script>