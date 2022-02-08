<template>
    <div>
        <h6 class="text-uppercase text-secondary fw-bolder ">Check Availability</h6>

        <div class="row g-3">
            <div class="col-md-6">
                <label for="from" class="col-form-label">From</label>
                <input v-model="from" @keyup.enter="check" type="text" class="form-control" id="from">
            </div>
            <div class="col-md-6">
                <label for="to" class="col-form-label">To</label>
                <input v-model="to" @keyup.enter="check" type="text" class="form-control" id="to">
            </div>
        </div>
        <div class="d-grid gap-1 mt-2">
            <button class="btn btn-secondary" @click="check">Check</button>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            from: null,
            to: null,
        }
    },
    created() {

    },
    methods: {
        check() {
            alert('1');
        }
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
