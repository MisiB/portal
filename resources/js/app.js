require('./bootstrap');

require('alpinejs');
import { App, plugin } from '@inertiajs/inertia-vue'
import Vue from 'vue'
import { InertiaProgress } from '@inertiajs/progress'
import vuetify from "./Plugins/vuetify";
import moment from 'moment';

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
import excel from 'vue-excel-export'
 
Vue.use(VueSweetalert2);
Vue.use(plugin)
Vue.use(excel)
const route = window.route
Vue.prototype.$route = route
Vue.filter('formatDate',function(value){
    if(value){
        return moment(String(value)).format('MM/DD/YYYY hh:mm')
    }
})

InertiaProgress.init()
const el = document.getElementById('app')

new Vue({
    vuetify,
    render: h => h(App, {
        props: {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: name => import(`./Pages/${name}`).then(module => module.default),
        },
    }),
}).$mount(el)
