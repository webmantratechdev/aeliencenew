import { createRouter, createWebHashHistory } from "vue-router";

import Home from './components/fronted/Home.vue';
import About from './components/fronted/About.vue';

const routes = [
    { path: '/', component: Home },
    { path: '/about', component: About },
  ]
  
  // 3. Create the router instance and pass the `routes` option
  // You can pass in additional options here, but let's
  // keep it simple for now.
  const router = createRouter({
    // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
    history: createWebHashHistory(),
    routes, // short for `routes: routes`
    hashbang: false,
    root: '/'
  })

  export default router;