<template>
    <header class="header-area">
        <nav class="nav-menu py-2 px-5">
            <div class="navbarLogo_area">
                <router-link to="/" class="navbarLogo"><img src="/images/logo.png" alt="" /></router-link>
            </div>
            <div class="menu_overlay"></div>
            <span class="menu_close_btn">×</span>
            <div class="navigation_area">
                <div class="navigation_areainner">
                    <div class="navigationList_area">
                        <ul class="menu-items">
                            <li>
                                <a href="javascript:void(0)"><i class="fa-solid fa-grid"></i></a>
                                <ul class="sub-menu">
                                    <li><a href="#"><span class="icon"><i class="fa-regular fa-location-dot"></i></span>
                                            <span class="txt">Roadmap</span></a></li>
                                    <li><a href="#"><span class="icon"><i class="fa-regular fa-gift"></i></span> <span
                                                class="txt">Invite</span></a></li>
                                    <li><a href="#"><span class="icon"><i class="fa-solid fa-headset"></i></span> <span
                                                class="txt">Help Center</span></a></li>
                                </ul>
                            </li>
                            <li><a href="https://trade.aelince.com/trade/BTC/USDT">Buy Token</a></li>
                            <li><a href="markets">Markets</a></li>
                            <li><a href="/login">Stacking</a></li>
                            <li><a href="knowledgebase">Knowledgebase</a></li>
                            <li><a href="downloads">Downloads</a></li>
                            <li class="w-100">
                                <button class="btn-rectangle btn-dasktop"><a href="login">Log In</a></button>
                            </li>
                            <li class="w-100">
                                <button class="btn-exchange btn-dasktop"><a href="joinus">Sign In</a></button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="right_side">
                <div class="login_btn_area">
                    <!-- <button to="/login"><span href="">Log In</span></button> -->
                    <div class="btn-rectangle mobile-btn"><router-link  to="/login" >Log In</router-link></div>
                </div>
                <div class="register_btn_area">
                    <button class="btn-exchange mobile-btn"><a href="joinus">Sign Up</a></button>
                </div>
                <div class="rightSideMenu">
                    <ul class="menu-items rightSideMenu_list">
                        <li><a href="javascript:void(0)"><i class="fa-regular fa-download"></i></a></li>
                    </ul>
                </div>
            </div>
            <img class="hamburger" src="/images/menu-3-line.png" alt="hamburger" />
        </nav>
    </header>
</template>