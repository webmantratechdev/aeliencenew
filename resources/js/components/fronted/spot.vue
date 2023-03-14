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
						<li class="nav-item active">
							<router-link to="/overview/spot" class="nav-link">
								<span class="icon"><i class="fa-regular fa-flower"></i></span>
								<span class="txt">Spot</span>
							</router-link>
						</li>
						<li class="nav-item">
							<router-link to="/overview/stackinglog" class="nav-link">
								<span class="icon"><i class="fa-light fa-list-dropdown"></i></span>
								<span class="txt">Stacking History</span>
							</router-link>
						</li>
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
						<li class="nav-item">
							<router-link to="/overview/idverification" class="nav-link">
								<span class="icon"><i class="fa-light fa-address-card"></i></span>
								<span class="txt">ID-Verification</span>
							</router-link>
						</li>
						<li class="nav-item">
							<router-link to="/overview/myreferral" class="nav-link">
								<span class="icon"><i class="fa-light fa-address-card"></i></span>
								<span class="txt">My Referral</span>
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
							<div class="dashPanel">
								<div class="dashPanelHeader">
									<h2 class="title">Spot</h2>
								</div>
								<div class="dashPanelBody">
									<ul class="overviewList">
										<li class="active"><a href="#" class="defaultBtn">Deposit</a></li>
										<li><a href="#" class="defaultBtn">Withdraw</a></li>
										<li><a href="#" class="defaultBtn">Transfer</a></li>
										<li><a href="#" class="defaultLink">Wallet History</a></li>
									</ul>
								</div>
							</div>

							<div class="dashPanel">
								<div class="dashPanelBody">
									<div class="">
										<h5>Spot assets </h5>
										<p v-if="coinList[0]">
											<span v-if="coinList[0].available > 0">
												${{  parseInt(coinList[0].available) * 2 }} <sub> ({{
													coinList[0].available
												}} AEL)</sub>
											</span>
											<span v-else>********<sub> AEL*s *******</sub></span>

										</p>

									</div>
								</div>
							</div>

							<div class="dashPanel">
								<div class="dashPanelBody">
									<div class="row rowBox align-items-center">
										<div class="col-lg-3 col-md-4 col-sm-12 col-12 columnBox">
											<div class="SpotSreachArea">
												<div class="d-flex SpotSreachAreainner">
													<button type="button" class="SpotSreachBtn"><i
															class="fa-regular fa-magnifying-glass"></i></button>
													<input type="text" class="form-control SpotSreachInput"
														placeholder="Search">
												</div>
											</div>
										</div>
										<div class="col-lg-4 col-md-4 col-sm-12 col-12 columnBox">
											<div class="SpotcheckboxArea">
												<div class="form-check">
													<input class="form-check-input" type="checkbox" value=""
														id="flexCheckDefault">
													<label class="form-check-label" for="flexCheckDefault">
														Hide 0 Balance
													</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="dashPanel">
								<div class="dashPanelBody">
									<div class="responsive_table_area">

										<table id="example" class="table SpotTable" style="width:100%">
											<thead>
												<tr>
													<th>Currency</th>
													<th>All</th>
													<th>available</th>
													<th>In Order</th>
													<th>BTC Equity Value</th>
													<th>Opration</th>
												</tr>
											</thead>
											<tbody v-if="coinList[0]">
												<tr class="order_item" v-for="coin in coinList" >
													<td data-title="Currency" v-if="coin.status == null || coin.status == 1">
														<div class="d-inline-flex align-items-center SpotIcontxt">
															<div class="icon">
																<img :src="'/images/cryptoCurrency/' + coin.symbol.toLowerCase() + '.png'"
																	class="img-fuid icon" alt=""
																	style=" max-width: 31px;   margin-right: 20px;">
															</div>
															<div class="content" style="font-size: 11px;">
																<h5 style="margin-bottom:2px;font-size: 16px;">{{
																	coin.symbol
																}}</h5>
																<p style="margin-bottom:0px;">{{ coin.symbol }}</p>
															</div>
														</div>
													</td>
													<td data-title="All" v-if="coin.status == null || coin.status == 1">
														<span v-if="coin.all > 0">{{ coin.all }}</span>
														<span v-else>*******</span>
													</td>
													<td data-title="available" v-if="coin.status == null || coin.status == 1">
														<span v-if="coin.available > 0">{{ coin.available }}</span>
														<span v-else>*******</span>
													</td>
													<td data-title="In Order" v-if="coin.status == null || coin.status == 1"> 
														<span v-if="coin.inorder > 0">{{ coin.inorder }}</span>
														<span v-else>*******</span>
													</td>
													<td data-title="BTC Equity Value" v-if="coin.status == null || coin.status == 1">
														<span v-if="coin.btn_equity_value > 0">{{ coin.btn_equity_value
														}}</span>
														<span v-else>*******</span>
													</td>
													<td data-title="BTC Equity Value" v-if="coin.status == null || coin.status == 1">
														<div class="SpotBtnArea">
															<router-link
																:to="'/overview/digital-currency-deposit/' + coin.symbol"
																type="button"
																class="alButton alButtonDefault"><span>Deposit</span></router-link>
															<!-- <router-link :to="'/overview/withdrawal/'+ coin.symbol"
																class="alButton alButtonDefault"><span>Withdraw</span></router-link> -->
															<button type="button"
																class="alButton alButtonDefault"><span>Trades</span></button>
														</div>
													</td>
												</tr>




											</tbody>
											<tbody v-else>
												<tr v-for="nu in 10" class="order_item">
													<td colspan="7" style="padding: 15px 0px;">
														<v-progress-linear color="indigo-lighten-5" indeterminate  model-value="20" :height="12"></v-progress-linear>
													</td>
												</tr>
											</tbody>

										</table>

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
		coinList: [],
	}),
	methods: {

		getAllCoin() {
			var userid = localStorage.getItem('profileid');
			axios.get('/api/getAllTokenspot?userid=' + userid)
				.then((response) => {
					console.log(response.data);
					this.coinList = response.data;
				})
		},


	}, created() {
		this.getAllCoin();
	}
}
</script>

<style>
.SpotBtnArea button,
.SpotBtnArea a {
	padding: 5px 10px;
	border: none;
	font-size: 12px;
	background-color: #eaecef;
	margin-right: 20px;
	text-decoration: none;
}
</style>