
require('./bootstrap');

import VueRouter from "vue-router";
import Vuex from "vuex";
import router from "./routes"
import storeDefinition from "./store"
import Index from "./index.vue";
import moment from "moment";
import StarRating from "./shared/components/StarRating";
import FatalError from "./shared/components/FatalError";
import Success from "./shared/components/Success";
import Loading from "./shared/components/Loading";
import ValidationErrors from "./shared/components/ValidationErrors";

window.Vue = require('vue').default;

Vue.use(VueRouter);
Vue.use(Vuex);
Vue.filter('fromNow', value => moment(value).fromNow());
Vue.component('star-rating', StarRating);
Vue.component('fatal-error', FatalError);
Vue.component('success', Success);
Vue.component('loading', Loading);
Vue.component('v-errors', ValidationErrors);

const store = new Vuex.Store(storeDefinition);

const app = new Vue({
    el: '#app',
    router,
    store,
    components: {
        'index': Index
    },
    beforeCreate() {
        this.$store.dispatch('loadStoredState');
    }
});
