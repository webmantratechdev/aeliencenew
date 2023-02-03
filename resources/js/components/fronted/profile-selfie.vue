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
							<div class="step done" data-desc="Govt. ID">2</div>
							<div class="step active" data-desc="Selfie">3</div>
							<div class="step " data-desc="Success">4</div>
						</div>
					</div>

					
						<div class="userProfilePageStepDtls_area">
							<div class="userProfilePageStepForm_area">
								<div class="userProfilePageStepForm_areainner">
									<h2 class="title">Selfie</h2>

									<div class="row row_box">

										<div class="col-lg-12 col-md-12 col-sm-12 col-12 column_box">
											<div class="form-group">
												<label class="text-center">Upload Selfie Image</label>
												<div class="img_upload_area selfieImg_upload_area">
													<div class="box">
														<div class="js--image-preview"
														:style="'background-image: url(/upload/'+selfie+');'">
														</div>
														<div class="upload-options">
															<label>
																<i class="fa fa-camera" aria-hidden="true"></i>
																<input type="file" name="selfie" class="image-upload"
																	capture="user" accept="image/*" required v-on:change="frontonFileChange">
															</label>
														</div>
													</div>

												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="backNextBtn_area">
								<input type="hidden" name="email" value="<?=$_REQUEST['email']?>">
								<router-link class="back_btn" to="/govtid"><i
										class="fa fa-angle-left" aria-hidden="true"></i> <span class="txt">Back</span>
								</router-link>
								<button type="submit" name="continue_selfie" class="next_btn" @click="updateselfie"><span
										class="txt">Continue</span> <i class="fa fa-angle-right"
										aria-hidden="true"></i></button>
							</div>
						</div>
			
				</div>
			</div>

		</section>
	</div>
</template>

<script>
	export default{
		data: () => ({
		    selfie:null,
		}),
		methods:{
			frontonFileChange(e) {
				let formData = new FormData();
				formData.append('file', e.target.files[0])
				axios.post('/api/uploadDocument', formData).then((response) => {
					this.selfie = response.data;
                })
			},
			
			updateselfie() {
				var dataString = {
					profileid: localStorage.getItem('profileid'),
					selfie: this.selfie,

				}

				axios.post('/api/updateselfie', dataString).then((response) => {
					
					this.$router.push('/kyc-pending');

                })
			}

		},
	}
</script>