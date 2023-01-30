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
                        <li class="nav-item active">
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
                                    <h2 class="title">Wallet History</h2>
                                </div>
                                <div class="dashPanelBody">
                                    <div class="dashPanelTabArea">
                                        <div class="dashPanelTabNavArea">
                                            <ul class="nav nav-pills">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-bs-toggle="pill"
                                                        href="#menu1">Deposit record</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="pill" href="#menu2">Withdrawal
                                                        record</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="pill" href="#menu3">Transfer
                                                        records</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="pill" href="#menu4">Other</a>
                                                </li>
                                            </ul>
                                        </div>


                                        <div class="dashPanelTabContentArea">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="menu1">
                                                    <div class="responsive_table_area">

                                                        <table id="example1" class="table soptTable" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Time</th>
                                                                    <th>Currency</th>
                                                                    <th>Amount</th>
                                                                    <th>Network</th>
                                                                    <th>Address</th>
                                                                    <th>TXID</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                <tr class="order_item">
                                                                    <td data-title="Time">
                                                                        10-12-2022 10:30:20
                                                                    </td>
                                                                    <td data-title="Currency">Dollar</td>
                                                                    <td data-title="Amount">₹2400</td>
                                                                    <td data-title="Network">********</td>
                                                                    <td data-title="Address">********</td>
                                                                    <td data-title="TXID">********</td>
                                                                    <td data-title="Status">********</td>
                                                                </tr>




                                                            </tbody>

                                                        </table>

                                                    </div>
                                                </div>


                                                <div class="tab-pane fade" id="menu2">

                                                    <div class="responsive_table_area">

                                                        <table id="example2" class="table soptTable" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Time</th>
                                                                    <th>Currency</th>
                                                                    <th>Amount</th>
                                                                    <th>Network</th>
                                                                    <th>Address</th>
                                                                    <th>TXID</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                <tr class="order_item">
                                                                    <td data-title="Time">
                                                                        10-12-2022 10:30:20
                                                                    </td>
                                                                    <td data-title="Currency">Dollar</td>
                                                                    <td data-title="Amount">₹2400</td>
                                                                    <td data-title="Network">********</td>
                                                                    <td data-title="Address">********</td>
                                                                    <td data-title="TXID">********</td>
                                                                    <td data-title="Status">********</td>
                                                                </tr>




                                                            </tbody>

                                                        </table>

                                                    </div>


                                                </div>
                                                <div class="tab-pane fade" id="menu3">
                                                    <div class="responsive_table_area">

                                                        <table id="example3" class="table soptTable" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Time</th>
                                                                    <th>Currency</th>
                                                                    <th>Amount</th>
                                                                    <th>Network</th>
                                                                    <th>Address</th>
                                                                    <th>TXID</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                <tr class="order_item">
                                                                    <td data-title="Time">
                                                                        10-12-2022 10:30:20
                                                                    </td>
                                                                    <td data-title="Currency">Dollar</td>
                                                                    <td data-title="Amount">₹2400</td>
                                                                    <td data-title="Network">********</td>
                                                                    <td data-title="Address">********</td>
                                                                    <td data-title="TXID">********</td>
                                                                    <td data-title="Status">********</td>
                                                                </tr>




                                                            </tbody>

                                                        </table>

                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="menu4">
                                                    <div class="responsive_table_area">

                                                        <table id="example4" class="table soptTable" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Time</th>
                                                                    <th>Currency</th>
                                                                    <th>Amount</th>
                                                                    <th>Network</th>
                                                                    <th>Address</th>
                                                                    <th>TXID</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                <tr class="order_item">
                                                                    <td data-title="Time">
                                                                        10-12-2022 10:30:20
                                                                    </td>
                                                                    <td data-title="Currency">Dollar</td>
                                                                    <td data-title="Amount">₹2400</td>
                                                                    <td data-title="Network">********</td>
                                                                    <td data-title="Address">********</td>
                                                                    <td data-title="TXID">********</td>
                                                                    <td data-title="Status">********</td>
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


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>