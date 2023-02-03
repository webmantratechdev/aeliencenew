<template>
  <div>
    <Header></Header>
    <section class="hero-lab overflow-hidden">
      <div class=" d-flex flex-column flex-lg-row flex-md-column align-items-center py-5">
        <div class="lg-w-40 md-w-100 sm-w-100 ps-lg-5 text-lg-start text-md-center text-center homeBannerContent_area">
          <h5 class="text-white money-safe">Keep your money saFe!</h5>
          <h2 data-aos="flip-up" data-aos-duration="3000" class="fw-bold best-crypto">Best crypto</h2>
          <h2 data-aos="flip-up" data-aos-duration="2000" class="fw-bold investing-h2">Trading platform</h2>
          <h2 data-aos="flip-up" data-aos-duration="1000" class="fw-bold future">for your future.</h2>
          <div class="btn-border homeBannerBtnBorder_area">
            <button class="btn-exchange mr-2"><a href="/markets">View Exchange</a></button> 
            <button class="btn-rectangle"><a href="/markets">Start Trading</a></button>
          </div>
          <div data-aos="zoom-out-right" data-aos-duration="3000"
            class="d-flex justify-content-between22 align-items-center text-lg-start text-md-center px-5 ps-lg-0 py-2 homeBannerInfo_area">
            <img class="arrow-icon me-5 homeBannerInfo_icon" src="/images/arrow-btn.png" alt="">
            <p class="text-start">Win AEL Token as Rewards by Referring Friends. You can get 10 AEL by joining our
              Airdrop. Airdrop rewards will be distributed to your wallet address on December 5th 2022. Participant in
              Giveaway <a href="https://t.me/aelcoin_giveaway_bot" target="_blank"
                style="color:#fec00f; text-decoration:none; font-weight:bold;">Telegram Bot</a></p>
          </div>
        </div>
        <div data-aos="fade-left" data-aos-duration="3000"
          class="w-60 d-flex pe-lg-5 justify-content-center overflow-hidden homeBannerImage_area">
          <img class="img-fluid homeBannerImage" src="/images/Laptop Mobile Img.png" alt="">
        </div>
      </div>
    </section>
    <!-- marquee scroll section. -->
    <section class="py-1 marquee_sec">
      <div class="px-5 d-flex align-items-center marquee_secinner">
        <div class="icon"><img src="images/announcement.png" class="img-fluid" alt=""></div>
        <div class="marquee_area">
          <marquee direction="left" scrollamount="5" class="marquee_fld">Announcement: Win AEL Token as Rewards by
            Referring Friends. You can get 10 AEL by joining our Airdrop. Airdrop rewards will be distributed to your
            wallet address on December 5th 2022. Participant in Giveaway <a href="https://t.me/aelcoin_giveaway_bot"
              target="_blank" style="color:#FFF;">Telegram Bot</a>.</marquee>
        </div>
      </div>
    </section>

    <section class="py-5 addBanner_sec">
      <div class="px-5 addBanner_secinner">
        <div class="addBanner_slider_area">

          <Carousel  :items-to-show="1">
            <slide v-for="slide in 4" :key="slide" style=" max-width: 400px !important;  width: 100%;  margin-right: 20px;">
              <img :src="'/images/aelince_banner0'+slide+'.jpg'" style="width: 100%;">
            </slide>
          </Carousel>
        </div>
      </div>
    </section>

    <!-- add banner slider section. -->
    <section class="pb-5 homePageTable_sec">
      <div class="px-5 homePageTable_secinner">
        <div class="homePageTable_area homePageTableBg_area">
          <div class="homePageTable responsive_table_area">
            <table class="table responsive_table">
              <thead>
                <tr>
                  <th class="">Currency</th>
                  <th class="">Market Price</th>
                  <th class="text-center">24h Change</th>
                  <th class="text-end">Volume</th>
                  <th class="text-end">Market Cap</th>
                </tr>
              </thead>
              <tbody>

                <tr class="table_item" v-for="key in 5">
                  <td data-title="Currency" class="currency_td" v-if="coinList[0]">
                    <div class="d-flex align-items-center coin">
                      <img :src="'/images/cryptoCurrency/' + coinList[key].symbol.toLowerCase() + '.png'" class="me-3 img-fluid" alt="" />
                      <span class="me-3 uppercase bold">{{ coinList[key].symbol }}</span>
                      <!-- <span class="normal">Bitcoin</span> -->
                    </div>
                  </td>
                  <td data-title="Market Price" class="marketPrice_td" v-if="coinList[0]">${{	parseFloat(coinList[key].priceUsd).toFixed(2)}}</td>
                  <td data-title="24h Change" class="change_td text-center" v-if="coinList[0]">
                    <span class="sellColor">{{ parseFloat(coinList[key].changePercent24Hr).toFixed(3) }}</span>
                  </td>
                  <td data-title="6h Markets" class="market_td text-end" v-if="coinList[0]">
                    {{ parseFloat(coinList[key].volumeUsd24Hr).toFixed(3)}} 
                    <!-- <a href="https://trade.aelince.com/trade/BTC/USDT" target="_blank"><svg version="1.1"
                        xmlns="http://www.w3.org/2000/svg" width="100" height="30" class="inline-chart">
                        <defs>
                          <linearGradient id="Gradient1" x1="0%" y1="0%" x2="0%" y2="100%">
                            <stop offset="0%" stop-color="#FFC72B" stop-opacity="1"></stop>
                            <stop offset="50%" stop-color="#FFC72B" stop-opacity="0.3"></stop>
                            <stop offset="100%" stop-color="#FFC72B" stop-opacity="0"></stop>
                          </linearGradient>
                          <clipPath id="clip-line1">
                            <polyline fill="none"
                              points="0 30 0 29.5 2.7777777777777777 29.5 5.555555555555555 14.709999999999983 8.333333333333332 24.92692307692313 11.11111111111111 16.56153846153849 13.88888888888889 16.56153846153849 16.666666666666664 16.56153846153849 19.444444444444443 17.610000000000063 22.22222222222222 17.610000000000063 25 18.01153846153848 27.77777777777778 18.167692307692356 30.555555555555554 18.39076923076926 33.33333333333333 18.413076923076897 36.11111111111111 18.435384615384635 38.888888888888886 25.01615384615389 41.666666666666664 18.435384615384635 44.44444444444444 18.346153846153875 47.22222222222222 14.464615384615444 50 0.5 52.77777777777778 0.5223076923077414 55.55555555555556 16.47230769230773 58.33333333333333 5.430000000000003 61.11111111111111 16.405384615384612 63.888888888888886 7.816923076923068 66.66666666666666 8.530769230769245 69.44444444444444 8.530769230769245 72.22222222222221 9.891538461538477 75 10.31538461538463 77.77777777777777 10.31538461538463 80.55555555555556 10.806153846153808 83.33333333333333 13.773076923076909 86.11111111111111 13.773076923076909 88.88888888888889 13.817692307692289 91.66666666666666 14.486923076923084 94.44444444444444 20.443076923076923 97.22222222222221 14.91076923076924 100 20.73307692307694 212 30"
                              stroke="#FFC72B" stroke-width="1" storke-linecap="round" stroke-linejoin="round">
                            </polyline>
                          </clipPath>
                        </defs>
                        <rect x="0" y="0" width="100" height="30" clip-path="url(#clip-line1)" fill="url(#Gradient1)">
                        </rect>
                        <polyline fill="none"
                          points="0 29.5 2.7777777777777777 29.5 5.555555555555555 14.709999999999983 8.333333333333332 24.92692307692313 11.11111111111111 16.56153846153849 13.88888888888889 16.56153846153849 16.666666666666664 16.56153846153849 19.444444444444443 17.610000000000063 22.22222222222222 17.610000000000063 25 18.01153846153848 27.77777777777778 18.167692307692356 30.555555555555554 18.39076923076926 33.33333333333333 18.413076923076897 36.11111111111111 18.435384615384635 38.888888888888886 25.01615384615389 41.666666666666664 18.435384615384635 44.44444444444444 18.346153846153875 47.22222222222222 14.464615384615444 50 0.5 52.77777777777778 0.5223076923077414 55.55555555555556 16.47230769230773 58.33333333333333 5.430000000000003 61.11111111111111 16.405384615384612 63.888888888888886 7.816923076923068 66.66666666666666 8.530769230769245 69.44444444444444 8.530769230769245 72.22222222222221 9.891538461538477 75 10.31538461538463 77.77777777777777 10.31538461538463 80.55555555555556 10.806153846153808 83.33333333333333 13.773076923076909 86.11111111111111 13.773076923076909 88.88888888888889 13.817692307692289 91.66666666666666 14.486923076923084 94.44444444444444 20.443076923076923 97.22222222222221 14.91076923076924 100 20.73307692307694"
                          stroke="#FFC72B" stroke-width="1" storke-linecap="round" stroke-linejoin="round"></polyline>
                      </svg></a> -->
                  </td>
                  <td data-title="24h Change" class="change_td text-end" v-if="coinList[0]">
                    <span class="sellColor">{{ parseFloat(coinList[key].supply).toFixed(3) }}</span>
                  </td>
                </tr>

                
              </tbody>
            </table>
          </div>
          <div class="viewAll_btn_area">
            <router-link to="/markets" class="viewAll_btn">View All</router-link>
          </div>
        </div>
      </div>
    </section>

    <section class="Trusted-platform py-5 overflow-hidden">
      <div class="d-flex flex-column flex-lg-row flex-md-column justify-content-between align-items-center">
        <div data-aos="fade-right" data-aos-duration="3000" class="lg-w-50 md-w-100 w-100 px-5 justify-content-center">
          <img class="img-fluid" src="/images/anydevice.png" alt="">
        </div>
        <div class="lg-w-50 md-w-100 w-100 px-5">
          <h2><span class="partner">Trusted</span> <span class="platform">platform</span></h2>
          <h2 class="partner">anytime & anywhere</h2>
          <div>
            <img src="/images/Shape 1 copy 3.png" alt="">
            <img src="/images/Shape 1 copy 3.png" alt="">
            <img src="/images/Shape 1 copy 3.png" alt="">
            <img src="/images/Shape 1 copy 3.png" alt="">
            <img src="/images/Shape 1 copy 3.png" alt="">
          </div>
          <p class="mt-3">With the Aelince app and website, trading has never been easier. We are leveraging
            cutting-edge technologies to create useful services to improve accessibility to the blockchain revolution.
            <br>
            <br>
            The Aelince app and website allow you to start crypto trading with ease. As an exchange for, by, and of the
            people, Aelince is developing a community where everyone can benefit from growth and have their opinions
            heard.

          </p>
          <div class="mt-4 app_btn_area">
            <a href="https://play.google.com/store/apps/details?id=com.aelince.app" target="_blank"><img
                class="me-2 img-fluid store-img" src="/images/Optimized-googleplay_btn.png" alt=""></a>
            <a href="#"><img class="img-fluid store-img" src="/images/Optimized-apple_btn.png" alt=""></a>
          </div>

        </div>
      </div>
    </section>

    <section class="crypto-portfolio overflow-hidden px-5">
      <div class="text-center py-5">
        <h2><span class="partner">Build your</span> <span class="crypto">crypto</span> <span
            class="partner">portfolio</span></h2>
        <p>We are developing an ecosystem around Aelince Token, which will be your guide into<br> a thriving
          decentralized world jointly built by all Aelince community members.</p>
      </div>

      <div class=" d-flex flex-column flex-lg-row flex-md-column justify-content-between gap-4 py-5 px-lg-5">
        <div data-aos="flip-left" data-aos-duration="3000">
          <div class="card-body-content">
            <img src="/images/person-icon.png" alt="">
            <h6 class="card-subtitle mb-2 mt-3 text-white">Fund your account</h6>
            <p class="card-text">Add funds to your crypto account to
              start trading crypto. You can add funds
              with a variety of payment methods.</p>
          </div>
        </div>
        <div data-aos="flip-up" data-aos-duration="3000" class="card-content">
          <div class="card-body">
            <img src="/images/okay-icon.png" alt="">
            <h6 class="card-subtitle mb-2 mt-3 text-dark">Verify your identity</h6>
            <p class="card-text-body">Complete the identity verification
              process to secure your account and
              transactions.</p>

          </div>
        </div>
        <div data-aos="flip-right" data-aos-duration="3000">
          <div class="card-body-content">
            <img src="/images/air-icon.png" alt="">
            <h6 class="card-subtitle mb-2 mt-3 text-white">Start trading</h6>
            <p class="card-text">You’re good to go! Buy/sell crypto, set
              up recurring buys for your
              investments, and discover what
              Binance has to offer.</p>
          </div>
        </div>

      </div>
    </section>

    <section class="what-new overflow-hidden">
      <div class=" d-flex flex-column flex-lg-row flex-md-column align-items-center pt-5">
        <div class="w-100 lg-w-50 p-5 text-lg-start text-center">
          <h2><span class="partner fw-bold">What’s</span> <span class="crypto fw-bold">new</span> <span
              class="partner fw-bold">we</span>
          </h2>
          <h2 class="fw-bold partner">Provide for you?</h2>
          <p class="border-left">This is a unites and secures a growing ecosystem of specialized <br>
            blockchains called parachains. Apps and services on it.</p>

          <div class="d-flex flex-column flex-lg-row justify-content-between mt-5 gap-2">
            <div
              class="d-flex flex-column flex-lg-row justify-content-between align-items-center text-lg-start text-center py-2 w-100">
              <img class=" me-2" src="/images/lockt.png" alt="">
              <div class="text-content">
                <h6 class="text-white mt-2">Advanced Security</h6>
                <p class="text-center text-lg-start">We use state-of-the-art storage

                  technology to protect your asse
                </p>
              </div>
            </div>
            <div
              class="d-flex flex-column flex-lg-row justify-content-between align-items-center text-lg-start text-center py-2 w-100">
              <img class=" me-2" src="/images/24.png" alt="">
              <div class="text-content">
                <h6 class="text-white mt-2">24/7 Customer Service</h6>
                <p class="text-center text-lg-start">Contact customer support with your questions at any
                  time
                </p>
              </div>
            </div>
          </div>
          <div class="d-flex flex-column flex-lg-row justify-content-between gap-2">
            <div
              class="d-flex flex-column flex-lg-row justify-content-between align-items-center text-lg-start text-center py-2 w-100">
              <img class=" me-2" src="/images/arabic.png" alt="">
              <div class="text-content">
                <h6 class="text-white text-center text-lg-start mt-2">Aelince news</h6>
                <p class="text-center text-lg-start">Keeping you up to date with the latest news in crypto
                </p>
              </div>
            </div>
            <div
              class="d-flex flex-column flex-lg-row justify-content-between align-items-center text-lg-start text-center py-2 w-100">
              <img class=" me-2" src="/images/communication.png" alt="">
              <div class="text-content">
                <h6 class="text-white text-center text-lg-start mt-2">Community</h6>
                <p class="text-center text-lg-start">The aelince community is home to millions of users from
                  200+ countries, with support for 20+ languages.
                </p>
              </div>
            </div>
          </div>
        </div>
        <div data-aos="fade-left" data-aos-duration="3000" class="w-100 lg-w-50 lg-mt-5 pt-0 pt-lg-5 overflow-hidden">
          <img class="img-fluid pt-0 lg-pt-5 ps-0 lg-ps-5 " src="/images/Laptop.png" alt="">
        </div>
      </div>
    </section>

    <section class="crypto-journey-area">
      <div class="crypto-journey pb-5 px-5">
        <h2> <span class="best-crypto">Start your</span> <span class="crypro-yellow">crypto</span> <span
            class="best-crypto">journey
            now!</span></h2>
        <p>With the Aelince app and website, trading has never been easier</p>
        <button class="btn-exchange"><a href="joinus">Sign Up Now</a></button>
      </div>
    </section>
    <Footer></Footer>
  </div>
</template>

<script>


import Header from './Header.vue';
import Footer from './Footer.vue';

import 'vue3-carousel/dist/carousel.css'
import { Carousel, Slide, Pagination, Navigation } from 'vue3-carousel'

export default {
  components: {
    Header,
    Footer,
    Carousel
  },
  data: () => ({
    coinList:[]
  }),
  methods:{
    tradedata() {
			axios.get('https://api.coincap.io/v2/assets?Authorization=Bearer')
				.then((response) => {

					this.coinList = response.data.data;
          console.log();
				})
		},
    
  },
  mounted(){
      this.tradedata();
    }

}
</script>