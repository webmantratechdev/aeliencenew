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
						<li class="nav-item active">
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
									<h2 class="title" style="margin-bottom:5px;">Account Security</h2>
									<div class="d-flex align-items-center">
										<div class="icon" style=""><img src="/images/icon23.png" class="img-fuid icon"
												alt=""
												style="width: 28px;height: 28px;border-radius: 50%;margin: 0 10px 0 5px;">
										</div>
										<div class="content">
											<h6 style="margin-bottom:0px;">2FA Authentication.</h6>
										</div>
									</div>
								</div>
								<div class="dashPanelBody accountSecurityFeature">
									<div class="accountSecurityFeatureItem" style="">
										<h4>2FA Authentication</h4>


										<!-- <div class="accountSecurityFeatureListItem">
											<div class="d-flex justify-content-between align-items-center">
												<div class="d-flex leftSide">
													<div class="icon">
														<img src="/images/icon23.png" class="img-fuid icon" alt=""
															style="width: 28px;height: 28px;border-radius: 50%;margin: 0 10px 0 5px;">
													</div>
													<div class="content">
														<h5>Aelince/Google/Microsoft Authentication</h5>
														<p>Protect yor transaction and account security</p>
													</div>
												</div>
												<div class="middleSide">
													<p>Not Yet</p>
												</div>
												<div
													class="rightSide justify-content-between align-items-center btnLiast_area">
													<a href="#" class="defaultBtn">Bind</a>
												</div>
											</div>
										</div> -->

										<!-- <div class="accountSecurityFeatureListItem">
											<div class="d-flex justify-content-between align-items-center">
												<div class="d-flex leftSide">
													<div class="icon">
														<img src="/images/icon23.png" class="img-fuid icon" alt=""
															style="width: 28px;height: 28px;border-radius: 50%;margin: 0 10px 0 5px;">
													</div>
													<div class="content">
														<h5>Aelince/Google/Microsoft Authentication</h5>
														<p>Protect yor transaction and account security</p>
													</div>
												</div>
												<div class="middleSide">
													<p>Not Yet</p>
												</div>
												<div
													class="rightSide justify-content-between align-items-center btnLiast_area">
													<a href="#" class="defaultBtn">Change</a>
													<a href="#" class="defaultBtn">Unbind</a>
												</div>
											</div>
										</div> -->

										<div class="accountSecurityFeatureListItem">
											<div class="d-flex justify-content-between align-items-center">
												<div class="d-flex leftSide">
													<div class="icon">
														<img src="/images/icon23.png" class="img-fuid icon" alt=""
															style="width: 28px;height: 28px;border-radius: 50%;margin: 0 10px 0 5px;">
													</div>
													<div class="content">
														<h5>Aelince/Google Authentication</h5>
														<p>Protect yor transaction and account security</p>
													</div>
												</div>
												<div class="middleSide">
													<p>{{ email }}</p>
												</div>
												<div
													class="rightSide justify-content-between align-items-center btnLiast_area">
													<a href="#" class="defaultBtn">Change</a>
												</div>
											</div>
										</div>



									</div>



									<div class="accountSecurityFeatureItem" style="">
										<h4>Advanced security</h4>


										<div class="accountSecurityFeatureListItem">
											<div class="d-flex justify-content-between align-items-center">
												<div class="d-flex leftSide">
													<div class="icon">
														<img src="/images/icon23.png" class="img-fuid icon" alt=""
															style="width: 28px;height: 28px;border-radius: 50%;margin: 0 10px 0 5px;">
													</div>
													<div class="content">
														<h5>Login in Password</h5>
														<p>Protect yor transaction and account security</p>
													</div>
												</div>

												<div
													class="rightSide justify-content-between align-items-center btnLiast_area">
													<a class="defaultBtn" @click="changepassbox = true">Change</a>
												</div>
											</div>
										</div>
									</div>
									<div class="accountSecurityFeatureItem" style="">
										<h4>Account security</h4>
										<div class="accountSecurityFeatureListItem">
											<div class="d-flex justify-content-between align-items-center">
												<div class="d-flex leftSide">
													<div class="icon">
														<img src="/images/icon23.png" class="img-fuid icon" alt=""
															style="width: 28px;height: 28px;border-radius: 50%;margin: 0 10px 0 5px;">
													</div>
													<div class="content">
														<h5>Account activity</h5>
														<p>Recent login : 2023-01-25 09:11:06</p>
													</div>
												</div>

												<div
													class="rightSide justify-content-between align-items-center btnLiast_area">
													<a href="#" class="defaultBtn">More</a>
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

		<v-dialog transition="dialog-bottom-transition" style="max-width:450px;" v-model="changepassbox">
			<v-card>
				<v-card-title class="d-flex">Change Password <v-spacer></v-spacer> <v-btn variant="outlined"
						@click="changepassbox = false">X</v-btn></v-card-title>
				<v-card-text>
					<v-text-field variant="outlined" dense label="Old Password"
						v-model="opassword"></v-text-field>
					<v-text-field variant="outlined" dense label="New Password"
						v-model="npassword"></v-text-field>
					<v-text-field variant="outlined" dense label="Confirm Password" v-model="rpassword"></v-text-field>
					<v-btn variant="outlined" @click="changepasswordfun">Submit</v-btn>
				</v-card-text>
			</v-card>
		</v-dialog>


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

		changepassbox: false,

		email: null,

		opassword: null,
		npassword: null,
		rpassword: null,

		snackbar: false,
		snackbartext: null,
	}),
	methods: {
		getProfile() {
			let profileid = localStorage.getItem('profileid');
			axios.post('/api/getProfile', { profileid: profileid }).then((response) => {
				if (response.data.id) {
					var atrate = response.data.email.split('@')[1]

					this.email = response.data.email.slice(0, 2) + '***@' + atrate;
				} else {
					this.$router.push('/login');
				}
			})
		},
		changepasswordfun() {
			if (this.npassword == null || this.rpassword == null) {
				this.snackbar = true;
				this.snackbartext = 'Enter password';
				return false;
			}

			if (this.npassword == this.rpassword) {

				var dataString = {
					profileid: localStorage.getItem('profileid'),
					password: this.rpassword,
				}
				axios.post('/api/userchangepassowrd', dataString).then((response) => {
					if (response.data == 1) {
						this.snackbar = true;
						this.snackbartext = 'Password has been changed..';
						this.changepassbox = false;
					}
				})

			} else {
				this.snackbar = true;
				this.snackbartext = 'Password Not matched..';
			}
		}
	}, mounted() {
		this.getProfile()
	}


}
</script>
