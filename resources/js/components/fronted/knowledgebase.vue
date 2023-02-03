<template>
  <div>
    <Header></Header>
    <section class="crypto-portfolio  knowledgebasePage_sec">
      <div class="knowledgebasePage_sec_container">
        <div class="text-center py-5">
          <h2><span class="partner">Knowledge</span> <span class="crypto">base</span> <span class="partner"></span></h2>
          <p>View answers to frequently asked questions.</p>
        </div>
        <div class="knowledgebasePage_secinner">
          <div class="theme_accordian_area">
            <div id="accordion">

              <div class="card theme_accordian_item">
                <div class="card-header">
                  <a class="btn card_headerinner" data-bs-toggle="collapse" href="#collapseOne">
                    <h4>How to Download the Aelince App</h4>
                    <span class="icon"></span>
                  </a>
                </div>
                <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
                  <div class="card-body">Aelince’s services are available on the website (aelince.com) and the Android
                    App. Many crypto traders prefer to use the Aelince app as it allows you to trade anytime, anywhere.
                    This article will provide you with step-by-step guidance on downloading the Aelince app.</div>
                </div>
              </div>

              <div class="card theme_accordian_item">
                <div class="card-header">
                  <a class="collapsed btn card_headerinner" data-bs-toggle="collapse" href="#collapseTwo">
                    <h4>What is Maker & Taker?</h4>
                    <span class="icon"></span>
                  </a>
                </div>
                <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
                  <div class="card-body">
                    <p style="font-size:16px; color:#FFF !important;">Aelince uses a taker - maker fee model for
                      determining its trading fees. Orders that provide liquidity ("maker orders") are charged different
                      fees than orders that take liquidity ("taker orders").</p>
                    <p style="font-size:16px; color:#FFF;">When you place an order and it is executed immediately, you
                      are considered as a Taker and will pay a taker fee. When you place an order which is not
                      immediately matched to enter a buy or sell order, and you are considered as a Maker and will pay a
                      maker fee.</p>
                    <p style="font-size:16px; color:#FFF;">The user as a maker may pay a lower fee as long as to reach
                      level 2 than takers. Please check the screenshot below for more details.</p>
                    <p style="font-size:16px; color:#FFF;">When you place an order that gets partially matched
                      immediately, you pay a Taker fee for that portion. The remainder of the order is placed to enter a
                      buy or sell order and, when matched, it is considered as a Maker order, and the Maker fee will
                      then be charged.</p>
                  </div>
                </div>
              </div>

              <div class="card theme_accordian_item">
                <div class="card-header">
                  <a class="collapsed btn card_headerinner" data-bs-toggle="collapse" href="#collapseThree">
                    <h4>The Introduction for Margin Trading</h4>
                    <span class="icon"></span>
                  </a>
                </div>
                <div id="collapseThree" class="collapse" data-bs-parent="#accordion">
                  <div class="card-body">Margin trading is an investment method in which a small amount of funds can be
                    used for investments several times the original amount. Users leverage a small amount of crypto,
                    borrow a certain amount of crypto, then go long (buy)/short (sell) to magnify the utilization of
                    their funds.</div>
                </div>
              </div>
              <div class="card theme_accordian_item">
                <div class="card-header">
                  <a class="collapsed btn card_headerinner" data-bs-toggle="collapse" href="#collapseFour">
                    <h4>Phishing Attacks: How to Recognize Them and Avoid Crypto Scams?</h4>
                    <span class="icon"></span>
                  </a>
                </div>
                <div id="collapseFour" class="collapse" data-bs-parent="#accordion">
                  <div class="card-body">

                    <p style="font-size:16px; color:#FFF !important;">As the cryptocurrency world grows and gains wider
                      acceptance among retail investors, it has drawn a lot of attention from a variety of parties.</p>
                    <p style="font-size:16px; color:#FFF !important;">On one side, more and more individuals are now
                      interested in the cryptocurrency market, and we can see that they have begun to appreciate the
                      advantages of blockchain technology. At the same time, a variety of institutional investors have
                      also changed their stances and are now more supportive of cryptocurrencies as a legitimate medium
                      of exchange.</p>
                    <p style="font-size:16px; color:#FFF !important;">However, along with all this positive attention,
                      the crypto world has also provided a lucrative opportunity to scammers, with phishing scams
                      becoming quite common across different cryptocurrency exchanges.</p>
                    <p style="font-size:16px; color:#FFF !important;"><strong>What is a Phishing Attack?</strong><br />A
                      phishing attack is a form of social engineering attack that aims to obtain sensitive information
                      about your accounts, such as your private keys, username, passwords, and other details about your
                      wallet.</p>
                    <p style="font-size:16px; color:#FFF !important;">According to CheckPoint research, crypto phishing
                      attacks that use Google Ads to position themselves on top of searches could steal over $500,000 in
                      a matter of days. In another instance, a hacker stole $55 million from bZx - all by catching just
                      one developer in the scam.</p>
                    <p style="font-size:16px; color:#FFF !important;">While phishing attacks try to obtain information
                      about all your accounts, this article will focus on protecting your crypto assets from the
                      attacks.</p>
                    <p style="font-size:16px; color:#FFF !important;"><strong>Different Types of
                        Attacks</strong><br />Users often fall victim to phishing attacks through a variety of methods
                      employed by scammers, such as:</p>
                    <p style="font-size:16px; color:#FFF !important;">➢ The use of email spoofing</p>
                    <p style="font-size:16px; color:#FFF !important;">➢ The creation of a fake website</p>
                    <p style="font-size:16px; color:#FFF !important;">➢ Sending instant messages with a fake link</p>
                    <p style="font-size:16px; color:#FFF !important;">➢ Social websites with fake links to exchanges and
                      your wallet</p>
                    <p style="font-size:16px; color:#FFF !important;">➢ Chat with a fake support team</p>
                    <p style="font-size:16px; color:#FFF !important;">➢ Wi-fi phishing attacks designed to obtain
                      information about your cryptocurrency wallet</p>
                    <p style="font-size:16px; color:#FFF !important;"><strong>Can Phishing be Completely
                        Stopped?</strong><br />A lot of research has been conducted into whether a digital company can
                      actually be secure to the point wherein phishing is impossible - however, the overall consensus is
                      that phishing attacks cannot be completely stopped, but rather prevented by users themselves.</p>
                    <p style="font-size:16px; color:#FFF !important;">Therefore, it is up to you as the user to ensure
                      that your crypto wallets are secure and that you are safe from scams.</p>

                  </div>
                </div>
              </div>
              <div class="card theme_accordian_item">
                <div class="card-header">
                  <a class="collapsed btn card_headerinner" data-bs-toggle="collapse" href="#collapseFive">
                    <h4>Why Is Complete Immunity Impossible?</h4>
                    <span class="icon"></span>
                  </a>
                </div>
                <div id="collapseFive" class="collapse" data-bs-parent="#accordion">
                  <div class="card-body">
                    <p style="font-size:16px; color:#FFF !important;">There are several reasons why making a site or a
                      crypto wallet fully immune from phishing is impossible, and the largest among these is that the
                      form of attack used is constantly changing.</p>
                    <p style="font-size:16px; color:#FFF !important;">For example, as email providers sought to prevent
                      users from receiving scam emails by creating a good spam blocker, attackers just improved the
                      quality of their emails to bypass such spam filters.</p>
                    <p style="font-size:16px; color:#FFF !important;">Some attacks can bypass security measures and
                      appear completely legitimate. They also target users who are more likely to click on unauthorized
                      domain links on the web, thereby adding to the risk.</p>
                    <p style="font-size:16px; color:#FFF !important;">What this basically means is that the onus to
                      reduce phishing lies on the user of cryptocurrency exchanges, and that they should focus on
                      improving their personal security as an optimal way of preventing such security breaches.</p>
                    <p style="font-size:16px; color:#FFF !important;">While exchanges can boost their security measures
                      to ensure that the data of users is protected and no breaches occur, phishing is more likely to
                      target users than it is to target digital companies, since the likelihood of them falling for the
                      scam is much higher.</p>
                  </div>
                </div>
              </div>
              <div class="card theme_accordian_item">
                <div class="card-header">
                  <a class="collapsed btn card_headerinner" data-bs-toggle="collapse" href="#collapseSix">
                    <h4>Withdrawal Restrictions</h4>
                    <span class="icon"></span>
                  </a>
                </div>
                <div id="collapseSix" class="collapse" data-bs-parent="#accordion">
                  <div class="card-body">Frauds and scams are quite common in the crypto space. Malicious actors will
                    try to get your login and security info to steal the funds in your account. When your account is at
                    risk, withdrawals may be temporarily suspended to prevent your funds from being stolen.</div>
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