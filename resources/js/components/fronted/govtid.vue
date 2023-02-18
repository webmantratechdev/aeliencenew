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
							<div class="step done" data-desc="Personal Information">1</div>
							<div class="step active" data-desc="Govt. ID">2</div>
							<div class="step " data-desc="Selfie">3</div>
							<div class="step " data-desc="Success">4</div>
						</div>
					</div>


					<div class="userProfilePageStepDtls_area">
						<div class="userProfilePageStepForm_area">
							<div class="userProfilePageStepForm_areainner">
								<h2 class="title">Upload Govt. ID</h2>
								<div class="d-block w-100 mb-5">
									In order to complete, please upload any of the following personal documents.<br>
									<span style="color:rgb(254, 192, 15)">1. PASSPORT</span><br>
									<span style="color:rgb(254, 192, 15)">2. NATIONAL ID CARD</span><br>
									<span style="color:rgb(254, 192, 15)">3. DRIVER’S LICENSE</span><br>

									To avoid delays with verification process, please double-check to ensure the below
									requirements are fully met:<br>

									<span style="color:rgb(254, 192, 15)">a. Chosen credential must not be
										expired.</span><br>
									<span style="color:rgb(254, 192, 15)">b. Document should be in good condition and
										clearly visible.</span><br>
									<span style="color:rgb(254, 192, 15)">c. There is no light glare or reflections on
										the card.</span><br>
									<span style="color:rgb(254, 192, 15)">d. File is at least 1 MB in size and has at
										least 300 dpi resolution.</span><br>
								</div>
								<div class="row row_box">
									<div class="col-lg-6 col-md-6 col-sm-12 col-12 column_box">
										<div class="form-group">
											<label>Govt. ID (Front Side)</label>

											<div class="img_upload_area">
												<div class="box">
													<div class="js--image-preview" :style="'background-image: url(/upload/' + front + ');'">
														<div class="d-flex align-center justify-center fill-height" v-if="fronalert != null">
															<v-progress-circular
															color="grey-lighten-4"
															indeterminate
															></v-progress-circular>
														</div>
													</div>
													<div class="upload-options">
														<label>
															<i class="fa fa-camera" aria-hidden="true"></i>
															<input type="file" name="aadhar_front" class="image-upload"
																accept="image/*" capture="camera" required
																v-on:change="frontonFileChange">
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-12 col-12 column_box">
										<div class="form-group">
											<label>Govt. ID (Back Side)</label>
											<div class="img_upload_area">
												<div class="box">
													<div class="js--image-preview" :style="'background-image: url(/upload/' + back + ');'">
														<div class="d-flex align-center justify-center fill-height" v-if="backalert != null">
															<v-progress-circular
															color="grey-lighten-4"
															indeterminate
															></v-progress-circular>
														</div>
													</div>
													<div class="upload-options">
														<label>
															<i class="fa fa-camera" aria-hidden="true"></i>
															<input type="file" name="aadhar_back" class="image-upload"
																accept="image/*" capture="camera" required
																v-on:change="backonFileChange">
														</label>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="col-lg-12 col-md-12 col-sm-12 col-12">
										<label><input type="checkbox" class="mr-3" v-model="term1">I agree to the
											<router-link to="/termsofuse" class="text-white">terms of
												service</router-link> and <router-link to="/privacy-policy"
												class="text-white">privacy policy</router-link></label>
										<label><input type="checkbox" class="mr-3" v-model="term2">All the personal
											information I have entered is correct.</label>
										<label><input type="checkbox" class="mr-3" v-model="term3">I certify that, I am
											registering to participate in the trading platform in the capacity of an
											individual (and beneficial owner) and not as an agent or representative of a
											third party corporate entity.</label>
									</div>


								</div>
							</div>
						</div>
						<div class="backNextBtn_area">
							<input type="hidden" name="email" value="<?=$_REQUEST['email']?>">
							<router-link class="back_btn" to="/profile-info">
								<i class="fa fa-angle-left" aria-hidden="true"></i> <span class="txt">Back</span>
							</router-link>
							<button class="next_btn" @click="updateaadahd"><span class="txt">Continue</span> <i
									class="fa fa-angle-right" aria-hidden="true"></i></button>
						</div>
					</div>

				</div>
			</div>

		</section>

		<v-snackbar v-model="snackbar">
			{{ snackbartext }}
		</v-snackbar>

	</div>
</template>

<script>
export default {
	data: () => ({
		front: null,
		back: null,

		term1: null,
		term2: null,
		term3: null,

		snackbar: false,
		snackbartext: null,


		fronalert: null,
		backalert: null,
	}),
	methods: {
		frontonFileChange(e) {
			this.fronalert = true;
			let formData = new FormData();
			formData.append('file', e.target.files[0])
			axios.post('/api/uploadDocument', formData).then((response) => {
				this.front = response.data;
				this.fronalert = null;
			})
		},
		backonFileChange(e) {
			this.backalert = true;
			let formData = new FormData();
			formData.append('file', e.target.files[0])
			axios.post('/api/uploadDocument', formData).then((response) => {
				this.back = response.data;
				this.backalert = null;
			})
		},
		updateaadahd() {
			if (this.term1 == null || this.term2 == null || this.term3 == null) {
				this.snackbar = true;
				this.snackbartext = 'Please accept the terms';
			} else {
				var dataString = {
					profileid: localStorage.getItem('profileid'),
					front: this.front,
					back: this.back,
				}

				axios.post('/api/updatedocument', dataString).then((response) => {

					this.$router.push('/profile-selfie');

				})
			}
		}

	},
}
</script>