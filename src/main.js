// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import 'babel-polyfill'
import Vue from 'vue'
import BootstrapVue from "bootstrap-vue"
import VueI18n from 'vue-i18n'
import './assets/bootstrap.min.css'
//import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import App from './App'
import router from './router'

Vue.use(VueI18n)
Vue.use(BootstrapVue)
Vue.config.productionTip = false

var append = undefined
if (window.navigator.userLanguage) {
  if (window.navigator.userLanguage > 2) {
    append = window.navigator.userLanguage.substr(0, 2)
  } else {
    append = window.navigator.userLanguage
  }
} else if (window.navigator.language) {
  if (window.navigator.language.length > 2) {
    append = window.navigator.language.substr(0, 2)
  } else {
    append = window.navigator.language
  }
}

var language = window.localStorage.language || append || 'en';

const i18n = new VueI18n({
  locale: language, // set default locale
  fallbackLocale: 'en', // fallbackLocale
})

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  template: '<App/>',
  components: { App },
  i18n
})
