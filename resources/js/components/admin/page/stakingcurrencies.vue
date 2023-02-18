<template>
    <div class="px-5 border-top py-5">
        <div class="h4 d-flex align-item-center">
            Staking Currencies
            <v-divider class="mx-4" inset vertical></v-divider>
            <v-btn class="dark" color="warning" prepend-icon="mdi-plus" @click="currencybox = true">New Currency</v-btn>
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
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">symbol</th>
                    <th scope="col">network</th>
                    <th scope="col">Amount</th>
                    <th scope="col">period</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <tr v-for="user in users.data">
                    <th scope="row"><v-img :src="'/images/'+user.icon" style="width: 50px;"></v-img></th>
                    <th scope="row">{{ user.title }}</th>
                    <th scope="row">{{ user.symbol }}</th>
                    <th scope="row">{{ user.network }}</th>
                    <th scope="row">{{ user.amount }}</th>
                    <th scope="row">{{ user.period }}</th>
                    <th scope="row">
                        <v-switch color="orange" :model-value="true" v-if="user.status == 1" label="on"
                            v-on:change="update_stacking_status(user.id)"></v-switch>
                        <v-switch :model-value="false" v-else label="on"  v-on:change="update_stacking_status(user.id)"></v-switch>
                    </th>
                    <th scope="row">{{ user.created_at }}</th>
                    <th scope="row">
                        <button class="btn-sm btn btn-danger mr-2"><i class="fa fa-trash-o"
                                aria-hidden="true"></i></button>
                        <button class="btn-sm btn btn-info " @click="viewItem(user.id)"><i class="fa fa-pencil"
                                aria-hidden="true"></i></button>
                    </th>

                </tr>

            </tbody>
        </table>

        <v-pagination v-model="pagination.current" :total-visible="7" :length="pagination.total" @next="next()"
            @prev="prev" @update:modelValue="handlePageChange"></v-pagination>

        <v-dialog style="max-width: 1000px;" v-model="currencybox" persistent>

            <v-card>
                <v-card-title class="d-flex align-items-center">
                    Enter Coin Details
                    <v-spacer></v-spacer>
                    <v-btn @click="currencybox = false">x</v-btn>
                </v-card-title>
                <v-card-text>
                    <v-row>
                        <v-col cols="4">
                            <v-text-field label="Title" variant="outlined" v-model="title"
                                hide-details=""></v-text-field>
                        </v-col>
                        <v-col cols="4">
                            <v-text-field label="Symbol" variant="outlined" v-model="symbol"
                                hide-details=""></v-text-field>
                        </v-col>
                        <v-col cols="4">
                            <v-text-field label="Network" variant="outlined" v-model="network"
                                hide-details=""></v-text-field>
                        </v-col>
                        <v-col cols="4">
                            <v-text-field label="Price" variant="outlined" v-model="price"
                                hide-details=""></v-text-field>
                        </v-col>
                        <v-col cols="4">
                            <v-text-field label="Duration (Days)" variant="outlined" v-model="period"
                                hide-details=""></v-text-field>
                        </v-col>
                        <v-col cols="4">
                            <v-text-field label="Profit" variant="outlined" v-model="profit"
                                hide-details=""></v-text-field>
                        </v-col>
                        <v-col cols="4">
                            <v-text-field label="Total Amount" variant="outlined" v-model="amount"
                                hide-details=""></v-text-field>
                        </v-col>
                        <v-col cols="4">
                            <v-text-field label="Minimum Stake" variant="outlined" v-model="min_stake"
                                hide-details=""></v-text-field>
                        </v-col>
                        <v-col cols="4">
                            <v-text-field label="Maximum Stake" variant="outlined" v-model="max_stake"
                                hide-details=""></v-text-field>
                        </v-col>
                        <v-col cols="4">
                            <v-text-field label="Staked" variant="outlined" v-model="staked"
                                hide-details=""></v-text-field>
                        </v-col>
                        <v-col cols="4">
                            <v-text-field label="Annual Percentage Rate (APR)" variant="outlined" v-model="apr"
                                hide-details=""></v-text-field>
                        </v-col>
                        <v-col cols="4">
                            <v-text-field label="Profit Gain (Only Daily for now)" variant="outlined"
                                v-model="profit_unit" hide-details=""></v-text-field>
                        </v-col>
                        <v-col cols="4">
                            <v-text-field label="Daily Profit" variant="outlined" v-model="daily_profit"
                                hide-details=""></v-text-field>
                        </v-col>
                        <v-col cols="4">
                            <v-text-field label="Method (Only Manual For Now)" variant="outlined" v-model="method"
                                hide-details=""></v-text-field>
                        </v-col>
                        <v-col cols="12">
                            <label class="form-label" for="method">Coin Icon</label>
                            <div class="img_upload_area">
                                <div class="box">
                                    <div class="js--image-preview"
                                        :style="'background-image: url(/upload/' + icon + ');'">
                                    </div>
                                    <div class="upload-options">
                                        <label>
                                            <i class="fa fa-camera" aria-hidden="true"></i>
                                            <input type="file" name="aadhar_back" class="image-upload" accept="image/*"
                                                capture="camera" required v-on:change="uploadProfile">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </v-col>
                        <v-col cols="12">
                            <v-btn @click="submit" color="warning" v-if="stackid == null">Submit</v-btn>
                            <v-btn @click="Update" color="warning" v-else>Update</v-btn>
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

        currencybox: false,

        users: [],
        searchkey: '',
        pagination: {
            current: 1,
            total: 0
        },

        snackbar: false,
        snackbartext: null,

        stackid: null,
        title: null,
        symbol: null,
        network: null,
        period: null,
        profit: null,
        amount: null,
        min_stake: null,
        max_stake: null,
        staked: null,
        apr: null,
        profit_unit: 'daily',
        daily_profit: null,
        status: 1,
        method: 'manual',
        price: null,
        icon: null,

    }),
    methods: {

        submit() {
            var dataString = {
                title: this.title,
                symbol: this.symbol,
                network: this.network,
                period: this.period,
                profit: this.profit,
                amount: this.amount,
                min_stake: this.min_stake,
                max_stake: this.max_stake,
                staked: this.staked,
                apr: this.apr,
                profit_unit: this.profit_unit,
                daily_profit: this.daily_profit,
                status: this.status,
                method: this.method,
                price: this.price,
                icon: this.icon,
            }

            axios.post('/api/add_staking_currencies', dataString).then((response) => {
                if (response.data.status == 1) {
                    this.title = null;
                    this.symbol = null;
                    this.network = null;
                    this.period = null;
                    this.profit = null;
                    this.amount = null;
                    this.min_stake = null;
                    this.max_stake = null;
                    this.staked = null;
                    this.apr = null;
                    this.profit_unit = null;
                    this.daily_profit = null;
                    this.status = null;
                    this.method = null;
                    this.price = null;
                    this.icon = null;

                    this.snackbar = true;
                    this.snackbartext = "added...";

                    this.currencybox = false;

                }
            })

        },

        handlePageChange() {
            this.get_staking_currencies();
        },
        next() {
            this.get_staking_currencies();
        },
        prev() {
            this.get_staking_currencies();
        },

        get_staking_currencies() {
            axios.get('/api/get_staking_currencies?page=' + this.pagination.current).then((response) => {
                this.users = response.data;
                this.pagination.current = response.data.current_page;
                this.pagination.total = response.data.last_page;
            })
        },

        filterdata() {
            this.get_staking_currencies();
        },

        uploadProfile(e) {
            let formData = new FormData();
            formData.append('file', e.target.files[0])
            axios.post('/api/uploadDocument', formData).then((response) => {
                this.icon = response.data;
            })
        },

        viewItem(stackid) {
            axios.get('/api/get_single_staking_currencies/' + stackid).then((response) => {
                this.stackid = response.data.id;
                this.title = response.data.title;
                this.symbol = response.data.symbol;
                this.network = response.data.network;
                this.period = response.data.period;
                this.profit = response.data.profit;
                this.amount = response.data.amount;
                this.min_stake = response.data.min_stake;
                this.max_stake = response.data.max_stake;
                this.staked = response.data.staked;
                this.apr = response.data.apr;
                this.profit_unit = response.data.profit_unit;
                this.daily_profit = response.data.daily_profit;
                this.status = response.data.status;
                this.method = response.data.method;
                this.price = response.data.price;
                this.icon = response.data.icon;

                this.currencybox = true;
            })
        },

        Update() {
            var dataString = {
                id: this.stackid,
                title: this.title,
                symbol: this.symbol,
                network: this.network,
                period: this.period,
                profit: this.profit,
                amount: this.amount,
                min_stake: this.min_stake,
                max_stake: this.max_stake,
                staked: this.staked,
                apr: this.apr,
                profit_unit: this.profit_unit,
                daily_profit: this.daily_profit,
                status: this.status,
                method: this.method,
                price: this.price,
                icon: this.icon,
            }

            axios.post('/api/update_staking_currencies', dataString).then((response) => {
                if (response.data.status == 1) {
                    this.stackid = null,
                        this.title = null;
                    this.symbol = null;
                    this.network = null;
                    this.period = null;
                    this.profit = null;
                    this.amount = null;
                    this.min_stake = null;
                    this.max_stake = null;
                    this.staked = null;
                    this.apr = null;
                    this.profit_unit = null;
                    this.daily_profit = null;
                    this.status = null;
                    this.method = null;
                    this.price = null;
                    this.icon = null;

                    this.snackbar = true;
                    this.snackbartext = "updated...";

                    this.currencybox = false;

                }
            })
        },

        update_stacking_status(stackid) {
           
            axios.get('/api/update_stacking_status/' + stackid).then((response) => {

                if (response.data.status == 1) {
                    this.snackbar = true;
                    this.snackbartext = "updated...";
                }

            })
        }



    },
    created() {
        this.get_staking_currencies()
    }
}
</script>