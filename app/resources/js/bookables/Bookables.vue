<template>
    <div>
        <div v-if="loading">
            loading...
        </div>
        <div v-else>
            <div v-for="row in rows" :key="'row_' + row" class="row mb-4">
                <div v-for="(bk, index) in getItemsInRow(row)"
                     :key="'row_' + row + '_' + index" class="col">
                    <bookable-list-item :title="bk.title" :content="bk.content" :price="500"></bookable-list-item>
                </div>

                <div v-for="p in getPlaceHolderRows(row)" :key="'placeholder_' + row + '_' + p" class="col"></div>
            </div>
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
    methods: {
        getItemsInRow(row) {
            return this.bookables.slice((row - 1) * this.columns, row * this.columns);
        },
        getPlaceHolderRows(row) {
            return this.columns - this.getItemsInRow(row).length;
        },
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
