<template>
    <div>
        <div v-if="loading">
            Loading...
        </div>
        <div v-else>
            <div v-if="alreadyReviewed">
                <h3>Already reviewed</h3>
            </div>
            <div v-else>
                <div class="mb-3">
                    <label class="form-label">Select the star rating</label>
                    <star-rating v-model="review.rating"></star-rating>
                    <!--            <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">-->
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Message</label>
                    <textarea v-model="review.content" class="form-control" id="content" rows="5"></textarea>
                </div>
                <button class="btn btn-primary">Send</button>
            </div>
        </div>

    </div>
</template>

<script>

export default {
    data() {
      return {
          review: {
              rating: 5,
              content: null,
          },
          existingReview: null,
          loading: false,
      }
    },
    methods: {
        onRatingChanged(rating) {
            this.rating = rating;
        }
    },
    created() {
        this.loading = true;

        axios.get(`/api/reviews/${this.$route.params.id}`)
            .then(response => this.existingReview = response.data.data)
            .catch(error => {})
            .then(() => {
                this.loading = false
            });
    },
    computed: {
        alreadyReviewed() {
            return this.existingReview !== null;
        }
    }
}</script>
