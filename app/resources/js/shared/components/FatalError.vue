<template>
    <div class="text-center error">
        <i class="fas bomb"></i>
        <h1>Error</h1>
        <h3>No data</h3>
    </div>
</template>

<script>
export default {
    props: {
        // errors: Array,
    },
    created() {
    }
}
</script>

<style scoped>
.error {
    color: #dc3545;
    font-size: 10rem;
}
</style>
