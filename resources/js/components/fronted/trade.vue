<template>
    <div>
        <Header></Header>
        <section class="themeTradeSec">
            <div class="d-flex justify-content-between themeTradeSecinner">
                <div class="themeTradeItem">
                    <div class="themeTradeHeader">
                        <div class="d-flex align-items-center themeTradeMarket">
                            <img src="https://aelince.com/images/icon23.png" class="img-fluid" alt="">
                            <p>BTC/USDT</p>
                        </div>
                        <div class="quotationConfig">
                            <div class="itemFlex nowrap">
                                <span class="ttl bold d-block" style="color:green;">22947.77</span>
                                <span class="txt d-block"><small>22947.77</small></span>
                            </div>
                            <div class="d-flex align-items-center nowrap">
                                <div class="itemFlex">
                                    <span class="d-block ttl"><small>24th Change</small></span>
                                    <span class="d-block txt bold" style="color:red;">23,498.23</span>
                                </div>
                                <div class="itemFlex">
                                    <span class="d-block ttl"><small>24th High</small></span>
                                    <span class="d-block txt bold">23,498.23</span>
                                </div>
                                <div class="itemFlex">
                                    <span class="d-block ttl"><small>24th Low</small></span>
                                    <span class="d-block txt bold">23,498.23</span>
                                </div>
                                <div class="itemFlex">
                                    <span class="d-block ttl"><small>24th Vol(BTC)</small></span>
                                    <span class="d-block txt bold">6,498.23</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="klineChart"></div>
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
                                        <div class="entrustBodyOrderAvarage bold">
                                            <span class="buyColor">22969.22</span>
                                            <em class="pointer ">$22973.81</em>
                                        </div>
                                        <div class="entrustBodyOrderBuy">
                                            <div class="entrustBodyOrderBuyList">
                                                <div class="entrustBodyOrderItem">
                                                    <div class="d-flex justify-content-between flexBetween">
                                                        <div class="entrustBodyTitleItem buyColor">
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
                                                <div class="entrustBodyOrderItem">
                                                    <div class="d-flex justify-content-between flexBetween">
                                                        <div class="entrustBodyTitleItem buyColor">
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
                                                <div class="entrustBodyOrderItem">
                                                    <div class="d-flex justify-content-between flexBetween">
                                                        <div class="entrustBodyTitleItem buyColor">
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
                                                <div class="entrustBodyOrderItem">
                                                    <div class="d-flex justify-content-between flexBetween">
                                                        <div class="entrustBodyTitleItem buyColor">
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
                                                <div class="entrustBodyOrderItem">
                                                    <div class="d-flex justify-content-between flexBetween">
                                                        <div class="entrustBodyTitleItem buyColor">
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
                                                <div class="entrustBodyOrderItem">
                                                    <div class="d-flex justify-content-between flexBetween">
                                                        <div class="entrustBodyTitleItem buyColor">
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
                                                <div class="entrustBodyOrderItem">
                                                    <div class="d-flex justify-content-between flexBetween">
                                                        <div class="entrustBodyTitleItem buyColor">
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
                                                <div class="entrustBodyOrderItem">
                                                    <div class="d-flex justify-content-between flexBetween">
                                                        <div class="entrustBodyTitleItem buyColor">
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
                                                <div class="entrustBodyOrderItem">
                                                    <div class="d-flex justify-content-between flexBetween">
                                                        <div class="entrustBodyTitleItem buyColor">
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
                                                <div class="entrustBodyOrderItem">
                                                    <div class="d-flex justify-content-between flexBetween">
                                                        <div class="entrustBodyTitleItem buyColor">
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
                                                <div class="entrustBodyOrderItem">
                                                    <div class="d-flex justify-content-between flexBetween">
                                                        <div class="entrustBodyTitleItem buyColor">
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


                                    <div class="entrustBodyOrderItem">
                                        <div class="d-flex justify-content-between flexBetween">
                                            <div class="entrustBodyTitleItem buyColor">
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
                                    <div class="entrustBodyOrderItem">
                                        <div class="d-flex justify-content-between flexBetween">
                                            <div class="entrustBodyTitleItem buyColor">
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
                                    <div class="entrustBodyOrderItem">
                                        <div class="d-flex justify-content-between flexBetween">
                                            <div class="entrustBodyTitleItem buyColor">
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
                                    <div class="entrustBodyOrderItem">
                                        <div class="d-flex justify-content-between flexBetween">
                                            <div class="entrustBodyTitleItem buyColor">
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
                                    <div class="entrustBodyOrderItem">
                                        <div class="d-flex justify-content-between flexBetween">
                                            <div class="entrustBodyTitleItem buyColor">
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
                                    <div class="entrustBodyOrderItem">
                                        <div class="d-flex justify-content-between flexBetween">
                                            <div class="entrustBodyTitleItem buyColor">
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
                                    <div class="entrustBodyOrderItem">
                                        <div class="d-flex justify-content-between flexBetween">
                                            <div class="entrustBodyTitleItem buyColor">
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
                                    <div class="entrustBodyOrderItem">
                                        <div class="d-flex justify-content-between flexBetween">
                                            <div class="entrustBodyTitleItem buyColor">
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
                                    <div class="entrustBodyOrderItem">
                                        <div class="d-flex justify-content-between flexBetween">
                                            <div class="entrustBodyTitleItem buyColor">
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
                                    <div class="entrustBodyOrderItem">
                                        <div class="d-flex justify-content-between flexBetween">
                                            <div class="entrustBodyTitleItem buyColor">
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
                                    <div class="entrustBodyOrderItem">
                                        <div class="d-flex justify-content-between flexBetween">
                                            <div class="entrustBodyTitleItem buyColor">
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
    }),
    methods: {
        trading() {

        }
    },
    mounted() {
        this.trading();
    }
}
</script>