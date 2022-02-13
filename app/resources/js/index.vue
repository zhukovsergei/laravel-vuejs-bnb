<template>
    <div>
        <nav class="navbar bg-white border-bottom navbar-light">
            <router-link :to="{name: 'home'}" class="navbar-brand me-auto">Home</router-link>
        </nav>
        <div class="container mt-4 mb-4 pe-4 ps-4">
            <router-view></router-view>
        </div>
    </div>
</template>


<script>
import { mapState } from "vuex";
export default {
    data() {
        return {
            lastSearch: this.$store.state.lastSearch
        };
    },
    computed: {
        ...mapState({
            lastSearchComputed: "lastSearch",
            // isLoggedIn: "isLoggedIn"
        }),
/*        ...mapGetters({
            itemsInBasket: "itemsInBasket"
        }),*/

    },
    methods: {
/*        async logout() {
            try {
                axios.post("/logout");
                this.$store.dispatch("logout");
            } catch (error) {
                this.$store.dispatch("logout");
            }
        }*/
    }
};
</script>
