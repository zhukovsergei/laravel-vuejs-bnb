<template>
    <div>
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
</template>

<script>

export default {
    data() {
      return {
          review: {
              rating: 5,
              content: null,
          }
      }
    },
    methods: {
        onRatingChanged(rating) {
            this.rating = rating;
        }
    }
}</script>
