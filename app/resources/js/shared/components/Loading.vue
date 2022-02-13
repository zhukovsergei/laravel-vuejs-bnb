<template>
    <div>
        <span v-if="!isLoading"><slot></slot></span>
        <span v-if="isLoading"><i class="fas fa-circle-notch fa-spin"></i> wait...</span>
    </div>
</template>

<script>
export default {
    props: {
        isLoading: [Boolean]
    },
}
</script>

<style scoped>
.success {
    color: #999;
    font-size: 10rem;
}
</style>
