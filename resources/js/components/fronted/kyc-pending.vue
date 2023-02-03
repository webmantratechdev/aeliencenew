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
							<div class="step done" data-desc="Selfie">3</div>
							<div class="step done" data-desc="Success">4</div>
						</div>
					</div>
					<div class="userProfilePageStepDtls_area">
						<div class="userProfilePageStepForm_area">
							<div class="userProfilePageStepForm_areainner">
								<form>
									<div class="successFld_area">

										<img src="images/success_img.png" class="img-fluid success_img"
											style="max-width:100px;">
										<h2 style="font-size: 1.6rem;">Congrats! Your Profile Received.</h2>
										<p>Your verification has been submitted and under review by Aelince Team.</p>
										<div style="color:#818181; padding-bottom:20px;">
											people are on the waiting list.
										</div>
										<router-link  to="/overview" class="backToHomeBtn"> <span class="txt">Go to Home </span>
											<i class="fa fa-angle-right" aria-hidden="true"></i>
										</router-link>

									</div>
								</form>
							</div>
						</div>

					</div>
				</div>
			</div>

		</section>
	</div>
</template>