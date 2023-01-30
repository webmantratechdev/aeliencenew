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
		  
		  <form action="" method="post" enctype="multipart/form-data">
			   <div class="userProfilePageStepDtls_area">
				  <div class="userProfilePageStepForm_area">
					 <div class="userProfilePageStepForm_areainner">
						<h2 class="title">Upload Govt. ID</h2>
						<div class="row row_box">
						   <div class="col-lg-6 col-md-6 col-sm-12 col-12 column_box">
							  <div class="form-group">
								 <label>Govt. ID (Front Side)</label>
								 <div class="img_upload_area">
									<div class="box">
									   <div class="js--image-preview" style="background-image: url(images/img_upload_bg.png);"></div>
									   <div class="upload-options">
										  <label>
										  <i class="fa fa-camera" aria-hidden="true"></i>
										  <input type="file" name="aadhar_front" class="image-upload" accept="image/*" capture="camera" required>
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
									   <div class="js--image-preview" style="background-image: url(images/img_upload_bg.png);"></div>
									   <div class="upload-options">
										  <label>
										  <i class="fa fa-camera" aria-hidden="true"></i>
										  <input type="file" name="aadhar_back" class="image-upload" accept="image/*" capture="camera" required>
										  </label>
									   </div>
									</div>
								 </div>
							  </div>
						   </div>
						   <!--
							  <div class="col-lg-12 col-md-12 col-sm-12 col-12 column_box">
							  <div class="contact_btn_area">			
							  <button class="btn btn-exchange contact_btn">Send Message</button>
							  </div>
							  </div>
							  -->
						</div>
					 </div>
				  </div>
				  <div class="backNextBtn_area">
					 <input type="hidden" name="email" value="<?=$_REQUEST['email']?>">
					 <a href="profile-info.php?email=<?=$_REQUEST['email']?>" class="back_btn"><i class="fa fa-angle-left" aria-hidden="true"></i> <span class="txt">Back</span> </a>
					 <button type="submit" name="continue_selfie" class="next_btn"><span class="txt">Continue</span> <i class="fa fa-angle-right" aria-hidden="true"></i></button>
				  </div>
			   </div>
			</form>
		  </div>
		 </div>
		</div>
    </section>   
    </div>
</template>