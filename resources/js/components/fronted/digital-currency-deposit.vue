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
						<!-- <li class="nav-item">
							<a href="#" class="nav-link">
								<span class="icon"><i class="fa-light fa-list-dropdown"></i></span>
								<span class="txt">Futures</span>
							</a>
						</li> -->
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
											<li>
												<div class="content">
													<h4>Initiate Deposit</h4>
													<p>Initiate a withdrawl on the other party's platform</p>
												</div>
											</li>
											<li>
												<div class="content">
													<h4>Network Confirmation</h4>
													<p>Wait for the blockchain network to confirm your transfer</p>
												</div>
											</li>
											<li>
												<div class="content">
													<h4>Successful Deposit</h4>
													<p>After blockchain confirmation,Aelince will post it for you.</p>
												</div>
											</li>
										</ul>
									</div>


									<div class="pb-3">
										<div class="row rowBox">
											<div class="col-lg-6 col-md-6 col-sm-6 col-12 columnBox">
												<div class="form-group">
													<label class="labelName">Choose Currency</label>
													<select class="form-select">
														<option>Dllar</option>
														<option>Rupee</option>
														<option>Euro</option>
													</select>
												</div>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-6 col-12 columnBox">
												<div class="form-group">
													<label class="labelName">Network</label>
													<select class="form-select">
														<option>BINNANCE SMART CHAIN (BEP20)</option>
														<option>BINNANCE SMART CHAIN (BEP20)</option>
														<option>BINNANCE SMART CHAIN (BEP20)</option>
													</select>
												</div>
											</div>
										</div>

										<div class="pb-3">
											<p>Deposit Address Oxedled8967</p>
										</div>

										<div class="">
											<p>Minimum deposit amount : <strong>0,000000001 USDT</strong></p>
											<p>Expected arrival : 15 Block confirmation</p>
											<p>Expected unlock : 15 Block confirmation</p>
											<p>*This address can only receive funds USDT</p>
											<p>*Please confirm again that the main network you selected is
												<strong>BINNANCE SMART CHAIN (BEP20)</strong>
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
														<th>Title</th>
														<th>Currency</th>
														<th>Amount</th>
														<th>Network</th>
														<th>Address</th>
														<th>TXID</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>

													<tr class="order_item">
														<td data-title="Title">Tamal Bagchi</td>
														<td data-title="Currency">Dollar</td>
														<td data-title="Amount">₹2400</td>
														<td data-title="Network">********</td>
														<td data-title="Address">********</td>
														<td data-title="TXID">********</td>
														<td data-title="Status">********</td>
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

		tradedata() {
			axios.get('https://api.coincap.io/v2/assets?Authorization=Bearer')
				.then((response) => {
					this.coinList = response.data.data;
					console.log(response.data.data);
				})
		},

		getProfile() {
			let profileid = localStorage.getItem('profileid');
			axios.post('/api/getProfile', { profileid: profileid }).then((response) => {
				if (response.data.id) {

				} else {
					this.$router.push('/login');
				}
			})
		}
	}, mounted() {
		this.tradedata();
		this.getProfile()
	}


}
</script>
