<template>
    <div>
        <h6 class="text-uppercase text-secondary fw-bolder ">
            Check Availability
            <span v-if="noAvailability" class="text-danger">(no available)</span>
            <span v-if="hasAvailability" class="success">(available)</span>
        </h6>

        <div class="row g-3">
            <div class="col-md-6">
                <label for="from" class="col-form-label">From</label>
                <input
                    v-model="from"
                    @keyup.enter="check"
                    :class="{'is-invalid': this.errorFor('from')}"
                    type="text" class="form-control" id="from">
                <div v-for="(error, index) in this.errorFor('from')" :key="'from_' + index" class="invalid-feedback">
                    {{error}}
                </div>
            </div>
            <div class="col-md-6">
                <label for="to" class="col-form-label">To</label>
                <input
                    v-model="to"
                    @keyup.enter="check"
                    :class="{'is-invalid': this.errorFor('to')}"
                    type="text" class="form-control" id="to">
                <div v-for="(error, index) in this.errorFor('to')" :key="'to_' + index" class="invalid-feedback">
                    {{error}}
                </div>
            </div>
            <div class="d-grid gap-1 mt-2">
                <button
                    @click="check"
                    :disabled="loading"
                    class="btn btn-secondary">Check</button>
            </div>
        </div>
    </div>
</template>

<script>
import {is422} from "../shared/utils/response";

export default {
    props: {
        bookableId: [String, Number]
    },
    data(){
        return {
            from: null,
            to: null,
            loading: false,
            status: null,
            errors: null,
        }
    },
    created() {

    },
    methods: {
        check() {
            this.loading = true;
            this.errors = null;
            axios.get(`/api/bookables/${this.bookableId}/availability?from=${this.from}&to=${this.to}`)
            .then(response => {
                this.status = response.status;
            }).catch(error => {
                if(is422(error)) {
                    this.errors = error.response.data.errors;
                }
                this.status = error.response.status;

            }).then(() => this.loading = false);
        },
        errorFor(field) {
            return this.hasErrors && this.errors[field]? this.errors[field] : null;
        },
    },
    computed: {
        hasErrors() {
            return 422 === this.status && this.errors !== null;
        },
        hasAvailability() {
            return 200 === this.status;
        },
        noAvailability() {
            return 404 === this.status;
        },
    },
}
</script>

<style scoped>
label {
    font-size: 0.7rem;
    text-transform: uppercase;
    color: gray;
    font-weight: bolder;
}
.is-invalid {
    border-color: #b22222;
    background-image: none;
}
.invalid-feedback {
    color: #b22222;
}
</style>
