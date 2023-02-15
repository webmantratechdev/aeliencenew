<template>
    <header class="header-area">
        <nav class="nav-menu py-2 px-5">
            <div class="navbarLogo_area">
                <a href="/" class="navbarLogo"><img src="/images/logo.png" alt="" /></a>
            </div>
            <div class="menu_overlay"></div>
            <span class="menu_close_btn">×</span>
            <div class="navigation_area">
                <div class="navigation_areainner">
                    <div class="navigationList_area">
                        <ul class="menu-items">
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="fa-solid fa-grid"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li><router-link to="/roadmap"><span class="icon"><i
                                                    class="fa-regular fa-location-dot"></i></span>
                                            <span class="txt">Roadmap</span></router-link></li>
                                    <li><router-link to="/overview/invite"><span class="icon"><i
                                                    class="fa-regular fa-gift"></i></span> <span
                                                class="txt">Invite</span></router-link></li>
                                    <li> <router-link to="/help-center"><span class="icon"><i
                                                    class="fa-solid fa-headset"></i></span> <span class="txt">Help
                                                Center</span></router-link></li>
                                </ul>
                            </li>
                            <li><router-link to="/markets">Buy Token</router-link></li>
                            <li><router-link to="/markets">Markets</router-link></li>
                            <li><router-link to="/overview/stacking">Stacking</router-link></li>
                            <li><router-link to="/knowledgebase">Knowledgebase</router-link></li>
                            <li><router-link to="/downloads">Downloads</router-link></li>
                            <li class="w-100">
                                <button class="btn-rectangle btn-dasktop"><a href="login">Log In</a></button>
                            </li>
                            <li class="w-100">
                                <button class="btn-exchange btn-dasktop"><a href="joinus">Sign In</a></button>
                            </li>
                        </ul>


                        <ul class="rightSideNav mobileView">
                            <li class="rightSideNavItem wallet">
                                <a href="#" class="rightSideNavLink">Wallet</a>
                                <ul class="sub-menu">
                                    <li><router-link to="/overview"><span class="icon"></span> <span
                                                class="txt">Overview</span></router-link>
                                    </li>
                                    <li><router-link to="/overview/spot"><span class="icon"></span> <span
                                                class="txt">Spot</span></router-link></li>
                                    <li><router-link to="/overview/profile-info"><span class="icon"></span> <span
                                                class="txt">Profile</span></router-link></li>
                                    <li><router-link to="/overview/wallet-history"><span class="icon"></span> <span
                                                class="txt">Wallet
                                                History</span></router-link></li>
                                </ul>
                            </li>
                            <li class="rightSideNavItem order">
                                <a href="#" class="rightSideNavLink">Orders</a>
                                <ul class="sub-menu">
                                    <li><router-link to="/overview/spot"><span class="icon"></span> <span
                                                class="txt">Spot Order</span></router-link></li>
                                    <li><router-link to="/overview/wallet-history">><span class="icon"></span> <span
                                                class="txt">Transaction History</span></router-link></li>
                                </ul>
                            </li>
                            <li class="rightSideNavItem user">
                                <a href="#" class="rightSideNavLink"><i class="fa-light fa-user"></i></a>
                                <ul class="sub-menu">
                                    <li class="mailTxtItem"><span class="mailTxt">dh***@gmail.com</span><a href=""
                                            class="vipLink"><i class="fa-light fa-crown"></i> VIP 0</a> </li>
                                    <li><router-link to="/overview"><span class="icon"><i
                                                    class="fa-light fa-chart-pie"></i></span>
                                            <span class="txt">Overview</span></router-link></li>
                                    <li><router-link to="/overview/account-security"><span class="icon"><i
                                                    class="fa-light fa-file-user"></i></span>
                                            <span class="txt">Account security</span></router-link></li>
                                    <li><router-link to="/overview/invite"><span class="icon"><i
                                                    class="fa-light fa-gift"></i></span> <span class="txt">Referral
                                            </span></router-link></li>
                                    <li><router-link to="/overview/preferance"><span class="icon"><i
                                                    class="fa-light fa-sliders"></i></span> <span class="txt">Preferance
                                            </span></router-link></li>
                                    <!-- <li><a href="#"><span class="icon"><i class="fa-light fa-ticket"></i></span> <span
                                                class="txt">Voucher Center </span></a></li> -->
                                    <li><a @click="logout"><span class="icon"><i
                                                    class="fa-light fa-right-from-bracket"></i></span> <span
                                                class="txt">Sign out </span></a></li>
                                </ul>
                            </li>
                        </ul>



                    </div>
                </div>
            </div>

            <div class="right_side">

                <ul class="rightSideNav desktopView menu-items" v-if="profile != null">
                    <li class="rightSideNavItem wallet">
                        <a href="#" class="rightSideNavLink">Wallet</a>
                        <ul class="sub-menu">
                            <li><router-link to="/overview"><span class="icon"></span> <span
                                        class="txt">Overview</span></router-link>
                            </li>
                            <li><router-link to="/overview/spot"><span class="icon"></span> <span
                                        class="txt">Spot</span></router-link></li>
                            <li><router-link to="/overview/profile-info"><span class="icon"></span> <span
                                        class="txt">Profile</span></router-link></li>
                            <li><router-link to="/overview/wallet-history"><span class="icon"></span> <span
                                        class="txt">Wallet
                                        History</span></router-link></li>
                        </ul>
                    </li>
                    <li class="rightSideNavItem order">
                        <a href="#" class="rightSideNavLink">Orders</a>
                        <ul class="sub-menu">
                            <li><router-link to="/overview/spot"><span class="icon"></span> <span class="txt">Spot
                                        Order</span></router-link></li>
                            <li><router-link to="/overview/wallet-history"><span class="icon"></span> <span
                                        class="txt">Transaction History</span></router-link></li>
                        </ul>
                    </li>
                    <li class="rightSideNavItem user">
                        <a href="#" class="rightSideNavLink"><i class="fa-light fa-user"></i></a>
                        <ul class="sub-menu">
                            <li class="mailTxtItem"><span class="mailTxt">{{ email }}</span><a href=""
                                    class="vipLink"><i class="fa-light fa-crown"></i> VIP 0</a> </li>
                            <li><router-link to="/overview"><span class="icon"><i
                                            class="fa-light fa-chart-pie"></i></span>
                                    <span class="txt">Overview</span></router-link></li>
                            <li><router-link to="/overview/account-security"><span class="icon"><i
                                            class="fa-light fa-file-user"></i></span>
                                    <span class="txt">Account security</span></router-link></li>
                            <li><router-link to="/overview/invite"><span class="icon"><i
                                            class="fa-light fa-gift"></i></span> <span class="txt">Referral
                                    </span></router-link></li>
                            <li><router-link to="/overview/preferance"><span class="icon"><i
                                            class="fa-light fa-sliders"></i></span> <span class="txt">Preferance
                                    </span></router-link></li>
                            <!-- <li><a href="#"><span class="icon"><i class="fa-light fa-ticket"></i></span> <span
                                                class="txt">Voucher Center </span></a></li> -->
                            <li><a @click="logout"><span class="icon"><i
                                            class="fa-light fa-right-from-bracket"></i></span> <span class="txt">Sign
                                        out </span></a></li>
                        </ul>
                    </li>

                    <li class="rightSideNavItem notification">
                        <a href="#" class="rightSideNavLink"><i class="fa-light fa-bell"></i></a>

                        <ul class="sub-menu notificationDropdown">
                            <li class="notificationDropdownTop">
                                <div
                                    class="d-flex justify-content-between align-items-center notificationDropdownTopinner">
                                    <div class="leftSide">
                                        <p class="pb-0 mb-0"><span>0</span> Pending</p>
                                    </div>
                                    <div class="rightSide">
                                        <router-link to="/overview/notification" class="viewMoreBtn">View
                                            More</router-link>
                                    </div>
                                </div>
                            </li>

                            <!-- <li class="notificationDropdownItem">
                                <a href="#" class="d-flex notificationDropdownLink">
                                    <div class="icon"><i class="fa-light fa-memo-circle-check"></i></div>
                                    <div class="content">
                                        <h5 class="title">Aelince January Benifits Event: Teans of </h5>
                                        <div class="para">To Start the New Year and to thank you for your great</div>
                                        <div class="date">2023-01-21 12:32:12</div>
                                    </div>
                                </a>
                            </li>
                            <li class="notificationDropdownItem">
                                <a href="#" class="d-flex notificationDropdownLink">
                                    <div class="icon"><i class="fa-light fa-memo-circle-check"></i></div>
                                    <div class="content">
                                        <h5 class="title">Yhe Timestamp That Naver Lies</h5>
                                        <div class="para">Discover the versetile uses of tomestamp in blockchain</div>
                                        <div class="date">2023-01-21 12:32:12</div>
                                    </div>
                                </a>
                            </li> -->
                        </ul>

                    </li>
                </ul>

                <div v-if="profile == null" class="d-flex align-items-center rightSidebtnList">
                    <div class="login_btn_area">
                        <div class="btn-rectangle mobile-btn"><router-link to="/login">Log In</router-link></div>
                    </div>
                    <div class="register_btn_area">
                        <router-link to="/signup" class="btn-exchange mobile-btn">Sign Up</router-link>
                    </div>
                    <div class="rightSideMenu">
                        <ul class="menu-items rightSideMenu_list">
                            <li><a href="javascript:void(0)"><i class="fa-regular fa-download"></i></a></li>
                        </ul>
                    </div>

                </div>
            </div>
            <img class="hamburger" src="/images/menu-3-line.png" alt="hamburger" />
        </nav>
    </header>
</template>

<script>

export default {

    data: () => ({
        profile: null,
        email: null,
    }),
    methods: {
        getProfile() {
            let profileid = localStorage.getItem('profileid');
            axios.post('/api/getProfile', { profileid: profileid }).then((response) => {
                if (response.data.id) {
                    this.profile = response.data.id;

                    var atrate = response.data.email.split('@')[1]

                    this.email = response.data.email.slice(0, 2) + '***@' + atrate;

                } else {
                    // this.$router.push('/login');
                }
            })
        },
        logout() {

            localStorage.removeItem('profileid');
            location.reload();
        }

    }, mounted() {
        this.getProfile()
    }


}
</script>