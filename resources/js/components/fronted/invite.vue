<template>
	<div>
		<Header></Header>
		<section class="sample_page_sec invitepage_sec">
			<div class="sample_page_secinner invitepage_secinner" style="min-height:600px;">

				<div class="invitepageTop_sec">
					<div class="invitepageTop_secinner">
						<div class="invitepageTop_sec_content text-center">
							<h1>Invite Friends and Earn Crypto Together</h1>
							<h4>Up to <b>40%</b> Trading Rebate</h4>
							<a href="" class="inviteBtn">Invite Now</a>
						</div>
					</div>
				</div>

				<div class="invitHowitWork_sec">
					<div class="invitHowitWork_secinner">
						<h2 class="text-center">How Referral <span>Works</span></h2>
						<div class="row rowBox">

							<div class="col-lg-4 col-md-4 col-sm-6 col-12 columnBox invitHowitWork_blk">
								<div class="invitHowitWork_blkinner text-center">
									<div class="icon">
										<img src="images/commission.png" class="img-fluid" alt="">
									</div>
									<div class="content">
										<h4>Share Commission</h4>
										<p>Set how much referral commission you want to share with your friends</p>
									</div>
								</div>
							</div>

							<div class="col-lg-4 col-md-4 col-sm-6 col-12 columnBox invitHowitWork_blk">
								<div class="invitHowitWork_blkinner text-center">
									<div class="icon">
										<img src="images/refer.png" class="img-fluid" alt="">
									</div>
									<div class="content">
										<h4>Refer Friends</h4>
										<p>Share your referral link or QR code with your friends and social media</p>
									</div>
								</div>
							</div>

							<div class="col-lg-4 col-md-4 col-sm-6 col-12 columnBox invitHowitWork_blk">
								<div class="invitHowitWork_blkinner text-center">
									<div class="icon">
										<img src="images/earn.png" class="img-fluid" alt="">
									</div>
									<div class="content">
										<h4>Earn Crypto</h4>
										<p>Earn up to 40% commission when your friends start trading</p>
									</div>
								</div>
							</div>


						</div>
					</div>
				</div>
				<div class="invitStartLogin_sec">
					<div class="invitStartLogin_secinner">
						<div class="invitStartLogin_content text-center">
							<h2>Start Earning <span>Now</span></h2>
							<router-link to="/login" class="inviteLoginBtn">Log In</router-link>
						</div>
					</div>
				</div>

			</div>
		</section>
		<Footer></Footer>
    </div>
</template>

<script>


import Header from './Header.vue';
import Footer from './Footer.vue';


export default {
    components: {
        Header,
        Footer,

    },
    data: () => ({

    }),
    methods: {
        getProfile() {
            let profileid = localStorage.getItem('profileid');
            axios.post('/api/getProfile', { profileid: profileid }).then((response) => {
                if (response.data.id) {

                } else {
                    // this.$router.push('/login');
                }
            })
        }
    }, mounted() {
        this.getProfile()
    }


}
</script>