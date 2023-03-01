<template>
    <div>
        <Header></Header>
        <section class="themeDashboardSec">
            <div class="themeDashboardMenuHeader">
                <div class="d-flex justify-content-between themeDashboardMenuHeaderinner">
                    <h4 class="title">Side Menu</h4>
                    <span class="sideMenu_btn">
                        <i class="fa-regular fa-bars"></i>
                    </span>
                </div>
            </div>
            <div class="themeDashboardSecinner">
                <div class="menuOverlay"></div>
                <span class="menuCloseBtn">
                    <i class="fa-regular fa-xmark"></i>
                </span>
                <div class="themeDashboarSidebar">
                    <div class=""></div>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <router-link to="/overview" class="nav-link">
                                <span class="icon"><i class="fa-regular fa-wallet"></i></span>
                                <span class="txt">Overview</span>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/overview/spot" class="nav-link">
                                <span class="icon"><i class="fa-regular fa-flower"></i></span>
                                <span class="txt">Spot</span>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/overview/stackinglog" class="nav-link">
                                <span class="icon"><i class="fa-light fa-list-dropdown"></i></span>
                                <span class="txt">Stacking History</span>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/overview/wallet-history" class="nav-link">
                                <span class="icon"><i class="fa-light fa-calendar-clock"></i></span>
                                <span class="txt">Wallet History</span>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/overview/profile-info" class="nav-link">
                                <span class="icon"><i class="fa-regular fa-user"></i></span>
                                <span class="txt">Profile Information</span>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/overview/idverification" class="nav-link">
                                <span class="icon"><i class="fa-light fa-address-card"></i></span>
                                <span class="txt">ID-Verification</span>
                            </router-link>
                        </li>
                        <li class="nav-item">
                            <router-link to="/overview/account-security" class="nav-link">
                                <span class="icon"><i class="fa-light fa-file-invoice"></i></span>
                                <span class="txt">Account Security</span>
                            </router-link>
                        </li>
                        <!-- <li class="nav-item active">
							<router-link to="/overview/account-security" class="nav-link">
								<span class="icon"><i class="fa-light fa-coins"></i></span>
								<span class="txt">Digital Currency Deposit</span>
							</router-link>
						</li> -->
                    </ul>
                </div>
                <div class="themeDashboarMainArea">
                    <div class="container-fluid">
                        <div class="themeDashboarMainAreainner">
                            <div class="dashPanel">
                                <div class="dashPanelHeader">
                                    <h2 class="title">Digital Currency Withdraw</h2>
                                </div>
                                <div class="dashPanelBody">
                                    <div class="digitalCurrencyStep_area">
                                        <ul class="stepProgressbar">
                                            <li class="active">
                                                <div class="content">
                                                    <h4>Initiate withdrawal</h4>
                                                    <p>Create withdrawal order on SuperEx platform</p>
                                                </div>
                                            </li>
                                            <li class="active">
                                                <div class="content">
                                                    <h4>Get withdrawal address</h4>
                                                    <p>Paste the payee address into the input box on withdrawal page</p>
                                                </div>
                                            </li>
                                            <li class="active">
                                                <div class="content">
                                                    <h4>Network confirmation</h4>
                                                    <p>Waiting for blockchain network to confirm network information</p>
                                                </div>
                                            </li>
                                            <li class="active">
                                                <div class="content">
                                                    <h4>Withdrawal successful</h4>
                                                    <p>Your withdrawn assets have been successfully sent to the delivery
                                                        address</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="pb-3">
                                        <div class="row rowBox">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 columnBox">
                                                <div class="form-group">
                                                    <label class="labelName">Choose Currency</label>
                                                    <select class="form-select" v-model="conin" @change="changeRoute">
                                                        <option v-for="coin in coninOp">{{ coin }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12"></div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 columnBox">
                                                <div class="form-group">
                                                    <label class="labelName">Network</label>
                                                    <select class="form-select" v-model="networks" @change="changenework">
                                                        <option v-for="symbol in networksOp" :value="symbol.chain">{{
                                                            symbol.chain }} ({{ symbol.network }})</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12"></div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 columnBox">
                                                <div class="form-group">
                                                    <label class="labelName">Withdrawal address</label>
                                                    <input type="text" name="" id="" placeholder="Enter withdrawal address"
                                                        class="form-control" v-model="withdrawalAddress">
                                                </div>
                                            </div>
                                            <div class="col-12"></div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 columnBox">
                                                <div class="form-group">
                                                    <label class="labelName">Withdrawal Amount</label>
                                                    <input type="text" placeholder="Min withdrawal limit 5.00000000" name=""
                                                        id="" class="form-control" v-model="withdrawalAmount">
                                                </div>
                                            </div>

                                            <p>Amount {{ account.balance }} {{ conin }} Avbl</p>
                                            <p>Fee 2 {{ conin }}</p>

                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12 columnBox">
                                                <v-btn x-large color="orange" @click="withdrawalendotp" :loading="btnloadtop">withdrawal</v-btn>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <Footer></Footer>

        <v-snackbar v-model="snackbar">
            {{ snackbartext }}
        </v-snackbar>


        <v-dialog v-model="dialog" persistent max-width="400">
            <v-toolbar dark color="black">
                <v-toolbar-title>Verify OTP</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-btn icon dark @click="dialog = false">
                    <v-icon>mdi-close</v-icon>
                </v-btn>
            </v-toolbar>
            <v-card>
                <v-card-text>
                    <v-text-field label="Enter email OTP" variant="outlined" v-model="emailOtp"></v-text-field>
                    <v-text-field label="Enter phone OTP" variant="outlined" v-model="phoneOtp"></v-text-field>
                    <v-btn @click="withdrawal" color="orange" :loading="finalwithdraw">Submit</v-btn>
                </v-card-text>
            </v-card>
        </v-dialog>

    </div>
</template>

<script>


import Header from './Header.vue';
import Footer from './Footer.vue';

export default {
    components: {
        Header,
        Footer,

    },
    data: () => ({

        snackbar: false,
        snackbartext: null,

        overlay: false,

        conin: '',
        coninOp: [],
        networksOp: [],
        networks: 'Choose Transfer Network',
        coinList: [],



        account: [],


        withdrawalAddress: null,
        withdrawalAmount: null,

        otps: [],
        dialog: false,
        emailOtp: null,
        phoneOtp: null,

        btnloadtop: false,
        finalwithdraw: false,

    }),
    methods: {


        withdrawalendotp() {
            this.btnloadtop = true;
            if (this.networks == 'Choose Transfer Network') {
                this.snackbar = true;
                this.snackbartext = 'Choose Transfer Network';
                this.btnloadtop = false;
                return false;
            } else if (this.withdrawalAddress == null) {
                this.snackbar = true;
                this.snackbartext = 'Enter withdrawal address';
                this.btnloadtop = false;
                return false;
            } else if (this.withdrawalAmount == null) {
                this.snackbar = true;
                this.snackbartext = 'Min withdrawal limit 5';
                this.btnloadtop = false;
                return false;
            } else if (this.account.balance < this.withdrawalAmount) {
                this.snackbar = true;
                this.snackbartext = 'Max withdrawal limit ' + this.account.balance;
                this.btnloadtop = false;
                return false;
            } else {
                axios.post('/api/withdrawalendotp', { userid: localStorage.getItem('profileid') }).then((response) => {
                    this.dialog = true;
                    this.otps = response.data;
                    this.btnloadtop = false;
                })
            }

        },

        withdrawal() {

            this.finalwithdraw = true;

            if (this.networks == 'Choose Transfer Network') {
                this.snackbar = true;
                this.snackbartext = 'Choose Transfer Network';
                this.finalwithdraw = false;
                return false;
            } else if (this.withdrawalAddress == null) {
                this.snackbar = true;
                this.snackbartext = 'Enter withdrawal address';
                this.finalwithdraw = false;
                return false;
            } else if (this.withdrawalAmount == null) {
                this.snackbar = true;
                this.snackbartext = 'Min withdrawal limit 5';
                this.finalwithdraw = false;
                return false;
            } else if (this.account.balance < this.withdrawalAmount) {
                this.snackbar = true;
                this.snackbartext = 'Max withdrawal limit ' + this.account.balance;
                this.finalwithdraw = false;
                return false;
            } else if (this.emailOtp != this.otps.email) {
                this.snackbar = true;
                this.snackbartext = 'Invalid email otp';
                this.finalwithdraw = false;
                return false;
            } else if (this.phoneOtp != this.otps.phone) {
                this.snackbar = true;
                this.snackbartext = 'Invalid mobile otp';
                this.finalwithdraw = false;
                return false;
            } else {
                var dataString = {
                    userid: localStorage.getItem('profileid'),
                    conin: this.conin,
                    networks: this.networks,
                    availableAmount: this.account.balance,
                    withdrawalAddress: this.withdrawalAddress,
                    withdrawalAmount: this.withdrawalAmount,
                }

                axios.post('/api/withdrawal', dataString).then((response) => {
                    if (response.data.txId) {
                        this.snackbar = true;
                        this.snackbartext = 'withdrawal completed...';
                    } else {
                        this.snackbar = true;
                        this.snackbartext = 'Something went wrong ! Please try after sometime...';
                    }
                    this.dialog = false;
                    this.finalwithdraw = false;
                    this.$router.push('/overview/overview');
                })
            }



        },

        getaccountidbycontin(symbol) {
            var userid = localStorage.getItem('profileid');
            axios.get('/api/getaccountidbycontin/' + userid + '/' + symbol).then((response) => {
                if (response.data) {
                    console.log(response.data);
                    this.account = response.data;
                }
            })
        },

        changeRoute() {

            var netsd = [{ chain: 'Choose Transfer Network', network: '' }];
            this.coinList.filter((value, key) => {

                if (this.conin == value.symbol) {
                    netsd.push({ chain: value.chain, network: value.network })
                }

            })

            this.networksOp = netsd;
        },

        getAllToken() {

            this.conin = this.$route.params.currency;

            axios.get('/api/getAllToken').then((response) => {

                this.coinList = response.data;

                var coninsd = [];
                var netsd = [{ chain: 'Choose Transfer Network', network: '' }];
                response.data.filter((value, key) => {
                    coninsd.push(value.symbol)
                    if (this.conin == value.symbol) {
                        netsd.push({ chain: value.chain, network: value.network })
                    }
                })

                this.coninOp = coninsd;
                this.networksOp = netsd;

            })
        },

        changenework() {

            console.log(this.networks);

            var conin = this.conin;
            var networks = this.networks;

            if (networks != 'Choose Transfer Network') {
                this.getaccountidbycontin(conin);
            }

        },



    }, mounted() {
        this.getAllToken();

    }


}
</script>
