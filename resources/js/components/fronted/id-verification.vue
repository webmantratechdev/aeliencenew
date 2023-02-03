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
                        <!-- <li class="nav-item">
							<a href="#" class="nav-link">
								<span class="icon"><i class="fa-light fa-list-dropdown"></i></span>
								<span class="txt">Futures</span>
							</a>
						</li> -->
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
                        <li class="nav-item active">
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

                            <form>

                                <div class="dashPanel">
                                    <div class="dashPanelHeader">
                                        <div class="leftSide">
                                            <h2 class="title">Personal Details</h2>
                                            <p>Your basic personal information is required for identification purposes.
                                            </p>
                                        </div>
                                        <div class="alert alert-warning" v-if="status == 'P' || status == 'M'">
											<i class="fa fa-exclamation-triangle"></i> Your Profile is being
											verified by Aelince Verification Team. You will be notified with the
											verification
											status with in 24 hours.
										</div>
										<div class="alert alert-success" v-else>
											<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>Your KYC
												documents
												are verified.</b> You will soon be able to Stack and Trade on Aelince
											Exchange. We will keep you posted on your registered email and number.
										</div>
                                    </div>
                                    <div class="dashPanelBody">

                                        <div class="row rowBox">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-12 columnBox">
                                                <div class="infoArea">
                                                    <p>Please type carefully and fill out the form with your personal
                                                        details.You are not allowed to edit the details once you have
                                                        submitted the application.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row rowBox">

                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12 columnBox">
                                                <div class="form-group">
                                                    <label class="labelName">First Name</label>
                                                    <input type="text" class="form-control" placeholder="admin"
                                                        v-model="first_name">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12 columnBox">
                                                <div class="form-group">
                                                    <label class="labelName">Last Name</label>
                                                    <input type="text" class="form-control" placeholder="lastname"
                                                        v-model="last_name">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12 columnBox">
                                                <div class="form-group">
                                                    <label class="labelName">Phone Number</label>
                                                    <input type="text" class="form-control" placeholder="phonenumber"
                                                        v-model="phone">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12 columnBox">
                                                <div class="form-group">
                                                    <label class="labelName">Date of Birth</label>
                                                    <input type="date" class="form-control" placeholder="date of birth">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12 columnBox">
                                                <div class="form-group">
                                                    <label class="labelName">Gender</label>
                                                    <select class="form-select">
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12 columnBox">
                                                <div class="form-group">
                                                    <label class="labelName">Telegram Username</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="telegramusername">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12 columnBox">
                                                <div class="form-group">
                                                    <label class="labelName">Select Country</label>
                                                    <input type="text" class="form-control" placeholder="state"
                                                        v-model="contry">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12 columnBox">
                                                <div class="form-group">
                                                    <label class="labelName">State</label>
                                                    <input type="text" class="form-control" placeholder="state"
                                                        v-model="state">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12 columnBox">
                                                <div class="form-group">
                                                    <label class="labelName">City</label>
                                                    <input type="text" class="form-control" placeholder="city"
                                                        v-model="city">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12 columnBox">
                                                <div class="form-group">
                                                    <label class="labelName">Zip/Postal Code</label>
                                                    <input type="text" class="form-control" placeholder="there"
                                                        v-model="zip">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12 columnBox">
                                                <div class="form-group">
                                                    <label class="labelName">Address Line 1</label>
                                                    <input type="text" class="form-control" placeholder="there"
                                                        v-model="address">
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-12 columnBox">
                                                <div class="form-group">
                                                    <label class="labelName">Address Line 2</label>
                                                    <input type="text" class="form-control" placeholder="there">
                                                </div>
                                            </div>




                                        </div>






                                    </div>


                                    <div class="dashPanelFooter">
                                        <div class="updateBtnArea text-end">
                                            <button type="button" class="updateBtn">Update</button>
                                        </div>
                                    </div>


                                </div>


                            </form>
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
        first_name: null,
        last_name: null,
        phone: null,
        email: null,
        address: null,
        city: null,
        state: null,
        zip: null,
        contry: null,

        status: null,
    }),
    methods: {
        getProfile() {
            let profileid = localStorage.getItem('profileid');
            axios.post('/api/getProfile', { profileid: profileid }).then((response) => {
                if (response.data.id) {
                    this.first_name = response.data.first_name;
                    this.last_name = response.data.last_name;
                    this.phone = response.data.phone;
                    this.email = response.data.email;
                    this.address = response.data.address;
                    this.city = response.data.city;
                    this.state = response.data.state;
                    this.zip = response.data.zip;
                    this.contry = response.data.country;
                    this.status = response.data.status;
                } else {
                    this.$router.push('/login');
                }
            })
        }
    }, mounted() {
        this.getProfile()
    }


}
</script>