<template>
    <div class="px-5 border-top py-5">
        <div class="h4 d-flex align-item-center mb-5">
            Custom Token
            <v-spacer></v-spacer>
            <v-btn color="grey-darken-4" dark class="elevation-0" @click="tokenbox = true">Create New</v-btn>
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
                            <th scope="row"><input type="checkbox"></th>
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
                            <th scope="row"><input type="checkbox"></th>
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
                                <button class="btn-sm btn btn-dark " @click="viewItem(user.id)"><i class="fa fa-pencil"
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


        <v-dialog v-model="tokenbox" style="max-width: 700px;">

            <v-card>
                <v-toolbar dark color="grey-darken-4">
                    <v-toolbar-title>Token Details</v-toolbar-title>
                    <v-spacer></v-spacer>
                    <v-btn icon dark @click="tokenbox = false">
                        <v-icon>mdi-close</v-icon>
                    </v-btn>
                </v-toolbar>
                <v-card-text>
                    <v-row>
                        <v-col cols="12" md="6">
                            <v-text-field variant="outlined" label="Name" hide-details v-model="name"></v-text-field>
                        </v-col>
                        <v-col cols="12" md="6">
                            <v-text-field variant="outlined" label="symbol" hide-details v-model="symbol"></v-text-field>
                        </v-col>
                        <v-col cols="12" md="6">
                            <v-text-field variant="outlined" label="Network" hide-details v-model="chain"></v-text-field>
                        </v-col>
                        <v-col cols="12" md="6">
                            <v-text-field variant="outlined" label="type" hide-details v-model="type"></v-text-field>
                        </v-col>
                        <v-col cols="12" md="6">
                            <v-text-field variant="outlined" label="supply" hide-details v-model="supply"></v-text-field>
                        </v-col>
                        <v-col cols="12" md="6">
                            <v-text-field variant="outlined" label="withdraw fee" hide-details
                                v-model="withdraw_fee"></v-text-field>
                        </v-col>
                        <v-col cols="12" md="6">
                            <v-text-field variant="outlined" label="Withdraw Min" hide-details
                                v-model="withdraw_min"></v-text-field>
                        </v-col>
                        <v-col cols="12" md="6">
                            <v-text-field variant="outlined" label="Withdraw Max" hide-details
                                v-model="withdraw_max"></v-text-field>
                        </v-col>
                        <v-col cols="12" md="6">
                            <v-text-field variant="outlined" label="Hash" hide-details v-model="hash"></v-text-field>
                        </v-col>
                        <v-col cols="12" md="6">
                            <v-text-field variant="outlined" label="Decimals" hide-details
                                v-model="decimals"></v-text-field>
                        </v-col>
                        <v-col cols="12" md="6">
                            <v-text-field variant="outlined" label="cap" hide-details
                                v-model="cap"></v-text-field>
                        </v-col>
                        <v-col cols="12" md="6">
                            <v-text-field variant="outlined" label="Contract address" hide-details
                                v-model="address"></v-text-field>
                        </v-col>
                        <v-col cols="12" md="12">
                            <v-text-field variant="outlined" label="Receiving wallet address" hide-details
                                v-model="receiving_wallet_address"></v-text-field>
                        </v-col>
                        <v-col cols="12" md="3">
                            <v-btn color="grey-darken-4"  size="large" @click="addcustomtoken">Submit</v-btn>
                        </v-col>
                    </v-row>
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



        chain: null,
        symbol: null,
        name: null,
        account_id: null,
        address: null,
        holder_address: null,
        cap: 50000000,
        supply: '100000000',
        hash: null,
        decimals: 8,
        testnet: null,
        base_pair: 'USDT',
        type: null,
        status: 1,
        withdraw_fee: 1,
        withdraw_min: 1.00000000,
        withdraw_max: 10000.00000000,
        master_wallet_address: null,
        master_wallet_balance: null,
        receiving_wallet_address: null,
        memonic: null,
        xpub: null,


    }),
    methods: {

        addcustomtoken() {
            var dataString = {
                chain: this.chain,
                symbol: this.symbol,
                name: this.name,
                account_id: this.account_id,
                address: this.address,
                holder_address: this.holder_address,
                cap: this.cap,
                supply: this.supply,
                hash: this.hash,
                decimals: this.decimals,
                testnet: this.testnet,
                base_pair: this.base_pair,
                type: this.type,
                status: this.status,
                withdraw_fee: this.withdraw_fee,
                withdraw_min: this.withdraw_min,
                withdraw_max: this.withdraw_max,
                master_wallet_address: this.master_wallet_address,
                master_wallet_balance: this.master_wallet_balance,
                receiving_wallet_address: this.receiving_wallet_address,
                memonic: this.memonic,
                xpub: this.xpub,
            }

            axios.post('/api/addcustomtoken', dataString).then((response) => {
                console.log(response.data);
               if(response.data.status == 200){
                   this.get_custom_tokens();
                    this.tokenbox = false;
               }
            })
        },

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