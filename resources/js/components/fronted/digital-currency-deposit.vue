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
							<router-link to="/overview/account-security" class="nav-link">
								<span class="icon"><i class="fa-light fa-file-invoice"></i></span>
								<span class="txt">Account Security</span>
							</router-link>
						</li>
						<!-- <li class="nav-item active">
							<router-link to="/overview/account-security" class="nav-link">
								<span class="icon"><i class="fa-light fa-coins"></i></span>
								<span class="txt">Digital Currency Deposit</span>
							</router-link>
						</li> -->
					</ul>
				</div>
				<div class="themeDashboarMainArea">
					<div class="container-fluid">
						<div class="themeDashboarMainAreainner">
							<div class="dashPanel">
								<div class="dashPanelHeader">
									<h2 class="title">Digital Currency Deposit</h2>
								</div>
								<div class="dashPanelBody">
									<div class="digitalCurrencyStep_area">
										<ul class="stepProgressbar">
											<li class="active">
												<div class="content">
													<h4>Copy Deposit Address</h4>
													<p>Select currency and block network you want to deposit,and copy
														the deposit address on this page</p>
												</div>
											</li>
											<li class="active">
												<div class="content">
													<h4>Initiate Deposit</h4>
													<p>Initiate a withdrawl on the other party's platform</p>
												</div>
											</li>
											<li class="active">
												<div class="content">
													<h4>Network Confirmation</h4>
													<p>Wait for the blockchain network to confirm your transfer</p>
												</div>
											</li>
											<li class="active">
												<div class="content">
													<h4>Successful Deposit</h4>
													<p>After blockchain confirmation,Aelince will post it for you.</p>
												</div>
											</li>
										</ul>
									</div>

									<div class="pb-3">
										<div class="alert alert-warning">
											<i class="fa fa-check-square-o" aria-hidden="true"></i>Alert: Please ensure that you have selected the correct network before initiating your <strong>AEL</strong> deposit in the <strong>TRC-20</strong> network, as choosing the wrong network could result in the loss of your tokens.
										</div>
									</div>
									<div class="pb-3">
										<div class="row rowBox">
											<div class="col-lg-6 col-md-6 col-sm-6 col-12 columnBox">
												<!-- <v-autocomplete class="elevation-0 outlined" variant="outlined"
													:items="coninOp"  @blur="changeRoute"></v-autocomplete> -->
												<div class="form-group">
													<label class="labelName">Choose Currency</label>
													<select class="form-select" v-model="conin" @change="changeRoute">
														<option v-for="coin in coninOp">{{ coin }}</option>
													</select>
												</div>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-6 col-12 columnBox">
												<!-- <v-autocomplete class="elevation-0 outlined" variant="outlined"
													:items="networksOp" 
													@blur="changenework"></v-autocomplete> -->
												<div class="form-group">
													<label class="labelName">Network</label>
													<select class="form-select" v-model="networks" @change="changenework">
														<option v-for="symbol in networksOp" :value="symbol.chain">{{ symbol.chain }} ({{ symbol.network }})</option>

													</select>
												</div>
											</div>
										</div>


										<v-overlay :model-value="overlay" class="align-center justify-center">
											<v-progress-circular color="primary" indeterminate
												size="64"></v-progress-circular>
										</v-overlay>


										<div class="pb-3" v-if="depositAddress">
											<p>Deposit Address <span style="font-weight:bold;">{{ depositAddress }}
												</span> <span class="badge badge-outline-info"
													style="font-size: 12px;  margin-left: 8px;  border-radius: 10px;  border: 1px dotted #cb9a00;  color: #fec00f; cursor:pointer;"
													@click="clicktocopy">Copy</span></p>
										</div>

										<div class="" v-if="depositAddress">
											<p>Minimum deposit amount : <strong>0.001 {{ conin }}</strong></p>
											<p>Expected arrival : 12 Block confirmation</p>
											<!-- <p>Expected unlock : 15 Block confirmation</p> -->
											<p>*This address can only receive funds {{ conin }}</p>
											<p>*Please confirm again that the main network you selected is
												<strong>{{ networks }}</strong>
											</p>
										</div>
									</div>
								</div>
							</div>



							<div class="dashPanel">
								<div class="dashPanelHeader">
									<h2 class="title">Recent Deposit Record</h2>
								</div>
								<div class="dashPanelBody">
									<div class="">
										<div class="responsive_table_area">

											<table id="example" class="table soptTable" style="width:100%">
												<thead>
													<tr>
														<th>Token</th>
														<th>Amount</th>
														<th>Network</th>
														<th>From</th>
														<th>To</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody v-if="depositHistory.data">

													<tr class="order_item" v-for="deposit in depositHistory.data">
														<td data-title="Currency"> {{ deposit.depositincurrencu }}</td>
														<td data-title="Amount">{{ deposit.amount }}</td>
														<td data-title="Network">{{ deposit.network }}</td>
														<td data-title="Address">{{ deposit.owner_address }}</td>
														<td data-title="Address">{{ deposit.to_address }}</td>
														<td data-title="Status">{{ deposit.operationType }}</td>
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

		snackbar: false,
		snackbartext: null,

		overlay: false,

		conin: '',
		coninOp: [],
		networksOp: [],
		networks: 'Choose Transfer Network',

		coinList: [],

		depositAddress: null,

		depositHistory: [],

	}),
	methods: {

		changeRoute() {

			var netsd = [{chain:'Choose Transfer Network', network:''}];
			this.coinList.filter((value, key) => {

				if (this.conin == value.symbol) {
					netsd.push({chain:value.chain, network:value.network})
				}

			})

			this.networksOp = netsd;
		},

		getAllToken() {

			this.conin = this.$route.params.currency;

			axios.get('/api/getAllToken').then((response) => {

				this.coinList = response.data;

				var coninsd = [];
				var netsd = [{chain:'Choose Transfer Network', network:''}];
				response.data.filter((value, key) => {
					coninsd.push(value.symbol)
					if (this.conin == value.symbol) {
						netsd.push({chain:value.chain, network:value.network})
					}
				})

				console.log(coninsd);

				this.coninOp = coninsd;
				this.networksOp = netsd;

			})
		},

		changenework() {

			console.log(this.networks);

			var conin = this.conin;
			var networks = this.networks;

			if (networks != 'Choose Transfer Network') {
				this.getdepositeaddress(conin, networks);
			}

		},

		getdepositeaddress(coin, network) {
			this.overlay = true;
			var userid = localStorage.getItem('profileid')

			axios.get('/api/getdepositeaddress/' + coin + '/' + network + '/' + userid)
				.then((response) => {
					if (response.data) {
						this.depositAddress = response.data;
						this.overlay = false;
					}
				})
		},

		clicktocopy() {
			navigator.clipboard.writeText(this.depositAddress);
			this.snackbar = true;
			this.snackbartext = 'Copy';
		},


		getrecentdepositHistory() {


			var conin = this.$route.params.currency;
			var userid = localStorage.getItem('profileid')
			axios.get('/api/getrecentdepositHistory/' + conin + '/' + userid)
				.then((response) => {
					this.depositHistory = response.data;
				})
		}

	}, mounted() {
		this.getAllToken();
		this.getrecentdepositHistory();
	}


}
</script>
