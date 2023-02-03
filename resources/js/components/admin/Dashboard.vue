<template>
  <v-app id="inspire">
    <v-navigation-drawer v-model="drawer" app>


      <v-list>

        <div v-for="menu in items">

          <v-list-item v-if="!menu.child" :prepend-icon="menu.icon" :title="menu.text" :to="menu.url"></v-list-item>

          <v-list-group v-else :value="menu.text">
            <template v-slot:activator="{ props }">
              <v-list-item v-bind="props" prepend-icon="mdi-account-circle" :title="menu.text"></v-list-item>
            </template>
            <v-list-item v-for="chilted in menu.child" :title="chilted.text" :to="chilted.url"></v-list-item>
          </v-list-group>
        </div>


      </v-list>
    </v-navigation-drawer>

    <v-app-bar app elevation="0">
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>

      <v-toolbar-title>Application</v-toolbar-title>
      <v-spacer></v-spacer>
      <v-menu>
        <template v-slot:activator="{ props }">
          <v-btn color="primary" v-bind="props">
            My Profile
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
            <v-list-item-title>LogOut</v-list-item-title>
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
export default {
  data: () => ({
    drawer: null,
    itemsdrop: [
      { title: 'Setting' },
      { title: 'Change Password' },
      { title: 'LogOut' },
    ],
    items: [
      { text: 'Dashboard', icon: 'mdi-clock', url: '/console/home' },
      { text: 'Users', icon: 'mdi-account', url: '/console/users' },
      {
        text: 'KYC Manager', icon: 'mdi-flag', url: '/console/kycmanager',
        child: [
          { text: 'All Application', icon: 'mdi-clock', url: '/console/kycmanager' },
          { text: 'Pending', icon: 'mdi-clock', url: '/console/kycmanagerpendig' },
          { text: 'Missing', icon: 'mdi-clock', url: '/console/kycmanagermising' },
          { text: 'Approve', icon: 'mdi-clock', url: '/console/kycmanagerapprove' },
        ]
      },
      {
        text: 'Deposits', icon: 'mdi-flag', url: '/console/deposit',
        child: [
          { text: 'Tranding Wallet', icon: 'mdi-clock', url: '/console/trading-wallet' },

        ]
      },
      { text: 'Active Trades', icon: 'mdi-flag' },
      { text: 'Completed Trades', icon: 'mdi-flag' },
      { text: 'API Settings', icon: 'mdi-flag' },
      { text: 'Manage Spot', icon: 'mdi-flag' },
      { text: 'Withdrawals', icon: 'mdi-swap-horizontal' },
      { text: 'Manage Invites', icon: 'mdi-flag' },
      { text: 'Custom Token', icon: 'mdi-flag' },
      { text: 'Orders', icon: 'mdi-flag' },
      { text: 'Settings', icon: 'mdi-flag' },
      { text: 'Staking', icon: 'mdi-flag' },
      { text: 'Support Ticket', icon: 'mdi-flag' },
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