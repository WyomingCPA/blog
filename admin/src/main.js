import Vue from 'vue'
import { store } from './store'
import App from './App.vue'
import router from './router'
import BootstrapVue from 'bootstrap-vue'
import VueSweetalert2 from 'vue-sweetalert2'
import axios from 'axios'

Vue.use(BootstrapVue)
Vue.use(VueSweetalert2)

Vue.config.performance = true

axios.defaults.withCredentials = true
Vue.config.productionTip = false
//axios.defaults.baseURL = 'http://localhost/blog/public'
axios.defaults.baseURL = 'http://simpleitrunner.ru/';

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

store.dispatch('me').then(() => {
  new Vue({
    router,
    store,
    render: h => h(App)
  }).$mount('#app')
})
