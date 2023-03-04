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
                        <li class="nav-item ">
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
                        <li class="nav-item active">
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
                                <div class="dashPanelHeader d-flex">
                                    <h2 class="title mb-2">Referral</h2>
                                    <v-spacer></v-spacer>
                                    <select class="form-control" style="max-width: 150px;" v-model="lavels" @change="changelevel">
                                        <option v-for="key in 21" :value="key">{{ key }} Level</option>
                                    </select>
                                </div>
                                <div class="dashPanelBody">
                                    <div class="responsive_table_area">
                                        <table id="example" class="table table table soptTable">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Phone</th>
                                                    <th scope="col">Referral</th>
                                                    <th scope="col">Regd. Date</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody v-if="users.data">

                                                <tr v-for="user in users.data" class="order_item">
                                                    <td scope="row" data-title="Name">{{ user.name }}</td>
                                                    <td scope="row" data-title="Email">{{ user.email }}</td>
                                                    <td scope="row" data-title="Phone">{{ user.phone }}</td>
                                                    <td scope="row" data-title="Referral">{{ user.refferal_code }}</td>
                                                    <td scope="row" data-title="Regd. Date">{{ user.created_at }}</td>
                                                    <td scope="row" data-title="Status">
                                                        <span v-if="user.status == 'A'" selected>Approve</span>
                                                        <span v-else-if="user.status == 'M'" selected>Missing</span>
                                                        <span v-else>Pending</span>
                                                    </td>
                                                </tr>

                                            </tbody>
                                            <tbody v-else>
                                                <tr v-for="nu in 10" class="order_item">
                                                    <td colspan="7" style="padding: 15px 0px;">
                                                        <v-progress-linear color="indigo-lighten-5" indeterminate
                                                            model-value="20" :height="12"></v-progress-linear>
                                                    </td>
                                                </tr>
                                            </tbody>

                                        </table>
                                    </div>
                                </div>

                                <v-pagination density="compact" v-model="pagination.current" :total-visible="7"
                                    :length="pagination.total" @next="next()" @prev="prev"
                                    @update:modelValue="handlePageChange"></v-pagination>
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
        users: [],
        searchkey: '',
        pagination: {
            current: 1,
            total: 0
        },
        lavels: 1,
    }),
    methods: {
        changelevel(){
            this.getaccountreferral();
        },
        handlePageChange() {
            this.getaccountreferral();
        },
        next() {
            this.getaccountreferral();
        },
        prev() {
            this.getaccountreferral();
        },
        getaccountreferral() {
            var userid = localStorage.getItem('profileid');
            axios.get('/api/getaccountreferral/' + userid + '?lavels='+this.lavels+'&page=' + this.pagination.current).then((response) => {
                this.users = response.data;
                this.pagination.current = response.data.current_page;
                this.pagination.total = response.data.last_page;
            })
        }
    },
    created() {
        this.getaccountreferral();
    }


}
</script>