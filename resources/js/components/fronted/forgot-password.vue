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
                                    <h2>Account forgot password</h2>
                                </div>

                                <div class="loginRegistrationFormFld">
                                    <h2 class="hd"><span class="partner">Forgot</span> <span class="trusted">password</span></h2>
                                    <div class="form-group" v-if="status == 0">
                                        <label class="label_name">Enter register Email</label>
                                        <input type="email" class="form-control" placeholder="" v-model="email">
                                    </div>
                                    <div class="form-group" v-if="status == 1">
                                        Password has been sent on {{ email }}. <router-link to="/login"> Login </router-link>
                                    </div>

                                    <div class="form-group loginRegistrationFormFldBtn_area" v-if="status == 0">
                                        <v-btn class="loginRegistrationFormFldBtn" @click="forgotpassword" :loading="btnloadre"
                                            style="color: #000; text-decoration: none !important; display: block; width: 100%; text-align: center; padding: 8px; height: 48px;">Submit</v-btn>
                                    </div>

                                    <div class="RuleWithText" style="text-align: center;  margin-bottom: 10px;"  v-if="status == 0">OR</div>
                                    <div class="form-group loginRegistrationFormFldBtn_area"  v-if="status == 0">
                                        <router-link to="/login" class="loginRegistrationFormFldBtn"
                                            style="color: #000; text-decoration: none !important; display: block; width: 100%; text-align: center;">Return to Login</router-link>
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

        status: 0,
        btnloadre: false,
    }),
    methods: {
        forgotpassword() {
            this.btnloadre = true;
            let dataString = {
                email: this.email
            }
            axios.post('/api/forgotpassword', dataString).then((response) => {
                console.log(response.data);
                if(response.data.status == 0){
                    this.snackbar = true;
                    this.snackbartext = 'Email address is not valid..';
                }else{
                    this.snackbar = true;
                    this.snackbartext = 'Password has been sent on '+this.email; 
                    this.btnloadre = false;
                }
                this.status = response.data.status;
            })
        }
    }
}
</script>