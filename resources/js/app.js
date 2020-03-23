/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import 'v-markdown-editor/dist/index.css'
import Editor from 'v-markdown-editor'
Vue.use(Editor)

import Vuex from 'vuex'
Vue.use(Vuex)

import storeData from './store/index'

const store = new Vuex.Store(
    storeData
)

import {filter} from './filter'

import VueRouter from 'vue-router'
Vue.use(VueRouter)

import {routes} from './routes'

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('admin-master', require('./components/admin/Master.vue').default);
Vue.component('publilc-master', require('./components/public/Master.vue').default);

import { Form, HasError, AlertError } from 'vform'

window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

// ES6 Modules or TypeScript
import Swal from 'sweetalert2'

window.Swal = Swal;

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3500,
    timerProgressBar: false
})

window.Toast = Toast;

const router = new VueRouter({
    routes, // short for `routes: routes`
    mode: 'hash'
})

const app = new Vue({
    el: '#app',
    router,
    store
});
