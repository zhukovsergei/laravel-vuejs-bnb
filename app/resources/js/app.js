require('./bootstrap');

import VueRouter from "vue-router";
import router from "./routes"
import Index from "./index.vue";

window.Vue = require('vue').default;

Vue.use(VueRouter);

const app = new Vue({
    el: '#app',
    router,
    components: {
        'index': Index
    }
});
