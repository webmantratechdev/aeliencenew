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
						<li class="nav-item active">
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
							<form>
								<div class="dashPanel">
									<div class="dashPanelHeader">
										<div class="leftSide">
											<h2 class="title">Profile Information</h2>
											<p>Update your account's profile information and email address.</p>
										</div>

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

										<div class="row rowBox">
											<div class="col-lg-2 col-md-2 col-sm-12 col-12 columnBox">

												<div class="form-group">
													<label>Photo</label>
													<div class="img_upload_area">
														<div class="box">
															<div class="js--image-preview"
																:style="'background-image: url(/upload/' + profile + ');'">
															</div>
															<div class="upload-options">
																<label>
																	<i class="fa fa-camera" aria-hidden="true"></i>
																	<input type="file" name="aadhar_back"
																		class="image-upload" accept="image/*"
																		capture="camera" required
																		v-on:change="uploadProfile">
																</label>
															</div>
														</div>
													</div>
												</div>

											</div>
										</div>
										<div class="row rowBox">

											<div class="col-lg-4 col-md-4 col-sm-6 col-12 columnBox">
												<div class="form-group">
													<label class="labelName">Name</label>
													<input type="text" class="form-control" placeholder="admin"
														v-model="name">
												</div>
											</div>

											<div class="col-lg-4 col-md-4 col-sm-6 col-12 columnBox">
												<div class="form-group">
													<label class="labelName">Email</label>
													<input type="text" class="form-control" placeholder="demo@gmail.com"
														v-model="email">
												</div>
											</div>
											<div class="col-lg-4 col-md-4 col-sm-6 col-12 columnBox">
												<div class="form-group">
													<label class="labelName">Address</label>
													<input type="text" class="form-control" placeholder="there"
														v-model="address">
												</div>
											</div>
											<div class="col-lg-4 col-md-4 col-sm-6 col-12 columnBox">
												<div class="form-group">
													<label class="labelName">Country :( {{ country }} )</label>
													<select class="form-control" v-model="country"
														@change="changeCountry($event)">
														<option>Select Country</option>
														<option v-for="countrys in countryOp"
															:value="countrys.phonecode"> {{ countrys.name }}
														</option>
													</select>
												</div>
											</div>

											<div class="col-lg-4 col-md-4 col-sm-6 col-12 columnBox">
												<div class="form-group">
													<label class="labelName">State : ( {{ state }})</label>
													<select class="form-control" v-model="state"
														@change="changeState($event)">
														<option value="" selected>Select State</option>
														<option v-for="state in stateOp" :value="state.id">
															{{ state.name }}
														</option>
													</select>
												</div>
											</div>

											<div class="col-lg-4 col-md-4 col-sm-6 col-12 columnBox">
												<div class="form-group">
													<label class="labelName">City : ({{ city }})</label>
													<select class="form-control" v-model="city">
														<option value="" selected>Select City</option>
														<option v-for="city in cityOp" :value="city.name">
															{{ city.name }}
														</option>
													</select>
												</div>
											</div>

											<div class="col-lg-4 col-md-4 col-sm-6 col-12 columnBox">
												<div class="form-group">
													<label class="labelName">Zip</label>
													<input type="text" class="form-control" placeholder="000000"
														v-model="zip">
												</div>
											</div>

											<div class="col-lg-4 col-md-4 col-sm-6 col-12 columnBox">
												<div class="reSubmitBtnArea">
													<button type="button" class="reSubmitBtn">Resubmit KYC</button>
												</div>
											</div>
										</div>
									</div>

									<div class="dashPanelFooter">
										<div class="updateBtnArea text-end">
											<button type="button" class="updateBtn"
												@click="updateprofilebyadmin">Update</button>
										</div>
									</div>
								</div>
							</form>
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

		countryOp: [],
		stateOp: [],
		cityOp: [],


		name: null,
		email: null,
		address: null,
		city: null,
		state: null,
		zip: null,
		country: null,
		status: null,
		profile: null,
		aadhar_front: null,
		aadhar_front: null,

		snackbar: false,
		snackbartext: null,

	}),
	methods: {

		getAllcountry() {
			axios.get('/api/getAllcountry').then((response) => {

				this.countryOp = response.data;
			})
		},

		getallStatebycountry(countrycode) {
			if (countrycode) {
				axios.get('/api/getallStatebycountry/' + countrycode).then((response) => {
					this.stateOp = response.data;
				})
			} else {
				this.stateOp = [];
			}
		},

		getallCitybystate(stateid) {
			if (stateid) {
				axios.get('/api/getallCitybystate/' + stateid).then((response) => {
					this.cityOp = response.data;
				})
			} else {
				this.cityOp = [];
			}

		},

		changeCountry(event) {
			this.getallStatebycountry(event.target.value);
		},

		changeState(event) {
			this.getallCitybystate(event.target.value);
		},

		getProfile() {
			let profileid = localStorage.getItem('profileid');
			axios.post('/api/getProfile', { profileid: profileid }).then((response) => {
				if (response.data.id) {
					this.name = response.data.name;
					this.email = response.data.email;
					this.address = response.data.address;
					this.city = response.data.city;
					this.state = response.data.state;
					this.zip = response.data.zip;
					this.country = response.data.country;
					this.aadhar_front = response.data.aadhar_front
					this.aadhar_back = response.data.aadhar_back
					this.status = response.data.status;
					this.profile = response.data.profile;
				} else {
					this.$router.push('/login');
				}
			})
		},
		updateprofilebyadmin() {
			var userid = localStorage.getItem('profileid');
			var dataString = {
				userid: userid,
				name: this.name,
				email: this.email,
				phone: this.phone,
				address: this.address,
				city: this.city,
				country: this.country,
				zip: this.zip,
				state: this.state,
				aadhar_front: this.aadhar_front,
				aadhar_back: this.aadhar_back,
				profile: this.profile,
				status: this.status,
			}
			axios.post('/api/updateprofilebyadmin', dataString).then((response) => {
				if (response.data == 1) {
					this.snackbar = true;
					this.snackbartext = 'Profile updated....';
				} else {
					this.snackbar = true;
					this.snackbartext = 'Somthing went wrong...';
				}
			})
		},
		uploadProfile(e) {
			let formData = new FormData();
			formData.append('file', e.target.files[0])
			axios.post('/api/uploadDocument', formData).then((response) => {
				this.profile = response.data;
			})
		}



	}, mounted() {
		this.getProfile()
		this.getAllcountry();
	}


}
</script>