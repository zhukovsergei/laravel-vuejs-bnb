import ExampleComponent from "./components/ExampleComponent.vue";
import VueRouter from "vue-router";
import Bookables from "./bookables/Bookables";

const routes = [
    {
        path: '/',
        component: Bookables,
        name: 'home',
    }
];

const router = new VueRouter({
    mode: 'history',
    routes
});

export default router;
