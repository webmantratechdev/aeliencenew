<template>
	<div>
		<Header></Header>
		<section class="themeMarketHeaderSec" style="display: none;">
			<div class="container">
				<div class="themeMarketHeaderSecinner">
					<div class="row rowBox">

						<div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox marketStatBox">
							<div class="marketStatBoxinner">
								<div class="symbolName">ET/USDT <span class="">-3%</span></div>
								<div class="d-flex">
									<div class="symbolPrice">
										2.1 <span class="d-block">$ 2.10</span>
									</div>
									<div class="marketStatGraph">
										<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="99" height="32"
											class="inline-chart">
											<defs>
												<linearGradient id="Gradient1" x1="0%" y1="0%" x2="0%" y2="100%">
													<stop offset="0%" stop-color="#F65D62" stop-opacity="1"></stop>
													<stop offset="50%" stop-color="#F65D62" stop-opacity="0.3"></stop>
													<stop offset="100%" stop-color="#F65D62" stop-opacity="0"></stop>
												</linearGradient>
												<clipPath id="clip-line1">
													<polyline fill="none"
														points="0 30 0 30.260000000000137 2.75 30.260000000000137 5.5 30.260000000000137 8.25 30.260000000000137 11 30.260000000000137 13.75 30.260000000000137 16.5 30.260000000000137 19.25 29.174999999999915 22 29.33000000000024 24.75 0.5 27.5 28.86499999999995 30.25 1.275000000000258 33 29.020000000000277 35.75 2.04999999999983 38.5 28.24500000000002 41.25 28.400000000000343 44 3.1350000000000513 46.75 28.400000000000343 49.5 28.400000000000343 52.25 4.064999999999948 55 27.31500000000012 57.75 4.530000000000243 60.5 4.6849999999998815 63.25 4.6849999999998815 66 27.31500000000012 68.75 5.305000000000501 71.5 28.400000000000343 74.25 28.24500000000002 77 28.24500000000002 79.75 28.400000000000343 82.5 29.794999999999845 85.25 28.400000000000343 88 28.400000000000343 90.75 28.400000000000343 93.5 30.104999999999812 96.25 30.104999999999812 99 31.5 212 30"
														stroke="#F65D62" stroke-width="1" storke-linecap="round"
														stroke-linejoin="round"></polyline>
												</clipPath>
											</defs>
											<rect x="0" y="0" width="99" height="32" clip-path="url(#clip-line1)"
												fill="url(#Gradient1)"></rect>
											<polyline fill="none"
												points="0 30.260000000000137 2.75 30.260000000000137 5.5 30.260000000000137 8.25 30.260000000000137 11 30.260000000000137 13.75 30.260000000000137 16.5 30.260000000000137 19.25 29.174999999999915 22 29.33000000000024 24.75 0.5 27.5 28.86499999999995 30.25 1.275000000000258 33 29.020000000000277 35.75 2.04999999999983 38.5 28.24500000000002 41.25 28.400000000000343 44 3.1350000000000513 46.75 28.400000000000343 49.5 28.400000000000343 52.25 4.064999999999948 55 27.31500000000012 57.75 4.530000000000243 60.5 4.6849999999998815 63.25 4.6849999999998815 66 27.31500000000012 68.75 5.305000000000501 71.5 28.400000000000343 74.25 28.24500000000002 77 28.24500000000002 79.75 28.400000000000343 82.5 29.794999999999845 85.25 28.400000000000343 88 28.400000000000343 90.75 28.400000000000343 93.5 30.104999999999812 96.25 30.104999999999812 99 31.5"
												stroke="#F65D62" stroke-width="1" storke-linecap="round"
												stroke-linejoin="round"></polyline>
										</svg>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox marketStatBox">
							<div class="marketStatBoxinner">
								<div class="symbolName">ET/USDT <span class="">-3%</span></div>
								<div class="d-flex">
									<div class="symbolPrice">
										2.1 <span class="d-block">$ 2.10</span>
									</div>
									<div class="marketStatGraph">
										<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="99" height="32"
											class="inline-chart">
											<defs>
												<linearGradient id="Gradient1" x1="0%" y1="0%" x2="0%" y2="100%">
													<stop offset="0%" stop-color="#F65D62" stop-opacity="1"></stop>
													<stop offset="50%" stop-color="#F65D62" stop-opacity="0.3"></stop>
													<stop offset="100%" stop-color="#F65D62" stop-opacity="0"></stop>
												</linearGradient>
												<clipPath id="clip-line1">
													<polyline fill="none"
														points="0 30 0 30.260000000000137 2.75 30.260000000000137 5.5 30.260000000000137 8.25 30.260000000000137 11 30.260000000000137 13.75 30.260000000000137 16.5 30.260000000000137 19.25 29.174999999999915 22 29.33000000000024 24.75 0.5 27.5 28.86499999999995 30.25 1.275000000000258 33 29.020000000000277 35.75 2.04999999999983 38.5 28.24500000000002 41.25 28.400000000000343 44 3.1350000000000513 46.75 28.400000000000343 49.5 28.400000000000343 52.25 4.064999999999948 55 27.31500000000012 57.75 4.530000000000243 60.5 4.6849999999998815 63.25 4.6849999999998815 66 27.31500000000012 68.75 5.305000000000501 71.5 28.400000000000343 74.25 28.24500000000002 77 28.24500000000002 79.75 28.400000000000343 82.5 29.794999999999845 85.25 28.400000000000343 88 28.400000000000343 90.75 28.400000000000343 93.5 30.104999999999812 96.25 30.104999999999812 99 31.5 212 30"
														stroke="#F65D62" stroke-width="1" storke-linecap="round"
														stroke-linejoin="round"></polyline>
												</clipPath>
											</defs>
											<rect x="0" y="0" width="99" height="32" clip-path="url(#clip-line1)"
												fill="url(#Gradient1)"></rect>
											<polyline fill="none"
												points="0 30.260000000000137 2.75 30.260000000000137 5.5 30.260000000000137 8.25 30.260000000000137 11 30.260000000000137 13.75 30.260000000000137 16.5 30.260000000000137 19.25 29.174999999999915 22 29.33000000000024 24.75 0.5 27.5 28.86499999999995 30.25 1.275000000000258 33 29.020000000000277 35.75 2.04999999999983 38.5 28.24500000000002 41.25 28.400000000000343 44 3.1350000000000513 46.75 28.400000000000343 49.5 28.400000000000343 52.25 4.064999999999948 55 27.31500000000012 57.75 4.530000000000243 60.5 4.6849999999998815 63.25 4.6849999999998815 66 27.31500000000012 68.75 5.305000000000501 71.5 28.400000000000343 74.25 28.24500000000002 77 28.24500000000002 79.75 28.400000000000343 82.5 29.794999999999845 85.25 28.400000000000343 88 28.400000000000343 90.75 28.400000000000343 93.5 30.104999999999812 96.25 30.104999999999812 99 31.5"
												stroke="#F65D62" stroke-width="1" storke-linecap="round"
												stroke-linejoin="round"></polyline>
										</svg>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox marketStatBox">
							<div class="marketStatBoxinner">
								<div class="symbolName">ET/USDT <span class="">-3%</span></div>
								<div class="d-flex">
									<div class="symbolPrice">
										2.1 <span class="d-block">$ 2.10</span>
									</div>
									<div class="marketStatGraph">
										<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="99" height="32"
											class="inline-chart">
											<defs>
												<linearGradient id="Gradient1" x1="0%" y1="0%" x2="0%" y2="100%">
													<stop offset="0%" stop-color="#F65D62" stop-opacity="1"></stop>
													<stop offset="50%" stop-color="#F65D62" stop-opacity="0.3"></stop>
													<stop offset="100%" stop-color="#F65D62" stop-opacity="0"></stop>
												</linearGradient>
												<clipPath id="clip-line1">
													<polyline fill="none"
														points="0 30 0 30.260000000000137 2.75 30.260000000000137 5.5 30.260000000000137 8.25 30.260000000000137 11 30.260000000000137 13.75 30.260000000000137 16.5 30.260000000000137 19.25 29.174999999999915 22 29.33000000000024 24.75 0.5 27.5 28.86499999999995 30.25 1.275000000000258 33 29.020000000000277 35.75 2.04999999999983 38.5 28.24500000000002 41.25 28.400000000000343 44 3.1350000000000513 46.75 28.400000000000343 49.5 28.400000000000343 52.25 4.064999999999948 55 27.31500000000012 57.75 4.530000000000243 60.5 4.6849999999998815 63.25 4.6849999999998815 66 27.31500000000012 68.75 5.305000000000501 71.5 28.400000000000343 74.25 28.24500000000002 77 28.24500000000002 79.75 28.400000000000343 82.5 29.794999999999845 85.25 28.400000000000343 88 28.400000000000343 90.75 28.400000000000343 93.5 30.104999999999812 96.25 30.104999999999812 99 31.5 212 30"
														stroke="#F65D62" stroke-width="1" storke-linecap="round"
														stroke-linejoin="round"></polyline>
												</clipPath>
											</defs>
											<rect x="0" y="0" width="99" height="32" clip-path="url(#clip-line1)"
												fill="url(#Gradient1)"></rect>
											<polyline fill="none"
												points="0 30.260000000000137 2.75 30.260000000000137 5.5 30.260000000000137 8.25 30.260000000000137 11 30.260000000000137 13.75 30.260000000000137 16.5 30.260000000000137 19.25 29.174999999999915 22 29.33000000000024 24.75 0.5 27.5 28.86499999999995 30.25 1.275000000000258 33 29.020000000000277 35.75 2.04999999999983 38.5 28.24500000000002 41.25 28.400000000000343 44 3.1350000000000513 46.75 28.400000000000343 49.5 28.400000000000343 52.25 4.064999999999948 55 27.31500000000012 57.75 4.530000000000243 60.5 4.6849999999998815 63.25 4.6849999999998815 66 27.31500000000012 68.75 5.305000000000501 71.5 28.400000000000343 74.25 28.24500000000002 77 28.24500000000002 79.75 28.400000000000343 82.5 29.794999999999845 85.25 28.400000000000343 88 28.400000000000343 90.75 28.400000000000343 93.5 30.104999999999812 96.25 30.104999999999812 99 31.5"
												stroke="#F65D62" stroke-width="1" storke-linecap="round"
												stroke-linejoin="round"></polyline>
										</svg>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-3 col-md-3 col-sm-6 col-12 columnBox marketStatBox">
							<div class="marketStatBoxinner">
								<div class="symbolName">ET/USDT <span class="">-3%</span></div>
								<div class="d-flex">
									<div class="symbolPrice">
										2.1 <span class="d-block">$ 2.10</span>
									</div>
									<div class="marketStatGraph">
										<svg version="1.1" xmlns="http://www.w3.org/2000/svg" width="99" height="32"
											class="inline-chart">
											<defs>
												<linearGradient id="Gradient1" x1="0%" y1="0%" x2="0%" y2="100%">
													<stop offset="0%" stop-color="#F65D62" stop-opacity="1"></stop>
													<stop offset="50%" stop-color="#F65D62" stop-opacity="0.3"></stop>
													<stop offset="100%" stop-color="#F65D62" stop-opacity="0"></stop>
												</linearGradient>
												<clipPath id="clip-line1">
													<polyline fill="none"
														points="0 30 0 30.260000000000137 2.75 30.260000000000137 5.5 30.260000000000137 8.25 30.260000000000137 11 30.260000000000137 13.75 30.260000000000137 16.5 30.260000000000137 19.25 29.174999999999915 22 29.33000000000024 24.75 0.5 27.5 28.86499999999995 30.25 1.275000000000258 33 29.020000000000277 35.75 2.04999999999983 38.5 28.24500000000002 41.25 28.400000000000343 44 3.1350000000000513 46.75 28.400000000000343 49.5 28.400000000000343 52.25 4.064999999999948 55 27.31500000000012 57.75 4.530000000000243 60.5 4.6849999999998815 63.25 4.6849999999998815 66 27.31500000000012 68.75 5.305000000000501 71.5 28.400000000000343 74.25 28.24500000000002 77 28.24500000000002 79.75 28.400000000000343 82.5 29.794999999999845 85.25 28.400000000000343 88 28.400000000000343 90.75 28.400000000000343 93.5 30.104999999999812 96.25 30.104999999999812 99 31.5 212 30"
														stroke="#F65D62" stroke-width="1" storke-linecap="round"
														stroke-linejoin="round"></polyline>
												</clipPath>
											</defs>
											<rect x="0" y="0" width="99" height="32" clip-path="url(#clip-line1)"
												fill="url(#Gradient1)"></rect>
											<polyline fill="none"
												points="0 30.260000000000137 2.75 30.260000000000137 5.5 30.260000000000137 8.25 30.260000000000137 11 30.260000000000137 13.75 30.260000000000137 16.5 30.260000000000137 19.25 29.174999999999915 22 29.33000000000024 24.75 0.5 27.5 28.86499999999995 30.25 1.275000000000258 33 29.020000000000277 35.75 2.04999999999983 38.5 28.24500000000002 41.25 28.400000000000343 44 3.1350000000000513 46.75 28.400000000000343 49.5 28.400000000000343 52.25 4.064999999999948 55 27.31500000000012 57.75 4.530000000000243 60.5 4.6849999999998815 63.25 4.6849999999998815 66 27.31500000000012 68.75 5.305000000000501 71.5 28.400000000000343 74.25 28.24500000000002 77 28.24500000000002 79.75 28.400000000000343 82.5 29.794999999999845 85.25 28.400000000000343 88 28.400000000000343 90.75 28.400000000000343 93.5 30.104999999999812 96.25 30.104999999999812 99 31.5"
												stroke="#F65D62" stroke-width="1" storke-linecap="round"
												stroke-linejoin="round"></polyline>
										</svg>
									</div>
								</div>
							</div>
						</div>



					</div>
				</div>
			</div>
		</section>
		<!-- hero lab section  -->
		<section class="themeMarketdtlsSec" style="background: #fff;">
			<div class="container">
				<div class="themeMarketdtlsSecinner">
					<div class="d-flex justify-content-between align-items-center themeMarketHeader">
						<h2 class="title">Markets</h2>
						<div class="searchfld"></div>
					</div>
					<div class="themeMarkeTableList">

						<div class="tableHeader">
							<div class="tr d-flex justify-content-between align-items-center">
								<div class="th">Pair</div>
								<div class="th">Last Price</div>
								<div class="th">24h Change</div>
								<div class="th">Volume</div>
								<div class="th">Market Cap</div>
								<!-- <div class="th">24h Vol</div> -->
								<div class="th"></div>
							</div>
						</div>
						<div class="tableBody">
						
							<div class="tr d-flex justify-content-between align-items-center" v-for="coin in coinList">
								<div class="td d-inline-block" data-title="Pair">
									<span class="">
										<i class="fa fa-star" aria-hidden="true"></i>
										<img :src="'/images/cryptoCurrency/' + coin.symbol.toLowerCase() + '.png'"
											class="img-fuid icon" alt="">
										<span class="text-uppercase textsdf" v-if="exchange.base == coin.id">{{ coin.symbol }}</span>
										<span class="text-uppercase textsdf" v-if="exchange.base != coin.id">{{ coin.symbol }}</span>
										<!-- <em class="normal text-uppercase">/{{ icon.quoteAsset }}</em>  -->
										<em class="" style="display:none;">Perpetual</em>
									</span>
								</div>
								<div class="td d-inline-block" data-title="Last Price">
									<span class="">
										<span class="normal convertPrice" v-if="exchange.base == coin.id" >$ {{ parseFloat(exchange.price).toFixed(2)}}</span>
										<span class="normal convertPrice" v-if="exchange.base != coin.id" >$ {{ parseFloat(coin.priceUsd).toFixed(2)}}</span>
										<!-- / <em class="normal convertPrice"> $ 2.08</em> -->
									</span>
								</div>
								<div class="td d-inline-block change" data-title="24h Change" v-if="exchange.base == coin.id" >
									<span class="sellColor">{{ parseFloat(coin.price).toFixed(3) }}</span>
								</div>
								<div class="td d-inline-block change" data-title="24h Change" v-if="exchange.base != coin.id" >
									<span class="sellColor">{{ parseFloat(coin.changePercent24Hr).toFixed(3) }}</span>
								</div>

								<div class="td d-inline-block" data-title="24h High" v-if="exchange.base == coin.id"> {{ parseFloat(coin.volume).toFixed(3)}} </div>
								<div class="td d-inline-block" data-title="24h High" v-if="exchange.base != coin.id"> {{ parseFloat(coin.volumeUsd24Hr).toFixed(3)}} </div>
								<div class="td d-inline-block" data-title="24h Low"> {{parseFloat(coin.supply).toFixed(3)}} </div>
								<!-- <div class="td d-inline-block" data-title="24h Vol"> 20.007M </div> -->
								<div class="td d-inline-block d-flex">
									<div class="">
										<button type="button" class="alButton alButtonDefault" @click="commingsoon"
											style="margin-right: 5px;"><span>Details
											</span></button>
										<button type="button" class="alButton alButtonDefault"
											@click="commingsoon"><span>Trades</span></button>
									</div>
									<div class="" style="display:none;">
										<button type="button" class="alButton alButtonDefault">Coming soon!</button>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</section>
		<Footer></Footer>


		<v-snackbar v-model="snackbar">
			{{ snackbartext }}
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
		coinList: [],
		exchange:[],
		snackbar: false,
		snackbartext: null,
	}),
	methods: {
		getProfile() {
			let profileid = localStorage.getItem('profileid');
			axios.post('/api/getProfile', { profileid: profileid }).then((response) => {
				if (response.data.id) {

				} else {
					//this.$router.push('/login');
				}
			})
		},
		tradedata() {
			axios.get('https://api.coincap.io/v2/assets?Authorization=Bearer')
				.then((response) => {
					this.coinList = response.data.data;
				})
		},

		commingsoon() {
			this.snackbar = true;
			this.snackbartext = 'Live Trading will be available soon.';
		}
		
	},
	created() {

		const tradeWs = new WebSocket('wss://ws.coincap.io/trades/binance')

		tradeWs.onmessage =  (msg) => {
			this.exchange = JSON.parse(msg.data);
		}


	},

	mounted() {
		this.getProfile()
		this.tradedata()
	}


}
</script>