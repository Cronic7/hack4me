/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Swal from 'vue-sweetalert2';

Vue.use(Swal);


// CommonJS

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('my-button', require('./components/mybutton.vue').default);
// Vue.component('navbar', require('./components/Navbar.vue').default);
Vue.component('Rating', require('./components/Rating.vue').default);
Vue.component('Rating1', require('./components/mybutton.vue').default);
Vue.component('Rating2', require('./components/mybutton.vue').default);
Vue.component('RatingHacker', require('./components/Hackerrank.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */



var app = new Vue({
  el: '#app',
  components: {
    Rating,RatingHacker
  },
 
   beforeCreate: function() {
    document.body.className = 'home';
  }




})
