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
                        <li class="nav-item active">
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
                    </ul>
                </div>
                <div class="themeDashboarMainArea">
                    <div class="container-fluid">
                        <div class="themeDashboarMainAreainner">
                            <div class="dashPanel">
                                <div class="dashPanelHeader">
                                    <h2 class="title">Stacking History</h2>
                                </div>
                                <div class="dashPanelBody">

                                    <div class="stakingTable">
                                        <table class="table table-hover1">
                                            <thead>
                                                <tr>
                                                    <th>Total Stack</th>
                                                    <th>Total USDT</th>
                                                    <th>Total Release</th>
                                                    <th>Pending Release</th>
                                                    <th>Release Amount</th>
                                                    <th>Pending Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody v-if="users.data">

                                                <tr v-for="stacks in users.data">
                                                    <td>{{ stacks.cost }} AEL</td>
                                                    <td>{{ parseFloat(stacks.staked).toFixed(0) }}</td>
                                                    <td>0</td>
                                                    <td>12 Month</td>
                                                    <td>0</td>
                                                    <td>0</td>
                                                </tr>

                                            </tbody>

                                        </table>


                                        <v-pagination v-model="pagination.current" :total-visible="7"
                                            :length="pagination.total" @next="next()" @prev="prev"
                                            @update:modelValue="handlePageChange"></v-pagination>

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

        users: [],
        searchkey: '',
        pagination: {
            current: 1,
            total: 0
        },

    }),
    methods: {
        handlePageChange() {
            this.get_staking_log_front();
        },
        next() {
            this.get_staking_log_front();
        },
        prev() {
            this.get_staking_log_front();
        },

        get_staking_log_front() {
            var userid = localStorage.getItem('profileid');
            axios.get('/api/get_staking_log_front?page=' + this.pagination.current + '&userid=' + userid).then((response) => {
                console.log(response.data);
                this.users = response.data;
                this.pagination.current = response.data.current_page;
                this.pagination.total = response.data.last_page;
            })
        }

    },
    mounted() {
        this.get_staking_log_front()
    }
}
</script>