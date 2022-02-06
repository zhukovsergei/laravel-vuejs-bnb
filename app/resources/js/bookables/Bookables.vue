<template>
    <div>
        <div v-if="loading">
            loading...
        </div>
        <div v-if="bookables">
            <bookable-list-item
                v-for="(bk, index) in bookables"
                :key="index"
                :title="bk.title"
                :content="bk.content"
                :price="500"></bookable-list-item>
        </div>

    </div>
</template>

<script>
import BookableListItem from "./BookableListItem";

export default {
    data(){
        return {
            bookables: null,
            loading: true,
            columns: 3,
        }
    },
    components: {
        BookableListItem
    },
    computed: {
        rows() {
            if(this.bookables === null) {
                return 0;
            }
            return Math.ceil(this.bookables.length / this.columns);
        }
    },
    created() {
        setTimeout(() => {
            this.bookables = [
                {
                    title: 'Item 1',
                    content: 'Descr 1',
                },
                {
                    title: 'Item 2',
                    content: 'Descr 2',
                },
                {
                    title: 'Item 2',
                    content: 'Descr 2',
                },
                {
                    title: 'Item 2',
                    content: 'Descr 2',
                },
                {
                    title: 'Item 2',
                    content: 'Descr 2',
                },
                {
                    title: 'Item 2',
                    content: 'Descr 2',
                },
                {
                    title: 'Item 2',
                    content: 'Descr 2',
                },
            ];
            this.loading = false;
        }, 1000);
    }
}
</script>
