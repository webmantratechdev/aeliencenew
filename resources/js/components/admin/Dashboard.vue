<template>
  <v-app id="inspire">
    <v-navigation-drawer v-model="drawer" dark app color="black lighten-4">

      <v-sheet color="black lighten-4" class="pa-4">
        <v-img src="/images/logo.png" style="max-width: 130px;"></v-img>
      </v-sheet>

      <v-list dense>

        <div v-for="menu in items">

          <v-list-item v-if="!menu.child" :prepend-icon="menu.icon" :title="menu.text" :to="menu.url"></v-list-item>

          <v-list-group v-else :value="menu.text">
            <template v-slot:activator="{ props }">
              <v-list-item v-bind="props" :prepend-icon="menu.icon" :title="menu.text"></v-list-item>
            </template>
            <v-list-item v-for="chilted in menu.child" :title="chilted.text" :to="chilted.url"></v-list-item>
          </v-list-group>
        </div>


      </v-list>
    </v-navigation-drawer>

    <v-app-bar app elevation="0">
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>

      <v-responsive max-width="260">
        <v-text-field density="compact" hide-details placeholder="Search" variant="solo"></v-text-field>
      </v-responsive>

      <v-spacer></v-spacer>
      <v-menu>
        <template v-slot:activator="{ props }">

          <v-btn v-bind="props" text>
            <v-avatar color="grey-darken-1" size="30"></v-avatar> My Profile
            <v-icon>mdi-chevron-down mdi</v-icon>
          </v-btn>
        </template>
        <v-list>
          <v-list-item>
            <v-list-item-title>Setting</v-list-item-title>
          </v-list-item>
          <v-list-item>
            <v-list-item-title>Change Password</v-list-item-title>
          </v-list-item>
          <v-list-item @click="logoutadmin">
            <v-list-item-title>Logout</v-list-item-title>
          </v-list-item>
        </v-list>
      </v-menu>
    </v-app-bar>

    <v-main>
      <router-view></router-view>
    </v-main>
  </v-app>
</template>

<script>
import { url } from 'inspector';

export default {
  data: () => ({
    drawer: null,
    itemsdrop: [
      { title: 'Setting' },
      { title: 'Change Password' },
      { title: 'LogOut' },
    ],
    items: [
      { text: 'Dashboard', icon: 'mdi-home-outline', url: '/console/home' },
      { text: 'Users', icon: 'mdi-account-group-outline', url: '/console/users' },
      {
        text: 'KYC Manager', icon: 'mdi-card-account-details-outline', url: '/console/kycmanager',
        child: [
          { text: 'All Application', icon: 'mdi-clock', url: '/console/kycmanager' },
          { text: 'Pending', icon: 'mdi-clock', url: '/console/kycmanagerpendig' },
          { text: 'Missing', icon: 'mdi-clock', url: '/console/kycmanagermising' },
          { text: 'Approve', icon: 'mdi-clock', url: '/console/kycmanagerapprove' },
        ]
      },
      {
        text: 'Deposits', icon: 'mdi-wallet-outline', url: '/console/deposit',
        child: [
          { text: 'Tranding Wallet', icon: 'mdi-clock', url: '/console/trading-wallet' },

        ]
      },
      {
        text: 'Trades', icon: 'mdi-finance',
        child: [
          { text: 'Active Trades', icon: 'mdi-clock', },
          { text: 'Completed Trades', icon: 'mdi-clock', },
        ]
      },
      {
        text: 'Ecosystem', icon: 'mdi-finance',
        child: [
          { text: 'Blockchains', icon: 'mdi-clock', url: '/console/blockchains' },
          { text: 'Completed Trades', icon: 'mdi-clock', },
        ]
      },
      { text: 'API Settings', icon: 'mdi-api' },
      { text: 'Manage Spot', icon: 'mdi-chart-bell-curve-cumulative' },
      { text: 'Withdrawals', icon: 'mdi-swap-horizontal' },
      { text: 'Manage Invites', icon: 'mdi-share-variant-outline' },
      { text: 'Custom Token', icon: 'mdi-litecoin', url: '/console/customtoken' },
      { text: 'Orders', icon: 'mdi-package-variant' },
      { text: 'Settings', icon: 'mdi-cog-outline' },
      {
        text: 'Staking', icon: 'mdi-flag', url: '', child: [
          { text: 'Coin', icon: 'mdi-clock',  url:'/console/stakingcurrencies'},
          { text: 'Logs', icon: 'mdi-clock',  url:'/console/stakinglogs'},
        ]
      },
      { text: 'Support Ticket', icon: 'mdi-help-circle-outline' },
    ],
  }),
  methods: {
    getProfile() {
      let profileid = localStorage.getItem('profileid');
      axios.post('/api/getProfile', { profileid: profileid }).then((response) => {
        if (response.data.id) {
          if (response.data.role == 'A') {

          } else {
            this.$router.push('/');
          }
        } else {
          this.$router.push('/login');
        }
      })
    },
    logoutadmin() {
      localStorage.removeItem('profileid');
      this.$router.push('/login');
    }

  },
  mounted() {
    this.getProfile();
  }

}
</script>