<template>
    <div style="padding: 1.25em">
        <h6 class="text-uppercase text-secondary pt-4">Review list</h6>

        <div v-if="loading">Loading...</div>
        <div v-else>
            <div
                v-for="(review, index) in this.reviews"
                :key="'reviews_'+index"
                class="border-bottom d-none d-md-block">
                <div class="row pt-4">
                    <div class="col-md-6"> Persone QWEa</div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <star-rating :value="review.rating" class="fa-lg"></star-rating>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">{{ review.created_at | fromNow() }}</div>
                </div>
                <div class="row pt-4 pb-4">
                    <div class="col-md-12">{{ review.content }}</div>
                </div>
            </div>
        </div>

    </div>

</template>

<script>

export default {
    components: {
    },
    props: {
        bookableId: [String, Number]
    },
    data(){
        return {
            loading: false,
            reviews: null,
        }
    },
    created() {
        this.loading = true;
        axios.get(`/api/bookables/${this.bookableId}/reviews`)
        .then(response => this.reviews = response.data.data)
        .then(() => this.loading = false);
    },
}
</script>
