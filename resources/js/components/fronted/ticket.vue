<template>
    <div>
        <section class="breadcrumbs_sec">
            <div class="breadcrumbs_secinner">

                <ul class="breadcrumbs">
                    <li>
                        <a href="#">Aelince Help Center</a>
                    </li>
                    <li>
                        Submit a request
                    </li>
                </ul>

            </div>
        </section>
        <!-- hero lab section  -->
        <section class="ticketForm_sec">
            <div class="ticketForm_secinner">
                <div class="text-center py-5">
                    <h2><span class="partner">Submit</span> <span class="crypto">a </span> <span
                            class="partner">request</span></h2>
                </div>
                <div class="ticketForm_area">
                    <div class="ticketForm_areainner">
                        <form>
                            <div class="row row_box">

                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 column_box">
                                    <div class="form-group">
                                        <label class="label_name">Select Your Issue Type Accurately to Expedite the
                                            Process</label>
                                        <select class="form-control">
                                            <option>-</option>
                                            <option selected="selected">Google 2FA Issue</option>
                                            <option>Account (Sign Up/Login/Trading Password/Bind Phone/API/Security
                                                Question/Email/SMS etc.)</option>
                                            <option>Deposit Issue</option>
                                            <option>Withdrawal Issue</option>
                                            <option>Freeze or Unfreeze Account/Suspicious Case Report — Contact Online
                                                Support Immediately</option>
                                            <option>Spot Trading</option>
                                            <option>Futures Trading</option>
                                            <option>Trading Bot</option>
                                            <option>Margin Trading</option>
                                            <option>Fiat Deposit/Withdrawal</option>
                                            <option>P2P Fiat Trade</option>
                                            <option>Assets/Bonus/Activities</option>
                                            <option>KYC (Individual &amp; Institutional)</option>
                                            <option>Aelince Earn</option>
                                            <option>Aelince Pool &amp; Cloud Mining</option>
                                            <option>Leveraged Tokens</option>
                                            <option>Buy Crypto via Third Party</option>
                                            <option>Web/App Issues and Suggestions</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 column_box">
                                    <div class="form-group">
                                        <label>Your email address</label>
                                        <input type="email" class="form-control" required="">
                                    </div>
                                </div>


                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 column_box">
                                    <div class="form-group">
                                        <label class="label_name">Your Registered Email Address/Phone Number</label>
                                        <input type="text" class="form-control" required="">
                                        <p class="para">Please enter your registered email address/phone number.</p>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 column_box">
                                    <div class="form-group">
                                        <label class="label_name">Approximate Time of Account Registration</label>
                                        <input type="text" class="form-control" required="">
                                        <p class="para">Please fill in the approximate date of registration for this
                                            account in order to help unbind your Google 2FA.</p>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 column_box">
                                    <div class="form-group">
                                        <label class="label_name">Account Trade History or Transfer Record</label>
                                        <textarea class="form-control" required=""></textarea>
                                        <p class="para">Tips for Transfer: If you withdraw BTC to Aelince from platform
                                            A, you can find the transfer screenshot of the transaction on the relevant
                                            platform. Tips for Trading: For example, I traded KCS/ETH...</p>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 column_box">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            <strong>Please upload your ID, passport, or driver's license via:
                                                https://www.aelince.com</strong><br>
                                            In order to ensure we can unbind Google 2FA for you, please confirm whether
                                            the above information is complete and accurate. Confirmed
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 column_box">
                                    <div class="form-group">
                                        <label class="label_name">Subject</label>
                                        <input type="text" class="form-control" required="">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 column_box">
                                    <div class="form-group">
                                        <label class="label_name">Description</label>
                                        <textarea class="form-control" required=""></textarea>
                                        <p class="para">Please enter the details of your request. Aelince support staff
                                            will provide a response as soon as possible.</p>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 column_box">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                <strong>I hereby voluntarily apply for this account to unbind Google 2FA
                                                    on the Aelince platform, and I am willing to take on all the
                                                    corresponding legal responsibilities.</strong><br>

                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 column_box">
                                    <div class="form-group">
                                        <label class="label_name">Priority</label>
                                        <select class="form-control">
                                            <option value="-">-</option>
                                            <option value="low">Low</option>
                                            <option value="normal">Normal</option>
                                            <option value="high">High</option>
                                            <option value="urgent">Urgent</option>
                                        </select>
                                    </div>
                                </div>



                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 column_box">
                                    <div class="form-group">
                                        <label class="label_name">Attachments(optional)</label>
                                        <div class="file_upload_area">
                                            <input type="file" class="form-control" required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 column_box">
                                    <div class="contact_btn_area">
                                        <button class="btn btn-exchange contact_btn">Submit</button>
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