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
                        <li class="nav-item active">
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
							<router-link to="/overview/myreferral" class="nav-link">
								<span class="icon"><i class="fa-light fa-address-card"></i></span>
								<span class="txt">My Referral</span>
							</router-link>
						</li>
                        <li class="nav-item">
                            <router-link to="/overview/account-security" class="nav-link">
                                <span class="icon"><i class="fa-light fa-file-invoice"></i></span>
                                <span class="txt">Account Security</span>
                            </router-link>
                        </li>
                    </ul>
                </div>
                <div class="themeDashboarMainArea">
                    <div class="container-fluid">
                        <div class="themeDashboarMainAreainner">
                            <div class="dashPanel">
                                <div class="dashPanelHeader">
                                    <h2 class="title">Wallet History</h2>
                                </div>
                                <div class="dashPanelBody">
                                    <div class="dashPanelTabArea">
                                        <div class="dashPanelTabNavArea">
                                            <ul class="nav nav-pills">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-bs-toggle="pill" href="#menu1"
                                                        @click="getWalletHistory('DEPOSIT')">Deposit record</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="pill" href="#menu2"
                                                        @click="getWalletHistory('WITHDRAWAL')">Withdrawal
                                                        record</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="pill" href="#menu3"
                                                        @click="getWalletHistory('TRANSFER')">Transfer
                                                        record</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="pill" href="#menu4"
                                                        @click="getWalletHistory('OTHER')">Other</a>
                                                </li>
                                            </ul>
                                        </div>


                                        <div class="dashPanelTabContentArea">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="menu1">
                                                    <div class="responsive_table_area">

                                                        <table id="example1" class="table soptTable" style="width:100%">
                                                            <thead>
                                                                <tr>

                                                                    <th>Token</th>
                                                                    <th>Amount</th>
                                                                    <th>Network</th>
                                                                    <th>From</th>
                                                                    <th>To</th>
                                                                    <th>Date</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody v-if="walletHistory.data">

                                                                <tr class="order_item"
                                                                    v-for="deposit in walletHistory.data">
                                                                    <td data-title="Currency"> {{ deposit.depositincurrencu
                                                                    }}</td>
                                                                    <td data-title="Amount">{{ deposit.amount }}</td>
                                                                    <td data-title="Network">{{ deposit.network }}</td>
                                                                    <td data-title="Address">{{ deposit.owner_address }}
                                                                    </td>
                                                                    <td data-title="Address">{{ deposit.to_address }}</td>
                                                                    <td data-title="Address">{{ deposit.created_at }}</td>
                                                                    <td data-title="Status">{{ deposit.operationType }}
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            <tbody v-else>
                                                                <tr v-for="nu in 10" class="order_item">
                                                                    <td colspan="7" style="padding: 15px 0px;">
                                                                        <v-progress-linear color="indigo-lighten-5" indeterminate  model-value="20" :height="12"></v-progress-linear>
                                                                    </td>
                                                                </tr>
                                                            </tbody>

                                                        </table>



                                                    </div>
                                                </div>


                                                <div class="tab-pane fade" id="menu2">

                                                    <div class="responsive_table_area">

                                                        <table id="example2" class="table soptTable" style="width:100%">
                                                            <thead>
                                                                <tr>

                                                                    <th>Token</th>
                                                                    <th>Amount</th>
                                                                    <th>Network</th>
                                                                    <th>From</th>
                                                                    <th>To</th>
                                                                    <th>Date</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody v-if="walletHistory.data">

                                                                <tr class="order_item"
                                                                    v-for="deposit in walletHistory.data">
                                                                    <td data-title="Currency"> {{ deposit.depositincurrencu
                                                                    }}</td>
                                                                    <td data-title="Amount">{{ deposit.amount }}</td>
                                                                    <td data-title="Network">{{ deposit.network }}</td>
                                                                    <td data-title="Address">{{ deposit.owner_address }}
                                                                    </td>
                                                                    <td data-title="Address">{{ deposit.to_address }}</td>
                                                                    <td data-title="Address">{{ deposit.created_at }}</td>
                                                                    <td data-title="Status">{{ deposit.operationType }}
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            <tbody v-else>
                                                                <tr v-for="nu in 10" class="order_item">
                                                                    <td colspan="7" style="padding: 15px 0px;">
                                                                        <v-progress-linear color="indigo-lighten-5" indeterminate  model-value="20" :height="12"></v-progress-linear>
                                                                    </td>
                                                                </tr>
                                                            </tbody>

                                                        </table>

                                                    </div>


                                                </div>
                                                <div class="tab-pane fade" id="menu3">
                                                    <div class="responsive_table_area">

                                                        <table id="example3" class="table soptTable" style="width:100%">
                                                            <thead>
                                                                <tr>

                                                                    <th>Token</th>
                                                                    <th>Amount</th>
                                                                    <th>Network</th>
                                                                    <th>From</th>
                                                                    <th>To</th>
                                                                    <th>Date</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody v-if="walletHistory.data">

                                                                <tr class="order_item"
                                                                    v-for="deposit in walletHistory.data">
                                                                    <td data-title="Currency"> {{ deposit.depositincurrencu
                                                                    }}</td>
                                                                    <td data-title="Amount">{{ deposit.amount }}</td>
                                                                    <td data-title="Network">{{ deposit.network }}</td>
                                                                    <td data-title="Address">{{ deposit.owner_address }}
                                                                    </td>
                                                                    <td data-title="Address">{{ deposit.to_address }}</td>
                                                                    <td data-title="Address">{{ deposit.created_at }}</td>
                                                                    <td data-title="Status">{{ deposit.operationType }}
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            <tbody v-else>
                                                                <tr v-for="nu in 10" class="order_item">
                                                                    <td colspan="7" style="padding: 15px 0px;">
                                                                        <v-progress-linear color="indigo-lighten-5" indeterminate  model-value="20" :height="12"></v-progress-linear>
                                                                    </td>
                                                                </tr>
                                                            </tbody>

                                                        </table>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="menu4">
                                                    <div class="responsive_table_area">

                                                        <table id="example4" class="table soptTable" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <!-- <th>Time</th> -->
                                                                    <th>Token</th>
                                                                    <th>Amount</th>
                                                                    <th>Network</th>
                                                                    <th>From</th>
                                                                    <th>To</th>
                                                                    <th>Date</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody v-if="walletHistory.data">

                                                                <tr class="order_item"
                                                                    v-for="deposit in walletHistory.data">
                                                                    <td data-title="Currency"> {{ deposit.depositincurrencu
                                                                    }}</td>
                                                                    <td data-title="Amount">{{ deposit.amount }}</td>
                                                                    <td data-title="Network">{{ deposit.network }}</td>
                                                                    <td data-title="Address">{{ deposit.owner_address }}
                                                                    </td>
                                                                    <td data-title="Address">{{ deposit.to_address }}</td>
                                                                    <td data-title="Address">{{ deposit.created_at }}</td>
                                                                    <td data-title="Status">{{ deposit.operationType }}
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            <tbody v-else>
                                                                <tr v-for="nu in 10" class="order_item">
                                                                    <td colspan="7" style="padding: 15px 0px;">
                                                                        <v-progress-linear color="indigo-lighten-5" indeterminate  model-value="20" :height="12"></v-progress-linear>
                                                                    </td>
                                                                </tr>
                                                            </tbody>

                                                        </table>

                                                    </div>

                                                </div>

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
        walletHistory: [],
    }),
    methods: {

        getWalletHistory($operationType) {
            this.walletHistory = [];
            var userid = localStorage.getItem('profileid')
            axios.get('/api/getWalletHistory/' + userid + '/' + $operationType)
                .then((response) => {
                    this.walletHistory = response.data;
                })
        },

        getProfile() {
            let profileid = localStorage.getItem('profileid');
            axios.post('/api/getProfile', { profileid: profileid }).then((response) => {
                if (response.data.id) {

                } else {
                    this.$router.push('/login');
                }
            })
        }
    }, mounted() {
        this.getProfile()

        this.getWalletHistory('DEPOSIT');
    }


}
</script>