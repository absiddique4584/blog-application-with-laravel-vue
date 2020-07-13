
require('./bootstrap');
window.Vue = require('vue');

// editor support
//import VueMarkdownEditor from '@kangc/v-md-editor';
//import '@kangc/v-md-editor/lib/style/base-editor.css';
//import vuepressTheme from '@kangc/v-md-editor/lib/theme/vuepress.js';

//VueMarkdownEditor.use(vuepressTheme);

//Vue.use(VueMarkdownEditor);

// editor support
//import 'v-markdown-editor/dist/index.css';
//import Editor from 'v-markdown-editor'
//Vue.use(Editor);
// Support vuex
import Vuex from 'vuex'
Vue.use(Vuex)
import storeData from "./store/index"
const store = new Vuex.Store(
    storeData
)

//support moment js
import {filter} from './filter'
// vue router
import VueRouter from 'vue-router'
Vue.use(VueRouter)

import {routes} from './routes';
//Vue.component('example-component', require('./components/ExampleComponent.vue'));
//Vue.component('admin-main', require('./components/admin/AdminMaster.vue'));
//Vue.component('home-main', require('./components/public/PublicMaster.vue'));

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('home', require('./components/admin/AdminHome.vue').default);
Vue.component('admin-main', require('./components/admin/AdminMaster.vue').default);
Vue.component('home-main', require('./components/public/publicMaster').default);


// V-form
import { Form, HasError, AlertError } from 'vform'

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form = Form;


// Sweet alert 2
import Swal from 'sweetalert2'
window.Swal = Swal;
const toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

window.toast = toast



const router = new VueRouter({
    routes, // short for `routes: routes`
    mode:'hash',

})



const app = new Vue({
    el: '#app',
    router,
    store,

});






