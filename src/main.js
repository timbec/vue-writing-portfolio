import Vue from 'vue'
import VueRouter from 'vue-router';
import App from './App.vue'

import { routes } from './routes';

Vue.use(VueRouter);

const router = new VueRouter({
   routes, //ES6,
   mode: 'history' //no hashtag style
})



new Vue({
     router,
}).$mount('#app')
