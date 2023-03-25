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
                                    <h2 class="title mb-2">My Referral</h2>
                                    <v-spacer></v-spacer>

                                </div>
                                <div class="dashPanelBody">
                                    
                                        <organization-chart :datasource="ds" zoom pan></organization-chart>
                                 
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

import OrganizationChart from 'vue3-organization-chart'
import 'vue3-organization-chart/dist/orgchart.css'

export default {
    components: {
        Header,
        Footer,
        OrganizationChart
    },
    data: () => ({
        ds: {}
    }),
    methods: {
        gemlmusers() {
            var userid = localStorage.getItem('profileid');
            axios.get('/api/gemlmusers/' + userid).then((response) => {
                this.ds= response.data[0];
                console.log(response.data);
            })
        },
    },
    created() {
        this.gemlmusers();
    }


}
</script>
<style>
.chartOrgchartContainer {
    max-width: 100%;
}
</style>