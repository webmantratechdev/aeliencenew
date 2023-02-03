<template>
	<div>
		<section class="userProfilePage_sec">
			<div class="userProfilePage_secinner">
				<div class="userProfilePageStep_area">
					<div class="heading_area">
						<h2 class="ttl"><span class="crypto">KYC</span> <span class="partner">Verification</span></h2>
					</div>
					<div class="userProfilePageStepList_area">
						<div id="steps" class="userProfilePageStep">
							<div class="step active" data-desc="Personal Information">1</div>
							<div class="step " data-desc="Govt. ID">2</div>
							<div class="step " data-desc="Selfie">3</div>
							<div class="step " data-desc="Success">4</div>
						</div>
					</div>

					<div class="userProfilePageStepDtls_area">
						<div class="userProfilePageStepForm_area">
							<div class="userProfilePageStepForm_areainner">
								<h2 class="title">Personal Information</h2>
								<div class="row row_box">
									<div class="col-lg-6 col-md-6 col-sm-12 col-12 column_box">
										<div class="form-group">
											<label>Full Name<span style="color:#fec00f">*</span></label>
											<input type="text" name="fullname" class="form-control" v-model="fullname">
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12 col-12 column_box">
										<div class="form-group">
											<label>Phone No.<span style="color:#fec00f">*</span></label>
											<input type="number" name="phone" class="form-control" v-model="phone">
										</div>
									</div>

									<div class="col-lg-12 col-md-12 col-sm-12 col-12 column_box">
										<div class="form-group">
											<label>Address<span style="color:#fec00f">*</span></label>
											<textarea class="form-control" v-model="addresss"></textarea>
										</div>
									</div>

									<div class="col-lg-6 col-md-6 col-sm-12 col-12 column_box">
										<div class="form-group">
											<label>Country<span style="color:#fec00f">*</span></label>
											<select class="form-control" v-model="country"
												@change="changeCountry($event)">
												<option value="" selected>Select Country</option>
												<option v-for="country in countryOp" :value="country.phonecode">
													{{ country.name }}
												</option>
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12 col-12 column_box">
										<div class="form-group">
											<label>State<span style="color:#fec00f">*</span></label>
											<select class="form-control" v-model="statesd"
												@change="changeState($event)">
												<option value="" selected>Select State</option>
												<option v-for="state in stateOp" :value="state.id">
													{{ state.name }}
												</option>
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12 col-12 column_box">
										<div class="form-group">
											<label>City<span style="color:#fec00f">*</span></label>
											<select class="form-control" v-model="city">
												<option value="" selected>Select City</option>
												<option v-for="city in cityOp" :value="city.name">
													{{ city.name }}
												</option>
											</select>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12 col-12 column_box">
										<div class="form-group">
											<label>Pincode<span style="color:#fec00f">*</span></label>
											<input type="text" class="form-control" v-model="pincode">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="backNextBtn_area">
							<button @click="updatebasicinfo" class="next_btn"><span class="txt">Continue</span> <i
									class="fa fa-angle-right"></i></button>
						</div>
					</div>


				</div>
			</div>
		</section>
	</div>
</template>

<script>
export default {
	data: () => ({

		countryOp: [],
		stateOp: [],
		cityOp: [],

		fullname: null,
		phone: null,
		addresss: null,
		country: null,
		statesd: null,
		city: null,
		pincode: null,

	}),
	methods: {

		updatebasicinfo() {
			var dataString = {
				profileid: localStorage.getItem('profileid'),
				fullname: this.fullname,
				phone: this.phone,
				addresss: this.addresss,
				state: this.statesd,
				city: this.city,
				pincode: this.pincode,
				country: this.country,
			}

			axios.post('/api/updatebasicinfo', dataString).then((response) => {

				this.$router.push('/govtid');

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
		},

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
		}


	},
	created() {
		this.getProfile()
		this.getAllcountry();
	}

}
</script>