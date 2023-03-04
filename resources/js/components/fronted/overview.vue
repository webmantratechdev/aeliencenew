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
						<li class="nav-item active">
							<router-link to="/overview" class="nav-link">
								<span class="icon"><i class="fa-regular fa-wallet"></i></span>
								<span class="txt">Overview</span>
							</router-link>
						</li>
						<li class="nav-item">
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
									<h2 class="title mb-2">Overview <br>
										<span style="font-size: 14px; padding: 6px 0px;  border-radius: 9px;">
											Your referral link: https://aelince.com/refer/{{ refferid }}</span>
										<span class="badge badge-outline-info"
											style="font-size: 12px;  margin-left: 8px;  border-radius: 10px;  border: 1px dotted #cb9a00;  color: #fec00f; cursor:pointer;"
											@click="clicktocopy">Copy</span>
									</h2>

									<div class="alert alert-warning" v-if="status == 'P' || status == 'M'">
										<i class="fa fa-exclamation-triangle"></i> Your Profile is being
										verified by Aelince Verification Team. You will be notified with the
										verification
										status with in 24 hours.
									</div>
									<div class="alert alert-success" v-else>
										<i class="fa fa-check-square-o" aria-hidden="true"></i> <b>Your KYC
											documents
											are verified.</b> You will soon be able to Stack and Trade on Aelince
										Exchange. We will keep you posted on your registered email and number.
									</div>
								</div>



								<div class="dashPanelBody">
									<ul class="overviewList">
										<li><router-link to="/overview/wallet-history"
												class="defaultBtn">Deposit</router-link></li>
										<li><router-link to="/overview/wallet-history"
												class="defaultBtn">Withdraw</router-link></li>
										<li><router-link to="/overview/wallet-history"
												class="defaultBtn">Transfer</router-link></li>
										<li><router-link to="/overview/wallet-history" class="defaultLink">Wallet
												History</router-link></li>
									</ul>
								</div>
							</div>

							<div class="dashPanel">
								<div class="dashPanelBody">
									<div class="">
										<h5>Total assets valuation</h5>
										<p v-if="coinList[0]">
											<span v-if="coinList[0].available > 0">
												${{ parseInt(coinList[0].available) * 2 }} <sub> ({{
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
									<div class="">
										<h5>Total assets valuation</h5>
										<div class="d-flex justify-content-between align-items-center mobilDblock">
											<div class="leftSide">
												<p v-if="coinList[0]">
													<span v-if="coinList[0].available > 0">
														${{ parseInt(coinList[0].available) * 2 }} <sub> ({{
															coinList[0].available
														}} AEL)</sub>
													</span>
													<span v-else>********<sub> AEL*s *******</sub></span>

												</p>
											</div>
											<div class="rightSide justify-content-between align-items-center btnLiast_area">
												<router-link :to="'/overview/spot'" class="defaultBtn">Deposit</router-link>
												<router-link :to="'/overview/spot'" class="defaultBtn">Transfer</router-link>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="dashPanel">
								<div class="dashPanelBody">
									<div class="">
										<h5>Total assets valuation</h5>
										<div class="d-flex justify-content-between align-items-center mobilDblock">
											<div class="leftSide">
												<p v-if="coinList[0]">
													<span v-if="coinList[0].available > 0">
														${{ parseInt(coinList[0].available) * 2 }} <sub> ({{
															coinList[0].available
														}} AEL)</sub>
													</span>
													<span v-else>********<sub> AEL*s *******</sub></span>

												</p>
											</div>
											<div class="rightSide justify-content-between align-items-center btnLiast_area">
												<router-link :to="'/overview/spot'" class="defaultBtn">Transfer</router-link>
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

		refferid: null,
		snackbar: false,
		snackbartext: null,

		status: null,

		coinList: [],
	}),
	methods: {
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
		clicktocopy() {
			navigator.clipboard.writeText('https://aelince.com/refer/' + this.refferid);
			this.snackbar = true;
			this.snackbartext = 'Clipboard Copied';
		},
		getAllCoin() {
			var userid = localStorage.getItem('profileid');
			axios.get('/api/getAllTokenspot?userid=' + userid)
				.then((response) => {
					console.log(response.data);
					this.coinList = response.data;
				})
		},
	},
	created() {
		this.getProfile()
		this.getAllCoin();

	}


}
</script>