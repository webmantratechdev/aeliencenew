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
                        <li class="nav-item active">
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
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <span class="icon"><i class="fa-light fa-folder-gear"></i></span>
                                <span class="txt">Preferance</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="themeDashboarMainArea">
                    <div class="container-fluid">
                        <div class="themeDashboarMainAreainner">
                            <div class="dashPanel">
                                <div class="dashPanelHeader">
                                    <h2 class="title">Notification</h2>
                                </div>
                                <div class="dashPanelBody">
                                    <div class="d-flex justify-content-between align-items-center languageSettingArea">
                                        <div class="leftSide">
                                            <h5>Notification Language</h5>
                                            <p>This will afffect the language settings of E-mail and App push.</p>
                                        </div>
                                        <div class="rightSide justify-content-between align-items-center btnLiast_area">
                                            <select class="form-select" style="width: 140px;">
                                                <option>English</option>
                                                <option>Hindi</option>
                                                <option>Bengali</option>
                                            </select>
                                        </div>
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