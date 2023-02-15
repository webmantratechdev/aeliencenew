<template>
    <div>
        <Header></Header>
        <section class="themeTradeSec">
            <div class="d-flex justify-content-between themeTradeSecinner">
                <div class="themeTradeItem">
                    <div class="themeTradeHeader">
                        <div class="d-flex align-items-center themeTradeMarket">
                            <img :src="'/images/cryptoCurrency/' + coinDetails.symbol + '.png'" class="img-fluid" alt="">
                            <p>{{ coinDetails.symbol }}/USDT</p>
                        </div>
                        <div class="quotationConfig">
                            <div class="itemFlex nowrap">
                                <span class="ttl bold d-block" style="color:green;">{{
                                    parseFloat(coinDetails.priceUsd).toFixed(8)
                                }}</span>
                                <span class="txt d-block"><small>$
                                        {{ parseFloat(coinDetails.vwap24Hr).toFixed(8) }}</small></span>
                            </div>
                            <div class="d-flex align-items-center nowrap">
                                <div class="itemFlex">
                                    <span class="d-block ttl"><small>24th Change</small></span>
                                    <span class="d-block txt bold"
                                        style="color:red;">{{ parseFloat(coinDetails.changePercent24Hr).toFixed(2) }}</span>
                                </div>
                                <div class="itemFlex">
                                    <span class="d-block ttl"><small>24th High</small></span>
                                    <span
                                        class="d-block txt bold">{{ parseFloat(coinDetails.vwap24Hr).toFixed(8) }}</span>
                                </div>
                                <div class="itemFlex">
                                    <span class="d-block ttl"><small>24th Low</small></span>
                                    <span
                                        class="d-block txt bold">{{ parseFloat(coinDetails.vwap24Hr).toFixed(8) }}</span>
                                </div>
                                <div class="itemFlex">
                                    <span class="d-block ttl"><small>24th Vol({{ coinDetails.symbol }})</small></span>
                                    <span
                                        class="d-block txt bold">{{ parseFloat(coinDetails.volumeUsd24Hr).toFixed(2) }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="">
                            <div class="tradingview-widget-container">
                                <div id="tradingview_cba47"></div>
                            </div>
                        </div>
                        <div class="countdownBox">

                        </div>
                        <div class="orderTable">
                            <div class="d-flex justify-content-between align-items-center orderTableHeader">
                                <div class="orderTableHeaderTab">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#menu11"> Open
                                                Order(0)</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#menu12">Order History</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#menu13">Trade History</a>
                                        </li>
                                    </ul>

                                </div>
                                <div class="orderTableHeaderCheckbox">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="check1" name="option1"
                                            value="something">
                                        <label class="form-check-label">Hide Other Pairs</label>
                                    </div>
                                </div>
                            </div>
                            <div class="orderTableBody">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="menu11">

                                        <div class="notLogin bold">
                                            <a href="#" class="">Log In</a> or <a href="#" class="">Register now</a>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="menu12">

                                        <div class="notLogin bold">
                                            <a href="#" class="">Log In</a> or <a href="#" class="">Register now</a>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="menu13">

                                        <div class="notLogin bold">
                                            <a href="#" class="">Log In</a> or <a href="#" class="">Register now</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="themeTradeItem">
                    <div class="entrustList">
                        <p class="title bold">Order Book</p>
                        <div class="sortBtns">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#menu1"> <i
                                            class="fa-sharp fa-solid fa-list-radio"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#menu2"> <i
                                            class="fa-solid fa-list"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#menu3"> <i
                                            class="fa-solid fa-list-ol"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex align-items-center orderTable2Header">
                            <span class="inline-block th">Price(USDT)</span>
                            <span class="inline-block th">Amount(BTC)</span>
                            <span class="inline-block th">Total</span>
                        </div>
                        <div class="orderTable2Body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="menu1">

                                    <div class="entrustBodyOrderSell">
                                        <div class="entrustBodyOrderSellList">

                                            <div class="entrustBodyOrderItem" v-for="ask in orderbook.asks">
                                                <div class="d-flex justify-content-between flexBetween">
                                                    <div class="entrustBodyTitleItem sellColor">
                                                        {{ parseFloat(ask[0]).toFixed(2) }}
                                                    </div>
                                                    <div class="entrustBodyTitleItem right">
                                                        {{ parseFloat(ask[1]).toFixed(4) }}
                                                    </div>
                                                    <div class="entrustBodyTitleItem right">
                                                        {{ ask[1] / ask[1] }}
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="entrustBodyOrderAvarage bold">
                                            <span class="buyColor" v-if="orderbook.bids">{{ parseFloat(orderbook.bids[0][0]).toFixed(2) }}</span>
                                            <em class="pointer "  v-if="orderbook.bids">${{ parseFloat(orderbook.bids[0][1]).toFixed(2) }}</em>
                                        </div>
                                        <div class="entrustBodyOrderBuy">
                                            <div class="entrustBodyOrderBuyList">

                                                <div class="entrustBodyOrderItem"  v-for="bids in orderbook.bids">
                                                    <div class="d-flex justify-content-between flexBetween">
                                                        <div class="entrustBodyTitleItem buyColor">
                                                            {{ parseFloat(bids[0]).toFixed(2) }}
                                                        </div>
                                                        <div class="entrustBodyTitleItem right">
                                                            {{ parseFloat(bids[1]).toFixed(2) }}
                                                        </div>
                                                        <div class="entrustBodyTitleItem right">
                                                            {{ bids[1] / bids[1]}}
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>



                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="menu2">...</div>
                                <div class="tab-pane fade" id="menu3">...</div>

                            </div>


                        </div>
                    </div>
                    <div class="latestTrade">
                        <p class="title bold">Trades</p>
                        <div class="d-flex align-items-center orderTable2Header">
                            <span class="inline-block th">Price(USDT)</span>
                            <span class="inline-block th">Amount(BTC)</span>
                            <span class="inline-block th">Total</span>
                        </div>
                        <div class="orderTable2Body">
                            <div class="entrustBodyOrderSell">
                                <div class="entrustBodyOrderSellList">

                                    <div class="entrustBodyOrderItem">
                                        <div class="d-flex justify-content-between flexBetween">
                                            <div class="entrustBodyTitleItem sellColor">
                                                22943.79
                                            </div>
                                            <div class="entrustBodyTitleItem right">
                                                0.0982
                                            </div>
                                            <div class="entrustBodyTitleItem right">
                                                1047.78
                                            </div>
                                        </div>
                                    </div>

                                </div>



                            </div>
                        </div>
                    </div>


                </div>
                <div class="themeTradeItem">
                    <div class="tradeForm">
                        <div class="d-flex justify-content-between align-items-center tradeFormHeader">
                            <div class="tradeFormHeaderTab">
                                <ul class="navtabs">
                                    <li class="navItem show">
                                        <a class="navLink"> Line Orders</a>
                                    </li>
                                    <li class="navItem hide active">
                                        <a class="navLink">Market Orders</a>
                                    </li>
                                </ul>
                            </div>
                            <a href="#" target="_blank" class="rulesLink">Rules</a>
                        </div>


                        <div class="tradeFormBody">
                            <div class="buySellTab">
                                <ul class="buySelltabs">
                                    <li class="">
                                        <a href="#" class="buy"> Buy</a>
                                    </li>
                                    <li class="active">
                                        <a href="#" class="sell"> Sell</a>
                                    </li>
                                </ul>
                            </div>

                            <div class="available">
                                <span>Avbl:</span> - <em class="btc"> BTC </em><em class="usdt"> USDT </em>
                            </div>
                            <div class="formBodypanel limitForm" style="display:none;">
                                <div class="limitFormItem">
                                    <div
                                        class="d-flex justify-content-between align-items-center inputBox inputReadonly">
                                        <span class="d-inline-block prefix">Price</span>
                                        <input type="text" class="" placeholder="" value="23299.85" readonly="readonly">
                                        <span class="d-inline-block uppercase suffix">USDT</span>
                                    </div>
                                </div>
                                <div class="limitFormItem">
                                    <div
                                        class="d-flex justify-content-between align-items-center inputBox inputReadonly">
                                        <span class="d-inline-block prefix">Amount</span>
                                        <input type="text" class="" placeholder="">
                                        <span class="d-inline-block uppercase suffix">BTC</span>
                                    </div>


                                </div>
                                <div class="limitFormItem">
                                    <div class="range-wrap">
                                        <input type="range" class="range" min="0" max="100">
                                        <output class="bubble"></output>
                                    </div>

                                </div>

                            </div>
                            <div class="formBodypanel marketForm">
                                <div class="limitFormItem">
                                    <div
                                        class="d-flex justify-content-between align-items-center inputBox inputReadonly">
                                        <span class="d-inline-block prefix">Price</span>
                                        <input type="text" class="" placeholder="" value="Market" readonly="readonly">
                                        <span class="d-inline-block uppercase suffix">USDT</span>
                                    </div>
                                </div>
                                <div class="limitFormItem">
                                    <div class="pointerNavtabs">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-bs-toggle="tab" href="#menu15">
                                                    Amount</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab" href="#menu16">Total <span
                                                        class="info"><i class="fa-light fa-circle-info"></i></span></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="">

                                        <div class="tab-content">
                                            <div class="tab-pane active" id="menu15">
                                                <div class="limitFormItem">
                                                    <div
                                                        class="d-flex justify-content-between align-items-center inputBox inputReadonly">
                                                        <span class="d-inline-block prefix">Amount</span>
                                                        <input type="text" class="" placeholder="">
                                                        <span class="d-inline-block uppercase suffix">BTC</span>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="menu16">
                                                <div class="limitFormItem">
                                                    <div
                                                        class="d-flex justify-content-between align-items-center inputBox inputReadonly">
                                                        <span class="d-inline-block prefix">Total</span>
                                                        <input type="text" class="" placeholder="">
                                                        <span class="d-inline-block uppercase suffix">USDT</span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>



                                </div>
                                <div class="limitFormItem">
                                    <div class="range-wrap">
                                        <input type="range" class="range" min="0" max="100">
                                        <output class="bubble"></output>
                                    </div>

                                </div>

                            </div>

                            <div class="loginRegiisterBtnArea">
                                <button type="button" class="loginRegiisterBtn"><span>Log In or Register</span></button>
                            </div>

                        </div>

                    </div>

                    <div class="tradeAssets">
                        <p class="title bold">Assets</p>

                        <div class="tradeAssetButtonsArea">
                            <div class="d-flex justify-content-between tradeAssetButtons">
                                <button disabled type="button" class="tradeAssetButton"><span>Deposit</span></button>
                                <button disabled type="button" class="tradeAssetButton"><span>Withdraw</span></button>
                                <button disabled type="button" class="tradeAssetButton"><span>Transfer</span></button>
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

        orderbook:[],
    }),
    methods: {
        getallConin() {
            axios.get('https://api.coincap.io/v2/assets?Authorization=Bearer').then((response) => {

                let cointoken = this.$route.params.coinpair;

                const myArray = cointoken.split("_")

                const object1 = [];
                response.data.data.filter((value, Key) => {
                    if (value.symbol == myArray[0]) {
                        object1.push(value);
                    }
                })

                this.coinDetails = object1[0];
            })
        },

        trading() {

            let cointoken = this.$route.params.coinpair;

            const myArray = cointoken.split("_")

            new TradingView.widget(
                {
                    "width": '100%',
                    "height": 564,
                    "symbol": myArray[0] + myArray[1],
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

        getOrderbook() {
            let cointoken = this.$route.params.coinpair;

            const myArray = cointoken.split("_")
            axios.get('/api/getorderbook/'+myArray[0] + myArray[1]).then((response) => {
                this.orderbook = response.data;
            });
        }
    },
    mounted() {

        setInterval(this.getOrderbook, 2000);

        this.trading();
        this.getallConin();

        this.getOrderbook();

        // let cointoken = this.$route.params.coinpair;

        // const myArray = cointoken.split("_")

        // const tradeWs = new WebSocket('wss://ws.coincap.io/trades/binance')

        // tradeWs.onmessage =  (msg) => {
        // 	console.log(msg);
        // }
    }
}
</script>