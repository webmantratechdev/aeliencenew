<template>
    <div>

        <Header></Header>

        <section class="stakingBannerSec" style="background-image:url(/images/cryptoBanner.jpg);">
            <div class="container">
                <div class="stakingBannerSecinner">
                    <div class="stakingBannerContent">
                        <h1 class="title">Aelince Defi Stacking</h1>
                        <p class="para mb-0">Dedicated to increasing user stacking income</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="stakingSec" style="background: #fff;">
            <div class="container">

                <div class="stakingFilterArea">
                    <div class="d-flex stakingFilterAreainner">
                        <div class="stakingFilterItem">
                            <div class="stakingSearchArea">
                                <div class="d-flex stakingSearchAreainner">
                                    <input type="text" class="form-control stakingSearchInput"
                                        placeholder="Choose/Serach Coin">
                                    <button type="button" class="stakingSearchBtn"><i
                                            class="fa-regular fa-magnifying-glass"></i></button>
                                </div>
                            </div>
                        </div>

                        <div class="stakingFilterItem">
                            <div class="stakingCheckBox">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="check2" name="option2"
                                        value="something">
                                    <label class="form-check-label" for="check2">Display available only</label>
                                </div>
                            </div>
                        </div>

                        <div class="stakingFilterItem">
                            <div class="stakingCheckBox">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="check2" name="option2"
                                        value="something">
                                    <label class="form-check-label" for="check2">Match My Assets</label>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>


                <div class="stakingTableHeader">
                    <div class="d-flex justify-content-between align-items-center stakingTableHeaderinner">
                        <div class="d-flex align-items-center leftSide">
                            <h4 class="title mb-0 me-2">DeFi Staking</h4>
                            <!-- <a href="#" class="videoGuideBtn">
                                    <span class="icon"><i class="fa-light fa-circle-play"></i></span>
                                    <span class="txt">Video Guide <i class="fa fa-angle-right"></i></span>
                                </a> -->
                        </div>
                        <div class="rightSide">
                            <a href="#" class="text-decoration-underline timelLineLink">Defi Staking timeline</a>
                        </div>
                    </div>
                </div>
                <div class="stakingTable tableResponsive">
                    <table class="table table-hover1">
                        <thead>
                            <tr>
                                <th>Token</th>
                                <th>Est APY</th>
                                <th>Duration (days)</th>
                                <th>Minimum Locked Amount</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody v-if="users.data">
                            <tr class="tableItem" v-for="stocks in users.data">
                                <td class="" data-title="Token" >
                                    <div class="d-flex align-items-center">
                                        <span class="icon me-3">
                                            <img :src="'/upload/' + stocks.icon" class="img-fluid" alt=""
                                                style="width:24px;height:24px;">
                                        </span>
                                        <span class="ttl text-uppercase">{{ stocks.symbol }}</span>
                                    </div>
                                </td>
                                <td class="" data-title="Est APY"><span class="fontText greenColor">{{ parseFloat(stocks.apr).toFixed(0) }}%</span></td>
                                <td class="" data-title="Duration (days)">{{ stocks.period }}</td>
                                <td class="" data-title="Minimum Locked Amount"><span class="fontText text-uppercase">{{ parseFloat(stocks.min_stake).toFixed(0) }} {{
                                    stocks.symbol
                                }}</span></td>
                                <td class="position-relative" data-title="Action">
                                    <div class="d-flex1 align-items-center text-end">
                                        <!-- <span class="position-absolute soldOut">Sold Out</span> -->
                                       

                                        <button v-if="isLogin != ''" type="button" class="elButton2" data-bs-toggle="modal"
                                            @click="getsinglestacking(stocks.id)" data-bs-target="#stackModal" style="background: #d7a106; color: #000;">Stake Now</button>
                                        <router-link to="/login"></router-link>
                                    </div>
                                </td>
                            </tr>

                            <!-- <tr>
                                    <td class="">
                                        <div class="d-flex align-items-center">
                                            <span class="icon me-3"><img src="/images/tokenIcon.png" class="img-fluid"
                                                    alt="" style="width:24px;height:24px;"></span>
                                            <span class="ttl text-uppercase">LTC</span>
                                        </div>
                                    </td>
                                    <td class=""><span class="fontText greenColor">1.4%</span></td>
                                    <td class="">
                                        <div class="">
                                            <button type="button" class="elButton">Flexible Lock</button>
                                            <button type="button" class="elButton border">120</button>
                                        </div>
                                    </td>
                                    <td class=""><span class="fontText text-uppercase">0.001LTC</span></td>
                                    <td class="position-relative">
                                        <div class="d-flex1 align-items-center text-end">
                                            <span class="position-absolute soldOut">Sold Out</span>
                                            <button type="button" class="elButton2" data-bs-toggle="modal"
                                                data-bs-target="#stackModal">Stake Now</button>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="">
                                        <div class="d-flex align-items-center">
                                            <span class="icon me-3"><img src="/images/tokenIcon.png" class="img-fluid"
                                                    alt="" style="width:24px;height:24px;"></span>
                                            <span class="ttl text-uppercase">LTC</span>
                                        </div>
                                    </td>
                                    <td class=""><span class="fontText greenColor">1.4%</span></td>
                                    <td class="">
                                        <div class="">
                                            <button type="button" class="elButton">Flexible Lock</button>
                                            <button type="button" class="elButton border">120</button>
                                        </div>
                                    </td>
                                    <td class=""><span class="fontText text-uppercase">0.001LTC</span></td>
                                    <td class="position-relative">
                                        <div class="d-flex1 align-items-center text-end">
                                            <span class="position-absolute soldOut">Sold Out</span>
                                            <button type="button" class="elButton2">Stake Now</button>
                                        </div>
                                    </td>
                                </tr> -->

                        </tbody>
                    </table>


                    <v-pagination v-model="pagination.current" :total-visible="7" :length="pagination.total" @next="next()"
                        @prev="prev" @update:modelValue="handlePageChange"></v-pagination>

                </div>
            </div>

        </section>


        <div class="modal stackModal" id="stackModal">
            <div class="modal-dialog stackModalDiolog">
                <div class="modal-content stackModalContent">
                    <div class="stackModalRowBox" v-if="purchadareturn == null">
                        <div class="stackModalColumnBox leftStackModal">
                            <div class="leftStackModalinner">
                                <div class="stackModalHeader">
                                    <h4 class="stackModalTitle mb-0">Defi Stacking</h4>
                                </div>


                                <div class="stackModalBody">
                                    <div class="stackModalInfo">
                                        <div class="d-flex alert alert-warning">
                                            <i class="fa-solid fa-circle-info me-3"></i>
                                            <div class="content">
                                                Aelince strives to offre its users only
                                                the best DeFi Mining projects. However,
                                                Aelince only acts as a platform to
                                                showcase
                                                projects and provide users with related
                                                services, such as accessing funds on
                                                behalf of the user and distributing
                                                earings, e
                                                tc Aelince does not assume labliy for
                                                any losses incurred due
                                                to project on-chain contract security
                                                issues.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="stackModalXpr">
                                        <div class="d-flex align-items-center stackModalXprinner">
                                            <span class="icon me-3"><img :src="'/upload/' + singlestack.icon"
                                                    class="img-fluid" style="width:24px;"></span>
                                            <span class="txt">{{ singlestack.symbol }}</span>
                                        </div>
                                    </div>
                                    <div class="stackModalType">
                                        <div class="form-group">
                                            <label class="labelName">Type</label>
                                            <button type="button" class="flexibleBtn border">Flexible</button>
                                        </div>
                                    </div>
                                    <div class="stackModalAccount">
                                        <div class="form-group">
                                            <div class="d-flex justify-content-between align-items-center labelName">
                                                <span class="">Lock Account</span>
                                                <span class="txt">Available amount
                                                    <span v-if="account.balance != null">{{ account.balance
                                                    }}</span>
                                                    <span v-else>0.00000</span>

                                                    {{ singlestack.symbol }}</span>
                                            </div>
                                            <div class="d-flex align-items-center formGroupinner">
                                                <input type="text" class="form-control"
                                                    placeholder="Plaese enter the amount" v-model="lockamount">
                                                <div class="d-flex">
                                                    <span class="txt">{{ singlestack.symbol }}</span>
                                                    <span class="max" style="cursor: pointer; color: #d7a106;" @click="maxvalue" >Max</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="stackModalAccountInfo">
                                        <div class="form-group">
                                            <label class="labelName">Locked Amount
                                                Limitation</label>
                                            <p class="mb-1"><span>Minimum :</span> {{ singlestack.min_stake }} {{
                                                singlestack.symbol
                                            }}</p>
                                            <p class="mb-1"><span>Maximum :</span> {{ singlestack.max_stake }} {{
                                                singlestack.symbol
                                            }}</p>

                                            <p class="mb-1"><span>Total Personal Quota:</span> {{ singlestack.price }}
                                                {{ singlestack.symbol }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="stackModalColumnBox rightStackModal">
                            <div class="rightStackModalinner">
                                <div class="stackModalSummeryArea">
                                    <div class="stackModalSummeryHeaderArea">
                                        <div
                                            class="d-flex justify-content-between align-items-center stackModalSummeryHeaderAreainner">
                                            <h4 class="title mb-3">Summery <i class="fa-light fa-circle-info"></i>
                                            </h4>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="stackModalSummeryListArea">
                                            <ul class="stackModalSummeryList">
                                                <li class="d-flex justify-content-between">
                                                    <div class="ttl">Stack Date</div>
                                                    <div class="txt"> {{ account.stackDate }}
                                                    </div>
                                                </li>

                                                <li class="d-flex justify-content-between">
                                                    <div class="ttl">Value Date</div>
                                                    <div class="txt">{{ account.valueDate }}
                                                    </div>
                                                </li>
                                                <li class="d-flex justify-content-between">
                                                    <div class="ttl">Interest
                                                        Distribution Date</div>
                                                    <div class="txt">{{ account.distributionDate }}
                                                    </div>
                                                </li>
                                                <li class="d-flex justify-content-between">
                                                    <div class="ttl">Est. APR</div>
                                                    <div class="txt colorGreen">{{ singlestack.apr }}%
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="stackModalSummeryInfo">
                                            <div class="alert alert-secondary"
                                                style="background-color: #f7f7f7;border: 1px solid #eee;">
                                                <div class="d-flex justify-content-between stackModalSummeryInfoBlk">
                                                    <div class="icon me-3"><i class="fa-solid fa-circle-info"></i>
                                                    </div>
                                                    <div class="content">
                                                        The APR is adjusted daily based
                                                        on the on-chain staking rewards,
                                                        and the specific APR is subject
                                                        to the page display on the day.
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between stackModalSummeryInfoBlk">
                                                    <div class="icon me-3 "><i class="fa-solid fa-circle-info"></i>
                                                    </div>
                                                    <div class="content">
                                                        APR does not mean the actual or
                                                        predicted returns in fiat
                                                        currency.
                                                    </div>
                                                </div>


                                                <div class="stackModalSummeryInfoBlk">
                                                    <div class="stackModalSummeryCheckBox">
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" id="check12"
                                                                name="option2" value="something" v-model="acceptTerm">
                                                            <label class="form-check-label" for="check12">I have
                                                                read and I agree to
                                                                <span class="">Aelince
                                                                    Stacking Service
                                                                    Agreement</span></label>
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                        <div class="stackModalSummeryBtnArea">

                                            <v-btn type="button" class="stackModalSummeryBtn"  :loading="purchaselod" @click="stackconfirmpurchage">Confirm</v-btn>
                                          

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div v-else class="stackModalRowBox" style=" display: block; text-align: center;  padding: 40px;">
                        <img src="/images/success_img.png" class="img-fluid success_img" style="max-width:100px;">
                        <h4 class="mt-4">Stacking successfull done</h4>
                    </div>



                </div>
            </div>
        </div>


        <v-snackbar v-model="snackbar">
            {{ snackbartext }}
        </v-snackbar>


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

        singlestack: [],

        account: [],

        snackbar: false,
        snackbartext: null,

        lockamount: null,
        
        purchaselod: false,


        purchadareturn: null,

        acceptTerm: null,

        isLogin: null,
    }),
    methods: {

        maxvalue() {
            this.lockamount = this.account.balance;
        },

        handlePageChange() {
            this.get_staking_currencies_front();
        },
        next() {
            this.get_staking_currencies_front();
        },
        prev() {
            this.get_staking_currencies_front();
        },

        get_staking_currencies_front() {
            var userid = localStorage.getItem('profileid');
            axios.get('/api/get_staking_currencies_front?page=' + this.pagination.current+'&userid='+userid).then((response) => {
                this.users = response.data;
                this.pagination.current = response.data.current_page;
                this.pagination.total = response.data.last_page;
            })
        },

        getsinglestacking(stackid) {
            axios.get('/api/get_single_staking_currencies/' + stackid).then((response) => {
                this.singlestack = response.data;
                this.getaccountidbycontin();
            })
        },

        getaccountidbycontin() {
            var userid = localStorage.getItem('profileid');
            axios.get('/api/getaccountidbycontin/' + userid + '/' + this.singlestack.symbol).then((response) => {
                if (response.data) {
                    console.log(response.data);
                    this.account = response.data;
                }
            })
        },

        stackconfirmpurchage() {

            this.purchaselod = true;


           if(this.acceptTerm == null){
                this.snackbar = true;
                this.snackbartext = `Please accept the term and condition`;
                this.purchaselod = false;
                return false;
           }


            if(this.lockamount == null) {
                this.snackbar = true;
                this.snackbartext = `Enter stack amount`;
                this.purchaselod = false;
                return false;
            }

            
            var availableamount = this.account.balance;

            if(availableamount < this.lockamount){
                this.snackbar = true;
                this.snackbartext = `Your Account Balance `+ availableamount +` Not Enough! Please Deposit Money`;
                this.purchaselod = false;
                return false;
            }

            if (availableamount > 0) {

                var dataString = {
                    userid: localStorage.getItem('profileid'),
                    coin_id: this.singlestack.id,
                    deductAmt: this.lockamount,
                    availableAmt: availableamount,
                }

                axios.post("/api/createstackinglog", dataString).then((response) => {

                    console.log(response.data);

                   if(response.data.txId){
                        this.purchadareturn = response.data.txId;
                        this.get_staking_currencies_front();
                   }else{
                    this.snackbar = true;
                    this.snackbartext = `Something went wrong. Please try after sometime..`;
                   }
                   this.purchaselod = false;
                })

            } else {
                this.snackbar = true;
                this.snackbartext = `Your Account Balance 0 ` + this.singlestack.symbol + ` Not Enough! Please Deposit Money`;
            }


        }

    },
    mounted() {
        this.get_staking_currencies_front()
        this.isLogin = localStorage.getItem('profielid');
    }
}
</script>