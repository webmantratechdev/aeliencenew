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
		<li class="nav-item active">
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
		<li class="nav-item">
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
		<div class="dashPanel">
		<div class="dashPanelHeader">
		<h2 class="title">Sopt</h2>
		</div>
		<div class="dashPanelBody">
		<ul class="overviewList">
		<li class="active"><a href="#" class="defaultBtn">Deposit</a></li>
		<li><a href="#" class="defaultBtn">Withdraw</a></li>
		<li><a href="#" class="defaultBtn">Transfer</a></li>
		<li><a href="#" class="defaultLink">Wallet History</a></li>
		</ul>		
		</div>
		</div>	
		
		<div class="dashPanel">		
		<div class="dashPanelBody">
			<div class="">
			<h5>Spot assets </h5>
			<p>******** <sub>BTS*s *******</sub></p>
			
			</div>
		</div>
		</div>
		
		<div class="dashPanel">		
		<div class="dashPanelBody">
			<div class="row rowBox align-items-center">
				<div class="col-lg-3 col-md-4 col-sm-12 col-12 columnBox">
				<div class="soptSreachArea">
				<div class="d-flex soptSreachAreainner">
				<button type="button" class="soptSreachBtn"><i class="fa-regular fa-magnifying-glass"></i></button>
				<input type="text" class="form-control soptSreachInput" placeholder="Search">
				</div>
				</div>				
				</div>
				<div class="col-lg-4 col-md-4 col-sm-12 col-12 columnBox">
				<div class="soptcheckboxArea">
				<div class="form-check">
				  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
				  <label class="form-check-label" for="flexCheckDefault">
					Hide 0 Balance
				  </label>
				</div>
				</div>
				</div>
			</div>
		</div>
		</div>
		
		<div class="dashPanel">		
		<div class="dashPanelBody">
			<div class="responsive_table_area">
			
			<table id="example" class="table soptTable" style="width:100%">
        <thead>
            <tr>
                <th>Currency</th>
                <th>All</th>
                <th>Available</th>
                <th>In Order</th>
                <th>BTC Equity Value</th>
                <th>Opration</th>
            </tr>
        </thead>
        <tbody>
            <tr class="order_item">
                <td data-title="Currency">
				<div class="d-inline-flex align-items-center soptIcontxt">
				<div class="icon">
				<img src="images/icon23.png" class="img-fuid icon" alt="">
				</div>
				<div class="content">
				<h5 style="margin-bottom:2px;">ET</h5>
				<p style="margin-bottom:0px;">ET</p>
				</div>
				</div>
				</td>
                <td data-title="All">********</td>
                <td data-title="Available">********</td>
                <td data-title="In Order">********</td>
                <td data-title="BTC Equity Value">********</td>
                <td data-title="BTC Equity Value">
				<div class="soptBtnArea">
				<button type="button" class="alButton alButtonDefault"><span>Deposit </span></button>
				<button type="button" class="alButton alButtonDefault"><span>Withdraw </span></button>
				<button type="button" class="alButton alButtonDefault"><span>Trades </span></button>
				</div>
				</td>
            </tr>
			
			<tr class="order_item">
                <td data-title="Currency">
				<div class="d-inline-flex align-items-center soptIcontxt">
				<div class="icon">
				<img src="images/icon23.png" class="img-fuid icon" alt="">
				</div>
				<div class="content">
				<h5 style="margin-bottom:2px;">ET</h5>
				<p style="margin-bottom:0px;">ET</p>
				</div>
				</div>
				</td>
                <td data-title="All">********</td>
                <td data-title="Available">********</td>
                <td data-title="In Order">********</td>
                <td data-title="BTC Equity Value">********</td>
                <td data-title="BTC Equity Value">
				<div class="soptBtnArea">
				<button type="button" class="alButton alButtonDefault"><span>Deposit </span></button>
				<button type="button" class="alButton alButtonDefault"><span>Withdraw </span></button>
				<button type="button" class="alButton alButtonDefault"><span>Trades </span></button>
				</div>
				</td>
            </tr>
			
			<tr class="order_item">
                <td data-title="Currency">
				<div class="d-inline-flex align-items-center soptIcontxt">
				<div class="icon">
				<img src="images/icon23.png" class="img-fuid icon" alt="">
				</div>
				<div class="content">
				<h5 style="margin-bottom:2px;">ET</h5>
				<p style="margin-bottom:0px;">ET</p>
				</div>
				</div>
				</td>
                <td data-title="All">********</td>
                <td data-title="Available">********</td>
                <td data-title="In Order">********</td>
                <td data-title="BTC Equity Value">********</td>
                <td data-title="BTC Equity Value">
				<div class="soptBtnArea">
				<button type="button" class="alButton alButtonDefault"><span>Deposit </span></button>
				<button type="button" class="alButton alButtonDefault"><span>Withdraw </span></button>
				<button type="button" class="alButton alButtonDefault"><span>Trades </span></button>
				</div>
				</td>
            </tr>
            
            
        </tbody>
        
    </table>
			
			</div>
		</div>
		</div>
		
		
		
	</div>	
	</div>	
	</div>	
	</div>
	</section>
    </div>
</template>