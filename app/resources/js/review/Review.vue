<template>
    <div class="row">
        <div :class="[{'col-md-4': loading || !alreadyReviewed}, {'d-none': !loading && alreadyReviewed}]">
            <div class="card">
                <div class="card-body">
                    <div v-if="loading">
                        Loading...
                    </div>
                    <div v-else>
                        <p class="card-text">
                            You are at  <router-link
                            :to="{name: 'bookable', params: {id: booking.bookable.bookable_id}}">
                            {{booking.bookable.title}}
                        </router-link>
                        </p>
                        <p class="card-text">
                            From: {{booking.from}} to {{booking.to}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div :class="[{'col-md-8': loading || !alreadyReviewed}, {'col-md-12': !loading && alreadyReviewed}]">
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
          booking: false,
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
            .catch(error => {
                if(error.response &&  error.response.status && 404 === error.response.status) {
                    return axios.get(`/api/booking-by-review/${this.$route.params.id}`).then(response => {
                        this.booking = response.data.data;
                    });
                }
            })
            .then(() => {
                this.loading = false
            });
    },
    computed: {
        alreadyReviewed() {
            return this.hasReview || !this.booking;
        },
        hasReview() {
            return this.existingReview !== null;
        },
        hasBooking() {
            return this.booking !== null;
        },
    }
}</script>
