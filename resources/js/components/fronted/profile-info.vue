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
		 
		 <form name="signup" method="post" action="">
		   <div class="userProfilePageStepDtls_area">
			  <div class="userProfilePageStepForm_area">
				 <div class="userProfilePageStepForm_areainner">
					<h2 class="title">Personal Information</h2>
					<div class="row row_box">
					   <div class="col-lg-6 col-md-6 col-sm-12 col-12 column_box">
						  <div class="form-group">
							 <label>Full Name<span style="color:#fec00f">*</span></label>
							 <input type="text" name="fullname" class="form-control" required="">
						  </div>
					   </div>
					   <!--<div class="col-lg-6 col-md-6 col-sm-12 col-12 column_box">
						  <div class="form-group">
						  <label>Email</label>
						  <input type="email" class="form-control" required="">
						  </div>
						  </div>-->
					   <div class="col-lg-6 col-md-6 col-sm-12 col-12 column_box">
						  <div class="form-group">
							 <label>Phone No.<span style="color:#fec00f">*</span></label>
							 <input type="number" name="phone" class="form-control" required="">
						  </div>
					   </div>
					   <input type="hidden" class="form-control" value="<?=$_REQUEST['email']?>" readonly>
					   <!--<div class="col-lg-6 col-md-6 col-sm-12 col-12 column_box">
						  <div class="form-group">
							 <label>Email</label>
							 
						  </div>
					   </div>-->
					   <div class="col-lg-12 col-md-12 col-sm-12 col-12 column_box">
						  <div class="form-group">
							 <label>Address 1<span style="color:#fec00f">*</span></label>
							 <textarea name="address1" class="form-control" required=""></textarea>
						  </div>
					   </div>
					   <div class="col-lg-12 col-md-12 col-sm-12 col-12 column_box">
						  <div class="form-group">
							 <label>Address 2</label>
							 <textarea name="address2" class="form-control"></textarea>
						  </div>
					   </div>
					   <div class="col-lg-6 col-md-6 col-sm-12 col-12 column_box">
						  <div class="form-group">
							 <label>Country<span style="color:#fec00f">*</span></label>
							 <select name="country" class="form-control" required>
								<option select>Select Country</option>
								<?php $country = mysqli_query($CONN, "SELECT * FROM `country` ORDER BY name ASC"); 
								   while($countryArr = mysqli_fetch_array($country)) { ?>
								<option value="<?=$countryArr['id']?>"><?=$countryArr['name']?></option>
								<?php } ?>
							 </select>
						  </div>
					   </div>
					   <div class="col-lg-6 col-md-6 col-sm-12 col-12 column_box">
						  <div class="form-group">
							 <label>State<span style="color:#fec00f">*</span></label>
							 <input type="text" name="state" class="form-control" required="">
						  </div>
					   </div>
					   <div class="col-lg-6 col-md-6 col-sm-12 col-12 column_box">
						  <div class="form-group">
							 <label>City<span style="color:#fec00f">*</span></label>
							 <input type="text" name="city" class="form-control" required="">
						  </div>
					   </div>
					   <div class="col-lg-6 col-md-6 col-sm-12 col-12 column_box">
						  <div class="form-group">
							 <label>Pincode<span style="color:#fec00f">*</span></label>
							 <input type="text" name="pincode" class="form-control" required="">
						  </div>
					   </div>
					</div>
				 </div>
			  </div>
			  <div class="backNextBtn_area">
				 <!--<a href="#" class="back_btn"><i class="fa fa-angle-left" aria-hidden="true"></i> <span class="txt">Back</span> </a>-->
				 <button type="submit" name="continue_govt" class="next_btn"><span class="txt">Continue</span> <i class="fa fa-angle-right" aria-hidden="true"></i></button>
			  </div>
		   </div>
		</form>
		  
		  </div>
		 </div>
		
		</div>
    </section>
    </div>
</template>