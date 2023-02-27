<template>
	<div>
		<Header></Header>



		<section class="stakingBannerSec breadcrumbs_sec " style="background-image:url(/images/cryptoBanner.jpg);">
			<div class="container">
				<div class="breadcrumbs_secinner stakingBannerSecinner">
					<div class="stakingBannerContent">
						<h1 class="title">Submit a ticket</h1>
						<ul class="breadcrumbs">
							<li>
								<a href="#">Home</a>
							</li>
							<!--<li>      
				<a href="#">Markets</a>      
			</li> -->
							<li>Submit a ticket</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<section class="agNewTicketSec" style="background-color: #fff;">
			<div class="container">
				<div class="agNewTicketSecinner">
					<div class="row rowBox">
						<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12 columnBox">
							<div class="agNewTicketFormArea">
								<div class="agNewTicketFormAreainner">
									<div class="agHelpdeskTicketDropdownArea">
										<h3 class="title">What's the issue about?</h3>
										<select class="form-select" v-model="issue">
											<option selected>Technical problems and questions</option>
											<option>Feature request</option>
											<option>Account management & Login issues</option>
											<option>Payments, Bills & Refunds</option>
											<option>Press & Business inquiries</option>
										</select>
									</div>
									<form>
										<div class="form-group">
											<label class="labelName">Your contact email <span
													class="agAsterisk">*</span></label>
											<input type="" class="form-control" placeholder="" v-model="email">
										</div>
										<div class="form-group">
											<label class="labelName">Subject</label>
											<input type="" class="form-control" placeholder="A few words summary"
												v-model="subject">
										</div>
										<div class="form-group">
											<label class="labelName">Description *</label>
											<textarea class="form-control"
												placeholder="When API related, specify endpoint, step-by-step cURL(s) with payload and response body."
												v-model="message"></textarea>
										</div>
										<div class="form-group">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" name="option1" value=""
													id="flexCheckDefault">
												<label class="form-check-label" for="flexCheckDefault">
													I have read and understand that it is my responsibility to safeguard my
													Private Keys
													and mnemonics/seed phrases and that I should not share this information
													with anyone,
													including Tatum staff.* <span class="" data-bs-toggle="tooltip"
														data-bs-placement="top"
														title="Remove any PrivateKey and or Mnemonics in your message. Thank you!"><i
															class="fa-light fa-circle-info"></i></span></label>
											</div>
										</div>
										<div class="form-group">
											<div class="agNewTicketFormAttacmentArea">
												<label class="labelName">Attachment *</label>
												<input type="file" class="form-control" placeholder="">
											</div>
										</div>
										<div class="agNewTicketFormBtnArea">

											<v-btn class="btn agNewTicketFormBtn submitBtn" @click="addticket"
												:loading="addticketload">Submit</v-btn>
										</div>

									</form>
								</div>
							</div>
						</div>
						<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-12 columnBox">
							<!--
		<div class="">
		</div>
		-->
						</div>
					</div>
				</div>
			</div>
		</section>


		<section class="helpCenterPageTop_sec d-none">
			<div class="helpCenterPageTop_secinner">

				<div class="helpCenterPageTopSerach_area">
					<div class="d-flex helpCenterPageTopSerach_areainner">
						<button type="button" class="searchBtn"><i class="fa-light fa-magnifying-glass"></i></button>
						<input type="text" class="searchinput" placeholder="Search">
					</div>
				</div>

			</div>
		</section>

		<section class="helpCenteraccordian_sec d-none">
			<div class="helpCenteraccordian_secinner">

				<div class="helpCenterPageTopSerach_area">
					<div class="helpPageAccordian_area">

						<div class="helpPageAccordian_blk">
							<h2 class="helpPageAccordian_blk_title">Accordion 1</h2>
							<div class="helpPageAccordian_blkinner">
								<div class="theme_accordion">

									<div class="theme_accordion_item">
										<div class="theme_accordion_header">
											<h4 class="title">Accordion Item #1</h4>
											<span class="arrow"></span>
										</div>
										<div class="theme_accordion_body">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
											ligula
											eget dolor. Aenean massa.
											Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
											ridiculus
											mus.
										</div>
									</div>


									<div class="theme_accordion_item">
										<div class="theme_accordion_header">
											<h4 class="title">Accordion Item #2</h4>
											<span class="arrow"></span>
										</div>
										<div class="theme_accordion_body">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
											ligula
											eget dolor. Aenean massa.
											Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
											ridiculus
											mus.
										</div>
									</div>


									<div class="theme_accordion_item">
										<div class="theme_accordion_header">
											<h4 class="title">Accordion Item #3</h4>
											<span class="arrow"></span>
										</div>
										<div class="theme_accordion_body">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
											ligula
											eget dolor. Aenean massa.
											Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
											ridiculus
											mus.
										</div>
									</div>


								</div>
							</div>
						</div>


						<div class="helpPageAccordian_blk">
							<h2 class="helpPageAccordian_blk_title">Accordion 2</h2>
							<div class="helpPageAccordian_blkinner">
								<div class="theme_accordion">

									<div class="theme_accordion_item">
										<div class="theme_accordion_header">
											<h4 class="title">Accordion Item #1</h4>
											<span class="arrow"></span>
										</div>
										<div class="theme_accordion_body">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
											ligula
											eget dolor. Aenean massa.
											Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
											ridiculus
											mus.
										</div>
									</div>


									<div class="theme_accordion_item">
										<div class="theme_accordion_header">
											<h4 class="title">Accordion Item #2</h4>
											<span class="arrow"></span>
										</div>
										<div class="theme_accordion_body">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
											ligula
											eget dolor. Aenean massa.
											Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
											ridiculus
											mus.
										</div>
									</div>


									<div class="theme_accordion_item">
										<div class="theme_accordion_header">
											<h4 class="title">Accordion Item #3</h4>
											<span class="arrow"></span>
										</div>
										<div class="theme_accordion_body">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
											ligula
											eget dolor. Aenean massa.
											Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
											ridiculus
											mus.
										</div>
									</div>


								</div>
							</div>
						</div>


						<div class="helpPageAccordian_blk">
							<h2 class="helpPageAccordian_blk_title">Accordion 3</h2>
							<div class="helpPageAccordian_blkinner">
								<div class="theme_accordion">

									<div class="theme_accordion_item">
										<div class="theme_accordion_header">
											<h4 class="title">Accordion Item #1</h4>
											<span class="arrow"></span>
										</div>
										<div class="theme_accordion_body">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
											ligula
											eget dolor. Aenean massa.
											Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
											ridiculus
											mus.
										</div>
									</div>


									<div class="theme_accordion_item">
										<div class="theme_accordion_header">
											<h4 class="title">Accordion Item #2</h4>
											<span class="arrow"></span>
										</div>
										<div class="theme_accordion_body">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
											ligula
											eget dolor. Aenean massa.
											Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
											ridiculus
											mus.
										</div>
									</div>


									<div class="theme_accordion_item">
										<div class="theme_accordion_header">
											<h4 class="title">Accordion Item #3</h4>
											<span class="arrow"></span>
										</div>
										<div class="theme_accordion_body">
											Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
											ligula
											eget dolor. Aenean massa.
											Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
											ridiculus
											mus.
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<Footer></Footer>


		<v-snackbar v-model="snacker">
			{{ snackertext }}
		</v-snackbar>
	</div>
</template>

<script>
import Header from './Header.vue';
import Footer from './Footer.vue';
import { toUSVString } from 'util';

export default {
	components: {
		Header,
		Footer,
	},
	data: () => ({
		issue: null,
		email: null,
		subject: null,
		message: null,

		addticketload: false,

		snacker: false,
		snackertext: null,
	}),
	methods: {
		addticket() {
			this.addticketload = true;

			var dataString = {
				name: this.issue,
				email: this.email,
				subject: this.subject,
				message: this.message,
			}

			axios.post('/api/addticket', dataString).then((response) => {
				if (response.data == 1) {

					this.issue = null;
					this.email = null;
					this.subject = null;
					this.message = null;

					this.snacker = true;
					this.snackertext = 'Request has been submited..';

					this.addticketload = false;
				}
			})
		}
	},
	mounted() {

	}
}
</script>