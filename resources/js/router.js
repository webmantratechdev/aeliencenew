import { createRouter, createWebHistory } from "vue-router";


import Home from './components/fronted/Home.vue';
import About from './components/fronted/About.vue';
import Login from './components/fronted/Login.vue';
import forgotpassword from './components/fronted/forgot-password.vue';
import Signup from './components/fronted/Signup.vue';
import Markets from './components/fronted/markets.vue';
import Marketsdetails from './components/fronted/market-details.vue';
import Trade from './components/fronted/trade.vue';
import roadmap from './components/fronted/roadmap.vue';
import helpcenter from './components/fronted/help-center.vue';
import knowledgebase from './components/fronted/knowledgebase.vue';
import downloads from './components/fronted/downloads.vue';
import termsofuse from './components/fronted/terms-of-use.vue';
import privacypolicy from './components/fronted/privacy-policy.vue';


// kyc
import ProfileInfo from './components/fronted/profile-info.vue';
import Govtid from './components/fronted/govtid.vue';
import Profileselfie from './components/fronted/profile-selfie.vue';
import kycpending from './components/fronted/kyc-pending.vue';
// account
import Overview from './components/fronted/overview.vue';
import Accountsecurity from './components/fronted/account-security.vue';
import Idverification from './components/fronted/id-verification.vue';
import spot from './components/fronted/spot.vue';
import wallethistory from './components/fronted/wallet-history.vue';
import profileininformation from './components/fronted/profile-information.vue';
import invite from './components/fronted/invite.vue';
import preferance from './components/fronted/preferance.vue';
import notification from './components/fronted/notification.vue';
import reffrecode from './components/fronted/reffrecode.vue';
import digitalcurrencydeposit from './components/fronted/digital-currency-deposit.vue';
import staking from './components/fronted/stack.vue';
import stackinglog from './components/fronted/stackinglog.vue';


// admin
import Dashboard from './components/admin/Dashboard.vue';
import home from './components/admin/page/home.vue';
import Users from './components/admin/page/Users.vue';
import Usersview from './components/admin/page/Usersview.vue';
import kycmanager from './components/admin/page/kycmanager.vue';
import kycmanagerpendig from './components/admin/page/kycmanagerpendig.vue';
import kycmanagermising from './components/admin/page/kycmanagermising.vue';
import kycmanagerapprove from './components/admin/page/kycmanagerapprove.vue';
import customtoken from './components/admin/page/customtoken.vue';
import blockchains from './components/admin/page/blockchains.vue';
import stakingcurrencies from './components/admin/page/stakingcurrencies.vue';
import stakinglogs from './components/admin/page/stakinglogs.vue';
import settingGeneral from './components/admin/page/settingGeneral.vue';
import settingPlateform from './components/admin/page/settingPlateform.vue';
import settingApi from './components/admin/page/settingApi.vue';
import settingSeo from './components/admin/page/settingSeo.vue';

import ticketall from './components/admin/page/ticketall.vue';
import ticketpending from './components/admin/page/ticketpending.vue';
import ticketclose from './components/admin/page/ticketclose.vue';
import ticketanswer from './components/admin/page/ticketanswer.vue';
import ticketview from './components/admin/page/ticketview.vue';


const routes = [
  { path: '/', component: Home },
  { path: '/login', component: Login },
  { path: '/forgot-password', component: forgotpassword },
  { path: '/signup', component: Signup },
  { path: '/refer/:reffrecode', component: reffrecode},
  { path: '/about', component: About },
  { path: '/markets', component: Markets },
  { path: '/market-details/:coin', component: Marketsdetails },
  { path: '/trade/:coinpair', component: Trade },
  { path: '/roadmap', component: roadmap },
  { path: '/help-center', component: helpcenter },
  { path: '/knowledgebase', component: knowledgebase },
  { path: '/downloads', component: downloads },
  { path: '/termsofuse', component: termsofuse },
  { path: '/privacy-policy', component: privacypolicy },


  // kyc
  { path: '/profile-info', component: ProfileInfo },
  { path: '/govtid', component: Govtid },
  { path: '/profile-selfie', component: Profileselfie },
  { path: '/kyc-pending', component: kycpending },
  //account
  { path: '/overview', component: Overview },
  { path: '/overview/account-security', component: Accountsecurity },
  { path: '/overview/idverification', component: Idverification },
  { path: '/overview/spot', component: spot },
  { path: '/overview/wallet-history', component: wallethistory },
  { path: '/overview/profile-info', component: profileininformation },
  { path: '/overview/invite', component: invite },
  { path: '/overview/notification', component: notification },
  { path: '/overview/preferance', component: preferance },
  { path: '/overview/digital-currency-deposit/:currency', component: digitalcurrencydeposit },
  { path: '/overview/stacking', component: staking },
  { path: '/overview/stackinglog', component: stackinglog },

  // admin
  {
    path: '/console', component: Dashboard,
    redirect:'/console/home',
    children: [
      { path: '/console/home', component: home, },
      { path: '/console/users', component: Users, },
      { path: '/console/users/:userid', component: Usersview, },
      { path: '/console/kycmanager', component: kycmanager, },
      { path: '/console/kycmanagerpendig', component: kycmanagerpendig, },
      { path: '/console/kycmanagermising', component: kycmanagermising, },
      { path: '/console/kycmanagerapprove', component: kycmanagerapprove, },
      { path: '/console/customtoken', component: customtoken, },
      { path: '/console/blockchains', component: blockchains, },
      { path: '/console/stakingcurrencies', component: stakingcurrencies, },
      { path: '/console/stakinglogs', component: stakinglogs, },

      // setting
      { path: '/console/general-setting', component: settingGeneral, },
      { path: '/console/plateform-setting', component: settingPlateform, },
      { path: '/console/api-setting', component: settingApi, },
      { path: '/console/seo-manager', component: settingSeo, },

      { path: '/console/ticketall', component: ticketall, },
      { path: '/console/ticketpending', component: ticketpending, },
      { path: '/console/ticketclose', component: ticketclose, },
      { path: '/console/ticketanswer', component: ticketanswer, },
      { path: '/console/ticket/:ticketid', component: ticketview, },


    ]
  },
]

const router = createRouter({

  history: createWebHistory(),
  routes,

})

export default router;