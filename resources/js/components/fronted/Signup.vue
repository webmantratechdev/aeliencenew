<template>
    <v-app id="inspire" style="background:transparent;">
        <Header></Header>
        <section class="loginRegistration_sec">
            <div class="container">
                <div class="loginRegistration_secinner">
                    <div class="loginRegistrationFormFld" v-if="sixdigitotp == 0">
                        <h2 class="hd"><span class="partner">Create</span> <span class="trusted">Account</span>
                            <!-- <span class="partner">Account</span>  -->
                        </h2>


                        <div class="tabBtn_area"></div>
                        <div class="tabBtn_content">
                            <div id="tab1" class="tabBtn_blk">
                                <div class="form-group">
                                    <label class="label_name">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="" v-model="email"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label_name">Phone</label>
                            <input type="number" class="form-control" maxlength="10" v-model="phone" @input="updateValue">
                        </div>
                        <div class="form-group">
                            <label class="label_name">Password</label>
                            <input type="password" class="form-control" placeholder="" v-model="password" required>
                        </div>
                        <div class="form-group">
                            <label class="label_name referal_label_name" @click="showreffer">
                                <span class="txt">Referral ID (Optional)</span>
                                <span class="icon"></span>
                            </label>
                            <div class="" v-if="showrefferbox == 1">
                                <input type="text" name="referral" class="form-control" v-model="referral_code"
                                    placeholder="">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                                <label class="form-check-label" for="flexCheckDefault">
                                    I have read and agree to Aelince’s <a href="terms-of-use">Terms of Service</a>
                                    and <a href="privacy-policy">Privacy Policy</a>.
                                </label>
                            </div>
                        </div>
                        <div class="form-group loginRegistrationFormFldBtn_area">
                            <v-btn @click="submitcreateform" class="loginRegistrationFormFldBtn"
                                style="color:black;padding: 3px; height: 48px;" :loading="createload">Create Account</v-btn>

                        </div>
                    </div>

                    <div class="loginRegistrationFormFld" v-if="sixdigitotp > 0">
                        <h2 class="hd">
                            <span class="partner">Verify</span>
                            <span class="trusted">otp</span>
                        </h2>
                        <div class="form-group">
                            <label class="mb-2">Enter OTP</label>
                            <input type="text" class="form-control" v-model="validotp" placeholder="">
                        </div>
                        <div class="mb-3"><v-btn @click="resendotp" variant="outlined" :loading="resendloader"
                                style="text-transform: none;">Resend OTP</v-btn></div>

                        <div class="form-group loginRegistrationFormFldBtn_area">
                            <v-btn @click="verifyotps" class="loginRegistrationFormFldBtn"
                                style="color:black;padding: 3px; height: 48px;" :loading="verifyotpsload">Verify Otp</v-btn>
                        </div>
                    </div>


                </div>

            </div>
        </section>

        <Footer></Footer>

        <v-snackbar v-model="snackbar" color="red accent-2">
            {{ snackbartext }}
        </v-snackbar>
</v-app>
</template>

<script>

import Header from './Header.vue';
import Footer from './Footer.vue';

export default {
    components: {
        Header,
        Footer
    },
    data: () => ({

        drawer: false,

        showrefferbox: 1,

        email: null,
        password: null,
        phone: null,
        referral_code: null,


        sixdigitotp: 0,
        validotp: null,

        snackbar: false,
        snackbartext: null,


        createload: false,
        verifyotpsload: false,

        resendloader: false,

    }),
    methods: {
        resendotp() {
            this.resendloader = true;
            let dataString = {
                email: this.email,
                phone: this.phone,
                password: this.password,
                referral_code: this.referral_code,
            }
            axios.post('/api/sendveryotp', dataString).then((response) => {
                if (response.data.status == 200) {
                    this.sixdigitotp = response.data.otp;
                    this.snackbar = true;
                    this.snackbartext = 'OTP sent..';
                } else {
                    this.snackbar = true;
                    this.snackbartext = 'Email address or Phone Number already exist';
                }
                this.resendloader = false;

            })
        },
        verifyotps() {
            this.verifyotpsload = true;
            if (this.validotp == this.sixdigitotp) {
                let dataString = {
                    email: this.email,
                    phone: this.phone,
                    password: this.password,
                    referral_code: this.referral_code,
                }
                axios.post('/api/createaAccount', dataString).then((response) => {
                    if (response.data.id) {
                        this.$router.push('/profile-info');
                        localStorage.setItem('profileid', response.data.id)
                        this.verifyotpsload = false;
                    }
                })
            } else {
                this.snackbar = true;
                this.snackbartext = 'Invalid OTP entered';
                this.verifyotpsload = false;
            }
        },
        submitcreateform() {
            this.createload = true;
            if (this.phone == null || this.email == null || this.password == null) {
                this.snackbar = true;
                this.snackbartext = 'Fields are required';
                this.createload = false;
            } else {

                var phoneno = /^\d{10}$/;

                if (String(this.phone).match(phoneno)) {
                    let dataString = {
                        email: this.email,
                        phone: this.phone,
                        password: this.password,
                        referral_code: this.referral_code,
                    }
                    axios.post('/api/sendveryotp', dataString).then((response) => {
                        if (response.data.status == 200) {
                            this.sixdigitotp = response.data.otp;
                        } else {
                            this.snackbar = true;
                            this.snackbartext = 'Email address or Phone Number already exist';
                        }
                        this.createload = false;

                    })
                } else {
                    this.snackbar = true;
                    this.snackbartext = 'Phone Number must be in 10 digit';
                    this.createload = false;
                }

            }
        },
        showreffer() {
            if (this.showrefferbox == 1) {
                this.showrefferbox = 0;
            } else {
                this.showrefferbox = 1;
            }
        },
        getProfile() {
            let profileid = localStorage.getItem('profileid');
            axios.post('/api/getProfile', { profileid: profileid }).then((response) => {
                if (response.data.id) {
                    this.$router.push('/overview');
                }
            })
        }

    },
    mounted() {

        this.showreffer();
        this.getProfile();

        if (this.referral_code == null) {
            this.referral_code = localStorage.getItem('reffrecode')
        }


    }
}
</script>

<style>
input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}</style>