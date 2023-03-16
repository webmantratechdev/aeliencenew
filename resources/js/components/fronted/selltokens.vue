<template>
    <div>
        <Header></Header>

        <section class="stakingBannerSec breadcrumbs_sec " style="background-image:url(/images/cryptoBanner.jpg);">
            <div class="container">
                <div class="breadcrumbs_secinner stakingBannerSecinner">
                    <div class="stakingBannerContent">
                        <h1 class="title">Aelince Buy Token</h1>
                        <p>Buy Instantly to Earn Reward</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="liquidSwapBgSec">
            <div class="container">
                <div class="liquidSwapBgSecinner">

                </div>
            </div>
        </section>
        <section class="liquidSwapSec">
            <div class="container">
                <div class="liquidSwapSecinner">
                    <div class="liquidSwapBgArea mb-3" style="background-image:url(/images/cryptoBanner2.jpg);">
                        <div class="liquidSwapBgAreainner">
                            <h4>BUY TOKEN</h4>
                            <h2 class="mb-4">1AEL = 2USDT</h2>
                            <!-- <a href="#" class="claimRewardVtn">Claim Reward</a> -->
                        </div>
                    </div>
                    <div class="liquidSwapFormArea">
                        <form>
                            <div class="liquidSwapFormAreainner">
                                <div class="rowBox">
                                    <div class="columnBox">
                                        <div class="leftLiquidSwapFormArea">
                                            <div class="liquidSwapFormHeader">
                                                <div class="leftSide">
                                                    <h4 class="title mb-0">BUY TOKEN</h4>
                                                </div>
                                                <div class="rightSide"></div>
                                            </div>
                                            <div class="liquidSwapFormBody">
                                                <div class="form-group">
                                                    <div class="d-flex justify-content-between labelHead">
                                                        <label class="labelName mb-0">Form</label>
                                                        <!-- <span class="txt">Available 0 BTC</span> -->
                                                    </div>
                                                    <div class="d-flex align-items-center formGroupinner">
                                                        <input type="text" class="form-control" placeholder="0.001-5"
                                                            v-model="aelprice" v-on:keyup="onChnageAel">
                                                        <div class="d-flex align-items-center">
                                                            <span class="txt">MAX</span>
                                                            <div
                                                                class="d-flex justify-content-between align-items-center selectArea">
                                                                <div class="d-flex align-items-center pro">
                                                                    <span class="icon me-2"><img
                                                                            :src="`/images/cryptoCurrency/ael.png`"
                                                                            class="img-fluid" alt=""
                                                                            style="width:25px;"></span>
                                                                    <span class="fontTxt">AEL</span>
                                                                </div>
                                                                <span class="arrow"><i class="fa fa-caret-down"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="downUpBtnArea">
                                                    <button type="button" class="downUpBtn"><i
                                                            class="fa-solid fa-arrow-down-arrow-up"></i></button>
                                                </div>

                                                <div class="form-group">
                                                    <div class="labelHead">
                                                        <label class="labelName mb-0">To</label>
                                                    </div>
                                                    <div class="formGroupinner2">

                                                        <div class="d-flex align-items-center">
                                                            <input type="text" class="form-control" placeholder=""
                                                                v-model="usdtprice">
                                                            <div
                                                                class="d-flex justify-content-between align-items-center selectArea">
                                                                <div class="d-flex align-items-center pro">
                                                                    <span class="icon me-2"><img
                                                                            src="/images/cryptoCurrency/usdt.png"
                                                                            class="img-fluid" alt=""
                                                                            style="width:25px;"></span>
                                                                    <span class="fontTxt">USDT</span>
                                                                </div>
                                                                <span class="arrow"><i class="fa fa-caret-down"></i></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="formContent mt-3">
                                                    <p class="mb-0">I have read and understand that it is my responsibility
                                                        to safeguard my
                                                        Private information with anyone.</p>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="columnBox">
                                        <div class="rightLiquidSwapDtlsArea">
                                            <div class="d-flex justify-content-between liquidSwapDtlsHeader">
                                                <div class="leftSide">
                                                    <h4 class="title mb-0">Summery</h4>
                                                </div>
                                                <div class="rightSide">
                                                    <a href="#" class="availableLink">
                                                        <span class="icon me-1"><i class="fa-regular fa-award"></i></span>
                                                        <span class="txt">Reward available!</span>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="liquidSwapDtlsBody">
                                                <ul class="swapList">
                                                    <li class="d-flex justify-content-between">
                                                        <div class="leftPart">
                                                            <span class="ttl">USDT</span>
                                                        </div>
                                                        <div class="rightPart">
                                                            <span class="txt">{{ usdtbalance }}</span>
                                                        </div>
                                                    </li>
                                                    <li class="d-flex justify-content-between">
                                                        <div class="leftPart">
                                                            <span class="ttl">Slippage</span>
                                                        </div>
                                                        <div class="rightPart">
                                                            <span class="txt">--</span>
                                                        </div>
                                                    </li>
                                                    <li class="d-flex justify-content-between">
                                                        <div class="leftPart">
                                                            <span class="ttl">Effective fee (--%)</span>
                                                        </div>
                                                        <div class="rightPart">
                                                            <span class="txt">--</span>
                                                        </div>
                                                    </li>
                                                </ul>

                                                <div class="box2 mt-3 mb-3">
                                                    <ul class="swapList">
                                                        <!-- <li class="d-flex justify-content-between">
                                                            <div class="leftPart">
                                                                <span class="ttl">Swap Fee (--%)</span> 
                                                                <a href="#" class="viewBtn">View Rate</a>
                                                            </div>
                                                            <div class="rightPart">
                                                                <span class="txt">--</span>
                                                            </div>
                                                        </li> -->
                                                        <li class="d-flex justify-content-between">
                                                            <div class="leftPart">
                                                                <span class="ttl">Est. Fee Rebate (--%)</span>
                                                            </div>
                                                            <div class="rightPart">
                                                                <span class="txt">--</span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="alert alert-warning mb-3">
                                                    <!-- <div class="content">
                                                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean
                                                        commodo ligula eget dolor. Aenean massa.
                                                        Cum sociis natoque penatibus .
                                                    </div> -->
                                                </div>

                                                <div class="liquidSwapBtnArea">
                                                    <v-btn @click="buytoken" :loading="buyloadbtn" class="liquidSwapBtn">Buy
                                                        Now</v-btn>

                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <Footer></Footer>


        <v-dialog v-model="dialog" width="350">
            <v-card>
                <v-card-text class="text-center">
                    <v-icon style="font-size: 80px;" color="green">mdi-check-circle-outline</v-icon><br>
                    <h3 class="text-h6">Coin has been purchaed</h3>
                    <v-btn to="/overview/spot">View</v-btn>
                </v-card-text>
            </v-card>
        </v-dialog>

        <v-snackbar v-model="snackbar">
            {{ snackbartext }}

            <template v-slot:actions>
                <v-btn color="pink" variant="text" @click="snackbar = false">
                    Close
                </v-btn>
            </template>
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
        sellingToken: [],
        usdtbalance: 0,

        aelprice: 0,
        usdtprice: 0,


        dialog: false,

        buyloadbtn: false,

        snackbar: false,
        snackbartext: null,
    }),
    methods: {

        buytoken() {

            if (this.usdtbalance < this.usdtprice) {

                this.snackbar = true;
                this.snackbartext = 'Enter valid Amount';

                return false;
            }

            this.buyloadbtn = true;
            var dataString = {
                userid: localStorage.getItem('profileid'),
                usdtprice: this.usdtprice,
                aelprice: this.aelprice,
                availableBalance: this.usdtbalance
            }

            axios.post('/api/buytokensellingtoken', dataString).then((response) => {

                if (response.data.code == 200) {
                    this.dialog = true;
                } else {
                    this.snackbar = true;
                    this.snackbartext = 'Something Went Wrong, Please try after sometime...!';
                }
                this.buyloadbtn = false;
            })

        },

        onChnageAel() {
            this.usdtprice = this.aelprice * 2;
        },
        getsellingtoken() {
            axios.get('/api/getsellingtoken').then((response) => {
                console.log(response.data);
                this.sellingToken = response.data;
            })
        },

        getUsdtbalance() {
            var userid = localStorage.getItem('profileid');
            axios.get('/api/getUsdtbalance/' + userid).then((response) => {
                this.usdtbalance = response.data.balance;

            })
        },
        getProfile() {
			let profileid = localStorage.getItem('profileid');
			axios.post('/api/getProfile', { profileid: profileid }).then((response) => {
				if (response.data.id) {
					this.refferid = response.data.share_refferal_code;
					this.status = response.data.status;
				} else {
					this.$router.push('/login');
				}
			})
		},
    },
    mounted() {
        this.getsellingtoken();
        this.getUsdtbalance();
        this.getProfile();
    }

}
</script>