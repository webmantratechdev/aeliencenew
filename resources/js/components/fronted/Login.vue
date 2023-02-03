<template>
    <div>
        <section class="loginRegistrationPage_sec">
            <div class="loginRegistrationPage_secinner">

                <div class="row m-0 row_box">
                    <div class="col-lg-4 col-md-5 col-sm-12 col-12 p-0 column_box leftSideColumn">
                        <div class="leftSideColumninner">
                            <div class="site_area">
                                <a href="index.php" class="site_Logo"><img src="/images/logo.png" class="img-fluid"
                                        alt="" /></a>
                            </div>
                            <div class="walletThumnail_area">
                                <img src="images/wallet.svg" class="img-fluid" alt="" />
                            </div>
                            <div class="btn_area">
                                <router-link to="/signup" class="regBtn">Register Now</router-link>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-12 col-12 p-0 column_box rightSideColumn">
                        <div class="rightSideColumninner">
                            <div class="loginRegistrationFormFld_area">
                                <div class="loginRegistrationFormFldTop_area">
                                    <h2>Aelince Account Login</h2>
                                    <p>Welcome back! Log In with your Email</p>
                                </div>
                                <div class="loginRegistrationFormFld">
                                    <h2 class="hd"><span class="partner">Log</span> <span class="trusted">In</span></h2>
                                    <div class="form-group">
                                        <label class="label_name">Email</label>
                                        <input type="email" class="form-control" placeholder="" v-model="email">
                                    </div>
                                    <div class="form-group">
                                        <label class="label_name">Password</label>
                                        <input type="password" class="form-control" placeholder="" v-model="password">
                                    </div>
                                    <div class="form-group">
                                        <router-link to="/forgot-password">Forgot password</router-link>
                                    </div>
                                    <div class="form-group loginRegistrationFormFldBtn_area">
                                        <button class="loginRegistrationFormFldBtn" @click="loginbtn"
                                            style="color: #000; text-decoration: none !important; display: block; width: 100%; text-align: center;">Already
                                            registsred? Login</button>
                                    </div>
                                    <div class="RuleWithText" style="text-align: center;  margin-bottom: 10px;">OR</div>
                                    <div class="form-group loginRegistrationFormFldBtn_area">
                                        <router-link to="/signup" class="loginRegistrationFormFldBtn"
                                            style="color: #000; text-decoration: none !important; display: block; width: 100%; text-align: center;">New
                                            user? Create an account</router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>


        <v-snackbar v-model="snackbar">
            {{ snackbartext }}
        </v-snackbar>

    </div>
</template>
<script>
export default {
    data: () => ({
        email: null,
        password: null,


        snackbar: false,
        snackbartext: null,
    }),
    methods: {
        loginbtn() {
            let dataString = {
                email: this.email,
                password: this.password
            }

            axios.post('/api/authcheck', dataString).then((response) => {
                if (response.data.status == 0) {
                    this.snackbar = true;
                    this.snackbartext = 'Invalid email and password';
                } else {
                    localStorage.setItem('profileid', response.data.status)
                    if (response.data.role == 'A') {
                        this.$router.push('/console');
                    } else {
                        this.$router.push('/overview');
                    }
                }
            })
        },
        getProfile() {
            let profileid = localStorage.getItem('profileid');
            axios.post('/api/getProfile', { profileid: profileid }).then((response) => {
                if (response.data.id) {
                    this.$router.push('/overview');
                }
            })
        }

    }, mounted() {
        this.getProfile();
    }
}
</script>