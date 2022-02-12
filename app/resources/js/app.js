
require('./bootstrap');

import VueRouter from "vue-router";
import router from "./routes"
import Index from "./index.vue";
import moment from "moment";
import StarRating from "./shared/components/StarRating";
import FatalError from "./shared/components/FatalError";

window.Vue = require('vue').default;

Vue.use(VueRouter);
Vue.filter('fromNow', value => moment(value).fromNow());
Vue.component('star-rating', StarRating);
Vue.component('fatal-error', FatalError);

const app = new Vue({
    el: '#app',
    router,
    components: {
        'index': Index
    }
});
