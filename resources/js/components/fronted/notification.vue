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
					</ul>
				</div>
				<div class="themeDashboarMainArea">
					<div class="container-fluid">
						<div class="themeDashboarMainAreainner">
							<div class="dashPanel">
								<div class="d-flex justify-content-between align-items-center dashPanelHeader">
									<div class="leftSide">
										<h2 class="title">Notification</h2>
									</div>
									<div class="rightSide">
										<ul class="d-flex align-items-center rightSideList">
											<li class=""><a href="#"><i class="fa-light fa-envelope"></i></a></li>
											<li class=""><a href="#"><i class="fa-light fa-trash"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="dashPanelBody">
									<div class="dashNotificationList_area">
										<!-- 
										<div class="dashNotificationListItem">
											<div class="d-flex justify-content-between dashNotificationListIteminner">
												<div class="d-flex leftSide">
													<div class="icon">
														<img src="images/notification.png" class="img-fluid" alt="">
													</div>
													<div class="content">
														<h5>Aelince January Benifits Event: Tens of Thousand of Bonuses
															to Share!</h5>
														<p>To start the New Year and to thank you for your greate
															support over the past year, Aelince is offering you
															thousands of cash pr...</p>
													</div>
												</div>
												<div class="rightSide">
													<p>2023-01-21 12:32:12</p>
												</div>
											</div>
										</div>

										<div class="dashNotificationListItem">
											<div class="d-flex justify-content-between dashNotificationListIteminner">
												<div class="d-flex leftSide">
													<div class="icon">
														<img src="images/notification.png" class="img-fluid" alt="">
													</div>
													<div class="content">
														<h5>Aelince January Benifits Event: Tens of Thousand of Bonuses
															to Share!</h5>
														<p>To start the New Year and to thank you for your greate
															support over the past year, Aelince is offering you
															thousands of cash pr...</p>
													</div>
												</div>
												<div class="rightSide">
													<p>2023-01-21 12:32:12</p>
												</div>
											</div>
										</div>

										<div class="dashNotificationListItem">
											<div class="d-flex justify-content-between dashNotificationListIteminner">
												<div class="d-flex leftSide">
													<div class="icon">
														<img src="images/notification.png" class="img-fluid" alt="">
													</div>
													<div class="content">
														<h5>Aelince January Benifits Event: Tens of Thousand of Bonuses
															to Share!</h5>
														<p>To start the New Year and to thank you for your greate
															support over the past year, Aelince is offering you
															thousands of cash pr...</p>
													</div>
												</div>
												<div class="rightSide">
													<p>2023-01-21 12:32:12</p>
												</div>
											</div>
										</div> -->

										<div class="alert alert-warning" role="alert">
											<i class="fa fa-exclamation-triangle" aria-hidden="true"></i> 
											Notification not found
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

	}),
	methods: {
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
		this.getProfile()
	}


}
</script>