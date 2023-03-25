<template>
    <div>
        <Header></Header>
        <section class="breadcrumbs_sec breadcrumbs_sec2" style="background-color: #fff;">
            <div class="container">
                <div class="breadcrumbs_secinner">

                    <ul class="breadcrumbs">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li>
                            <a href="#">Markets</a>
                        </li>
                        <li>{{ coinDetails.name }} Token</li>
                    </ul>

                </div>
            </div>
        </section>
        <section class="marketDtlsSec" style="background-color: #fff;">
            <div class="container">
                <div class="marketDtlsTopSec">
                    <div class="marketDtlsTopSecinner currencyInfoContainer ">
                        <div class="row rowBox">
                            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 columnBox">
                                <div class="currencyInfoLeft">
                                    <div class="d-flex align-items-center">
                                        <div class="currencyImage">
                                            <img :src="'/images/cryptoCurrency/' + coinDetails.symbol + '.png'" class="img-fluid" alt="">
                                        </div>
                                        <span class="title bold inline-block">{{ coinDetails.name }} Token</span>
                                        <span class="desc">
                                            <span class="bold inline-block uppercase">{{ coinDetails.symbol }}</span>
                                        </span>
                                    </div>
                                    <div class="d-flex currencyLink">
                                        <div class="currencyLinkItem pointer">
                                            <button type="button" class="elButton">
                                                <span class="txt"><i class="fa-regular fa-link"></i> Website</span>
                                                <span class="icon"><i class="fa-light fa-copy"></i></span>
                                            </button>
                                        </div>
                                        <div class="currencyLinkItem ">
                                            <button type="button" class="elButton">
                                                <span class="txt"><i class="fa-regular fa-magnifying-glass"></i>
                                                    Browser</span> <span class="icon"><i
                                                        class="fa-light fa-copy"></i></span>
                                            </button>
                                        </div>
                                        <div class="currencyLinkItem ">
                                            <button type="button" class="elButton">
                                                <span class="txt"><i class="fa-regular fa-newspaper"></i> White
                                                    Paper</span> <span class="icon"><i
                                                        class="fa-light fa-copy"></i></span>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="currencyMore">
                                        <p class="text-font copy-color">Futures：</p>
                                        <div class="d-flex currencyMoreHead">
                                            <div class="currencyMoreImgs">
                                                <img src="/images/tokenIcon2.png" class="img-fluid" alt="">
                                                <span class="inline-block ">TRC20:</span>
                                                <span class="inline-block ">TVxA6Si...9ypxkr2</span>
                                                <span class="inline-block "><i class="fa-light fa-copy"></i></span>
                                            </div>
                                            <div class="currencyMoreSelect pointer relative">
                                                <span class="titleFont inline-block"><span class="txt">More</span> <i
                                                        class="elIcon fa fa-angle-down"></i></span>
                                                <div class="moreShow">
                                                    <div class="d-flex justify-content-between showModel ">
                                                        <div class="imgs"><img src="/images/tokenIcon2.png"
                                                                class="img-fluid" alt=""></div>
                                                        <div class="showTest">
                                                            <div class="textFont block uppercase">TRC20</div>
                                                            <div class="title-font bold block adress">TVxA6Si...9ypxkr2
                                                            </div>
                                                        </div>
                                                        <span class="icon"><i class="fa-light fa-copy"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 columnBox">
                                <div class="currencyInfoRight">
                                    <p class="textFont infoPrice">{{ coinDetails.name }} Token Price <span
                                            class="normal uppercase">({{ coinDetails.symbol }})</span></p>
                                    <div class="">
                                        <span class="price inline-block text-color bold">$ {{ parseFloat(coinDetails.priceUsd).toFixed(2) }}</span>
                                        <span class="change inline-block red" style="background-color: green;" v-if="coinDetails.changePercent24Hr > 0">{{parseFloat(coinDetails.changePercent24Hr).toFixed(2)}}%</span>
                                        <span class="change inline-block red" v-else>{{parseFloat(coinDetails.changePercent24Hr).toFixed(2)}}%</span>
                                    </div>
                                    <div class="d-flex align-items-center priceNew">
                                        <div class="">
                                            <span class="textFont">24h Low: </span>
                                            <span class="titleFont">$ 2.145</span>
                                        </div>
                                        <div class="lineRed"></div>
                                        <div class="lineGreen"></div>
                                        <div class="">
                                            <span class="textFont">24h High: </span>
                                            <span class="titleFont">$ 2.3577</span>
                                        </div>
                                        <div>
                                        </div>
                                    </div>

                                    <div class="line"></div>

                                    <div class="d-flex justify-content-between priceInfo">
                                        <div class="priceInfoBox">
                                            <div class="d-flex align-items-center">
                                                <span class="textFont">Market Value </span>
                                                <i class="fa fa-info-circle" style="margin-left:3px;"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="The total market value of the circulating supply of cryptocurrencies. It is similar to the free floating capital in the stock market.Market capitalization = price x circulating supply."></i>
                                            </div>
                                            <p class="priceInfoColor textColor bold">{{ parseFloat(coinDetails.marketCapUsd).toFixed(2) }}</p>
                                        </div>
                                        <div class="priceInfoBox">
                                            <div class="d-flex align-items-center">
                                                <span class="textFont">24h Vol</span>
                                            </div>
                                            <p class="priceInfoColor textColor bold" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="66,639.41 ET"> {{ parseFloat(coinDetails.vwap24Hr).toFixed(2) }} {{ coinDetails.symbol }}</p>
                                        </div>
                                        <div class="priceInfoBox">
                                            <div class="d-flex align-items-center">
                                                <span class="textFont">Circulating Supply </span>
                                                <i class="fa fa-info-circle" style="margin-left:3px;"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="The amount of currency circulating in the market and in the hands of the public. It is similar to the circulating shares in the stock market.
"></i>
                                            </div>
                                            <p class="priceInfoColor textColor bold">{{ parseFloat(coinDetails.volumeUsd24Hr).toFixed(2) }}</p>
                                        </div>
                                        <div class="priceInfoBox">
                                            <div class="d-flex align-items-center">
                                                <span class="textFont">Total Supply</span>
                                            </div>
                                            <p class="priceInfoColor textColor bold" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="1,000,000,000 ET">1,000,000,000 {{ coinDetails.symbol }}</p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="division">
                        </div>

                        <div class="marketDtlsSecinnrt currencyContentArea">
                            <div class="row rowBox">
                                <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12 columnBox">
                                    <div class="currencyEcharts">
                                        <div class="echartsItem">
                                            <div class="tradingview-widget-container">
                                                <div id="tradingview_cba47"></div>
                                            </div>

                                        </div>
                                        <div class="line echartsLine"></div>
                                        <div class="rankingList">
                                            <div class="title">{{ coinDetails.symbol }} Price Calculator</div>
                                            <div class="transferInfo">
                                                <div class="row rowBox2">
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 columnBox2">
                                                        <div class="form-group">
                                                            <label class="labelName">Currency</label>
                                                            <div class="formGroupinner changePrice">
                                                                <input type="" class="form-control" placeholder="" v-model="tokennamme" @blur="exchangeinfo">
                                                                <div class="postion">
                                                                    <img :src="'/images/cryptoCurrency/' + coinDetails.symbol + '.png'" class="img-fluid"
                                                                        alt="" style="width:24px;height:24px;">
                                                                    <span class="fontText bold text-uppercase">{{ coinDetails.symbol }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 columnBox2">
                                                        <div class="form-group">
                                                            <label class="labelName">Exchange Rate</label>
                                                            <div class="formGroupinner changePrice"
                                                                style="cursor: not-allowed;">
                                                                <input type="" class="form-control" placeholder="" v-model="usdconvert">
                                                                <div class="postion1">
                                                                    <span
                                                                        class="fontText bold text-uppercase">usd</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>


                                            </div>

                                            <div class="line echartsLine"></div>

                                        </div>



                                        <div class="rankingList">
                                            <div class="title">{{ coinDetails.name }} Price Real-time Data</div>
                                            <div class="rankingListInfo">
                                                <p class="para"> Today's real-time price of {{ coinDetails.name }} is 2.17 and the current
                                                    market cap is -- . 24-hour trading volume is 66,639.41 . The price
                                                    of ET to is updated in real-time. {{ coinDetails.name }} Token is -7.45%
                                                    in the last 24 hours. The coin's liquidity is -- 。 </p>
                                            </div>
                                            <div class="line echartsLine"></div>
                                        </div>
                                        <div class="rankingList">
                                            <div class="title">About {{ coinDetails.name }}</div>
                                            <div class="rankingListInfo">
                                                <p class="para"> ET stands for {{ coinDetails.name }} Token. It is a
                                                    blockchain digital asset utility token issued by the Aelince.com
                                                    platform on TRC20 chain. It can be used for spot/contract trading,
                                                    listing deposits. With ET as the token, Aelince will open up
                                                    the Metaverse Office, set up a space fund, and issue a digital asset
                                                    financial ecosystem such as SuperChain. In the future, Aelince
                                                    will realize the real Web3.0 ecosystem, the decentralization of the
                                                    team, the decentralization of the community, the decentralization
                                                    of assets and transactions, and the complete decentralization of
                                                    rights. As the utility token of Aelince, ET will be the credential
                                                    and
                                                    driver for every Aelince user to participate in building the Aelince
                                                    ecosystem, participate in DAO governance, and exercise ecosystem
                                                    capabilities. ET will play a vital role in ecosystem development as
                                                    an economic foundation and circulation hub. The launch of ET
                                                    enables holders to enjoy the rights and interests of the Aelince.com
                                                    digital financial ecosystem </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 columnBox">
                                    <div class="currencyRankingSideBar">
                                        <div class="currencyRanking">
                                            <div class="rankingList">
                                                <div class="title">Search Results</div>

                                                <div class="listItem">
                                                    <div class="d-flex justify-content-between listIteminner">
                                                        <div class="d-flex align-items-center leftSide">
                                                            <div class="icon me-2"><img src="/images/tokenIcon.png"
                                                                    class="img-fluid" alt="" style="width:25px;"></div>
                                                            <div class="content">
                                                                <h6 class="mb-0 textFont">BTC</h6>
                                                                <p class="mb-0">Bitcoin</p>
                                                            </div>
                                                        </div>
                                                        <div class="rightSide">
                                                            <h6 class="mb-0 textFont">$1676.31</h6>
                                                            <p class="mb-0 greenColor percentage buyColor">+0.81%</p>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="listItem">
                                                    <div class="d-flex justify-content-between listIteminner">
                                                        <div class="d-flex align-items-center leftSide">
                                                            <div class="icon me-2"><img src="/images/tokenIcon.png"
                                                                    class="img-fluid" alt="" style="width:25px;"></div>
                                                            <div class="content">
                                                                <h6 class="mb-0 textFont">BTC</h6>
                                                                <p class="mb-0">Bitcoin</p>
                                                            </div>
                                                        </div>
                                                        <div class="rightSide">
                                                            <h6 class="mb-0 textFont">$1676.31</h6>
                                                            <p class="mb-0 greenColor percentage buyColor">+0.81%</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="listItem">
                                                    <div class="d-flex justify-content-between listIteminner">
                                                        <div class="d-flex align-items-center leftSide">
                                                            <div class="icon me-2"><img src="/images/tokenIcon.png"
                                                                    class="img-fluid" alt="" style="width:25px;"></div>
                                                            <div class="content">
                                                                <h6 class="mb-0 textFont">BTC</h6>
                                                                <p class="mb-0">Bitcoin</p>
                                                            </div>
                                                        </div>
                                                        <div class="rightSide">
                                                            <h6 class="mb-0 textFont">$1676.31</h6>
                                                            <p class="mb-0 greenColor percentage buyColor">+0.81%</p>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="line echartsLine"></div>
                                            </div>

                                            <div class="rankingList">
                                                <div class="title">Top 3 Gainers</div>

                                                <div class="listItem">
                                                    <div class="d-flex justify-content-between listIteminner">
                                                        <div class="d-flex align-items-center leftSide">
                                                            <div class="icon me-2"><img src="/images/tokenIcon.png"
                                                                    class="img-fluid" alt="" style="width:25px;"></div>
                                                            <div class="content">
                                                                <h6 class="mb-0 textFont">BTC</h6>
                                                                <p class="mb-0">Bitcoin</p>
                                                            </div>
                                                        </div>
                                                        <div class="rightSide">
                                                            <h6 class="mb-0 textFont">$1676.31</h6>
                                                            <p class="mb-0 greenColor percentage buyColor">+0.81%</p>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="listItem">
                                                    <div class="d-flex justify-content-between listIteminner">
                                                        <div class="d-flex align-items-center leftSide">
                                                            <div class="icon me-2"><img src="/images/tokenIcon.png"
                                                                    class="img-fluid" alt="" style="width:25px;"></div>
                                                            <div class="content">
                                                                <h6 class="mb-0 textFont">BTC</h6>
                                                                <p class="mb-0">Bitcoin</p>
                                                            </div>
                                                        </div>
                                                        <div class="rightSide">
                                                            <h6 class="mb-0 textFont">$1676.31</h6>
                                                            <p class="mb-0 greenColor percentage buyColor">+0.81%</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="listItem">
                                                    <div class="d-flex justify-content-between listIteminner">
                                                        <div class="d-flex align-items-center leftSide">
                                                            <div class="icon me-2"><img src="/images/tokenIcon.png"
                                                                    class="img-fluid" alt="" style="width:25px;"></div>
                                                            <div class="content">
                                                                <h6 class="mb-0 textFont">BTC</h6>
                                                                <p class="mb-0">Bitcoin</p>
                                                            </div>
                                                        </div>
                                                        <div class="rightSide">
                                                            <h6 class="mb-0 textFont">$1676.31</h6>
                                                            <p class="mb-0 greenColor percentage buyColor">+0.81%</p>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="line echartsLine"></div>
                                            </div>

                                            <div class="rankingList">
                                                <div class="title">Top 3 Losers</div>

                                                <div class="listItem">
                                                    <div class="d-flex justify-content-between listIteminner">
                                                        <div class="d-flex align-items-center leftSide">
                                                            <div class="icon me-2"><img src="/images/tokenIcon.png"
                                                                    class="img-fluid" alt="" style="width:25px;"></div>
                                                            <div class="content">
                                                                <h6 class="mb-0 textFont">BTC</h6>
                                                                <p class="mb-0">Bitcoin</p>
                                                            </div>
                                                        </div>
                                                        <div class="rightSide">
                                                            <h6 class="mb-0 textFont">$1676.31</h6>
                                                            <p class="mb-0 greenColor percentage buyColor">+0.81%</p>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="listItem">
                                                    <div class="d-flex justify-content-between listIteminner">
                                                        <div class="d-flex align-items-center leftSide">
                                                            <div class="icon me-2"><img src="/images/tokenIcon.png"
                                                                    class="img-fluid" alt="" style="width:25px;"></div>
                                                            <div class="content">
                                                                <h6 class="mb-0 textFont">BTC</h6>
                                                                <p class="mb-0">Bitcoin</p>
                                                            </div>
                                                        </div>
                                                        <div class="rightSide">
                                                            <h6 class="mb-0 textFont">$1676.31</h6>
                                                            <p class="mb-0 greenColor percentage buyColor">+0.81%</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="listItem">
                                                    <div class="d-flex justify-content-between listIteminner">
                                                        <div class="d-flex align-items-center leftSide">
                                                            <div class="icon me-2"><img src="/images/tokenIcon.png"
                                                                    class="img-fluid" alt="" style="width:25px;"></div>
                                                            <div class="content">
                                                                <h6 class="mb-0 textFont">BTC</h6>
                                                                <p class="mb-0">Bitcoin</p>
                                                            </div>
                                                        </div>
                                                        <div class="rightSide">
                                                            <h6 class="mb-0 textFont">$1676.31</h6>
                                                            <p class="mb-0 greenColor percentage buyColor">+0.81%</p>
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>
                                        </div>

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
        exchange: [],
        coinDetails: [],

        usdconvert: null,
        tokennamme: null,

    }),
    methods: {


        exchangeinfo() {

            axios.get('https://api.coincap.io/v2/rates/united-states-dollar').then((response) => {
                var actual = response.data.data.rateUsd;

                console.log(actual);
               this.usdconvert =  this.tokennamme * actual;
            })
        },


        getallConin() {
            axios.get('https://api.coincap.io/v2/assets?Authorization=Bearer').then((response) => {

                let cointoken = this.$route.params.coin;

                const myArray = cointoken.split("_")

                const object1 = [];
                response.data.data.filter((value, Key) => {
                    if (value.symbol == myArray[0]) {
                        object1.push(value);
                    }
                })

                this.coinDetails = object1[0];

                console.log(this.coinDetails);
            })
        },

        trading() {

            let cointoken = this.$route.params.coin;

            const myArray = cointoken.split("_")

            new TradingView.widget(
                {
                    "width": '100%',
                    "height": 564,
                    "symbol": myArray[0] + 'USDT',
                    "interval": "D",
                    "timezone": "Etc/UTC",
                    "theme": "light",
                    "style": "1",
                    "locale": "en",
                    "toolbar_bg": "#f1f3f6",
                    "enable_publishing": false,
                    "allow_symbol_change": true,
                    "container_id": "tradingview_cba47"
                }
            );
        },
    },
    mounted() {
        this.trading();
        this.getallConin();
    }
}
</script>