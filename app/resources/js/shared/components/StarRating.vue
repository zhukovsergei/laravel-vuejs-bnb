<template>
    <div class="d-flex">
        <i v-for="star in fullStars" :key="'full_' + star"
           @click="$emit('input', star)"
           class="fas fa-star"></i>
        <i v-for="star in halfStar" :key="'half_' + star"
           class="fas fa-star-half-alt"></i>
        <i v-for="star in emptyStars" :key="'empty_' + star"
           @click="$emit('input', fullStars + star)"
           class="far fa-star"></i>
    </div>
</template>

<script>
export default {
    props: {
        value: Number,
    },
    computed: {
        halfStar() {
            const fraction = Math.round((this.value - Math.floor(this.value)*100));
            return fraction > 0 && fraction < 50;
        },
        fullStars() {
            return Math.round(this.value);
        },
        emptyStars() {
            return 5 - Math.ceil(this.value);
        },
    },
    created() {
    }
}
</script>
