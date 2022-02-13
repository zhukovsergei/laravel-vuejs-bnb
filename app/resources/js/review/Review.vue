<template>
    <div>
        <success v-if="success"></success>
        <fatal-error v-if="error" ></fatal-error>
        <div class="row" v-if="!success && !error">
            <div :class="[{'col-md-4': twoColumn}, {'d-none': oneColumn}]">
                <div class="card">
                    <div class="card-body">
                        <div v-if="loading">
                            Loading...
                        </div>
                        <div v-if="hasBooking">
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
            <div :class="[{'col-md-8': twoColumn}, {'col-md-12': oneColumn}]">
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
                            <textarea
                                :class="{'is-invalid': errorFor('content')}"
                                v-model="review.content" class="form-control" id="content" rows="5"></textarea>
                            <v-errors :errors="errorFor('content')"></v-errors>
                        </div>
                        <button
                            @click.prevent="submit"
                            :disabled="sending"
                            class="btn btn-primary">Send</button>
                    </div>
                </div>
            </div>
        </div>



    </div>
</template>

<script>

import {is404, is422} from "../shared/utils/response";
import validationErrors from "../shared/mixins/validationErrors";

export default {
    mixins: [validationErrors],
    data() {
      return {
          review: {
              id: null,
              rating: 5,
              content: null,
          },
          existingReview: null,
          loading: false,
          booking: false,
          error: false,
          sending: false,
          success: false,
      }
    },
  async created() {
        this.review.id = this.$route.params.id;
        this.loading = true;


        try {
            this.existingReview = (await axios.get(`/api/reviews/${this.review.id}`)).data.data;
        } catch (err){
            if(is404(err)) {
                try {
                    this.booking = (await axios.get(`/api/booking-by-review/${this.review.id}`)).data.data;
                } catch (err) {
                    this.error = !is404(err);
                }
            } else {
                this.error = true;
            }

        }

      this.loading = false;
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
        oneColumn() {
            return !this.loading && this.alreadyReviewed;
        },
        twoColumn() {
            return this.loading || !this.alreadyReviewed;
        },
    },
    methods: {
        submit() {
            this.errors = null;
            this.sending = true;
            this.success = false;

            axios.post(`/api/reviews`, this.review)
                .then(response => {
                    this.success = 201 === response.status;
                    // this.existingReview = response.data.data
                })
                .catch(error => {
                    if(is422(error)) {
                        const errors = error.response.data.errors;

                        if(errors['content'] && 1 === _.size(errors)) {
                            this.errors = errors;
                            return;
                        }
                    }

                    this.error = true;
                })
                .then(()=> this.sending = false)


        },
    },
}</script>
