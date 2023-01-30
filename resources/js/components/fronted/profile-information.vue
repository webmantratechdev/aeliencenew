<template>
    <div>
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
		<a href="#" class="nav-link">
		<span class="icon"><i class="fa-regular fa-wallet"></i></span>
		<span class="txt">Overview</span>
		</a>
		</li>
		<li class="nav-item">
		<a href="#" class="nav-link">
		<span class="icon"><i class="fa-regular fa-flower"></i></span>
		<span class="txt">Spot</span>
		</a>
		</li>
		<li class="nav-item">
		<a href="#" class="nav-link">
		<span class="icon"><i class="fa-light fa-list-dropdown"></i></span>
		<span class="txt">Futures</span>
		</a>
		</li>
		<li class="nav-item">
		<a href="#" class="nav-link">
		<span class="icon"><i class="fa-light fa-calendar-clock"></i></span>
		<span class="txt">Wallet History</span>
		</a>
		</li>
		<li class="nav-item active">
		<a href="#" class="nav-link">
		<span class="icon"><i class="fa-regular fa-user"></i></span>
		<span class="txt">Profile Information</span>
		</a>
		</li>
		<li class="nav-item">
		<a href="#" class="nav-link">
		<span class="icon"><i class="fa-light fa-address-card"></i></span>
		<span class="txt">ID-Verification</span>
		</a>
		</li>
		<li class="nav-item">
		<a href="#" class="nav-link">
		<span class="icon"><i class="fa-light fa-file-invoice"></i></span>
		<span class="txt">Account Security</span>
		</a>
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
		</div>
		<div class="dashPanelBody">
			
			<div class="row rowBox">
			<div class="col-lg-4 col-md-6 col-sm-12 col-12 columnBox">
			<div class="form-group">
			<div class="uploadPicArea">
			<img src="images/uploadImage.jpg" class="img-fluid" alt="">			
			</div>
			<div class="formGroupinner">
			<input type="file" class="form-control" placeholder="">
			</div>
			</div>
			</div>
			</div>
			<div class="row rowBox">
			
			<div class="col-lg-4 col-md-4 col-sm-6 col-12 columnBox">
			<div class="form-group">
			<label class="labelName">First Name</label>
			<input type="text" class="form-control" placeholder="admin">
			</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-12 columnBox">
			<div class="form-group">
			<label class="labelName">Last Name</label>
			<input type="text" class="form-control" placeholder="lastname">
			</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-12 columnBox">
			<div class="form-group">
			<label class="labelName">Email</label>
			<input type="text" class="form-control" placeholder="demo@gmail.com">
			</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-12 columnBox">
			<div class="form-group">
			<label class="labelName">Address</label>
			<input type="text" class="form-control" placeholder="there">
			</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-12 columnBox">
			<div class="form-group">
			<label class="labelName">City</label>
			<input type="text" class="form-control" placeholder="somehere">
			</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-12 columnBox">
			<div class="form-group">
			<label class="labelName">State</label>
			<input type="text" class="form-control" placeholder="here122">
			</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-12 columnBox">
			<div class="form-group">
			<label class="labelName">Zip</label>
			<input type="text" class="form-control" placeholder="000000">
			</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-6 col-12 columnBox">
			<div class="form-group">
			<label class="labelName">Country</label>			
			<select class="form-select">
			<option>India</option>
			<option>Pakistan</option>
			<option>Nepal</option>
			</select>
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
			<button type="button" class="updateBtn">Update</button>
			</div>
			</div>
		
		
		</div>	
		
		
		</form>
		
		
		
		
	</div>	
	</div>	
	</div>	
	</div>
	</section>
    </div>
</template>