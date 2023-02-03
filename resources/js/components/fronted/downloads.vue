<template>
   <div>
      <Header></Header>
      <section class="downLoadPage_sec">
         <div class="downLoadPage_secinner">
            <div class="downLoadPage_area">
               <div class="row row_box">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-12 column_box downLoadAppImgae_area">
                     <div class="downLoadAppImgae">
                        <img src="/images/app_img.png" class="img-fluid" alt="App Image">
                     </div>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-12 column_box downLoadAppContentArea">
                     <div class="downLoadAppContentAreainner">
                        <h2>Aelince</h2>
                        <h4>The People's Exchange</h4>
                        <div class="downLoadAppQrCode_area">
                           <div class="row row_box2">
                              <div class="col-lg-5 col-md-6 col-sm-6 col-12 column_box2 downLoadApp_area">
                                 <div class="downLoadApp_areainner">
                                    <ul class="downLoadApp_list">
                                       <li><strong>iOS</strong></li>
                                       <li>
                                          <a href="#"><img src="/images/apple_btn.png" class="img-fluid" alt="ios"
                                                style="max-width:160px;"></a>
                                       </li>
                                    </ul>
                                    <ul class="downLoadApp_list">
                                       <li><strong>Android</strong></li>
                                       <li>
                                          <a href="#"><img src="/images/googleplay_btn.png" class="img-fluid"
                                                alt="Android" style="max-width:160px;"></a>
                                       </li>
                                       <!--<li>		  
                                          <a href="#"><img src="/images/ios2.svg" class="img-fluid" alt="Android" style="max-width: 140px;"> </a>
                                          </li>-->
                                    </ul>
                                 </div>
                              </div>
                              <div class="col-lg-7col-md-6 col-sm-6 col-12 column_box2 downLoadQrCode_area">
                                 <div class="downLoadQrCode_areainner">
                                    <img src="/images/qr_img.png" class="img-fluid" alt="ios" style="">
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

  },
  mounted() {

  }
}
</script>