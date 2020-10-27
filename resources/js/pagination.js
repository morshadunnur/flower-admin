let paginationCustom = {
    props: {
        pagination: {
            type: Object,
            required: true
        },
        offset: {
            type: Number,
            default: 4
        }
    },
    computed: {
        pagesNumber() {
            if (!this.pagination.to) {
                return [];
            }
            let from = this.pagination.current_page - this.offset;
            if (from < 1) {
                from = 1;
            }
            let to = from + (this.offset * 2);
            if (to >= this.pagination.last_page) {
                to = this.pagination.last_page;
            }
            let pagesArray = [];
            for (let page = from; page <= to; page++) {
                pagesArray.push(page);
            }
            return pagesArray;
        }
    },
    methods: {
        changePage(page) {
            this.pagination.current_page = page;
            this.$emit('paginate');
        }
    },
    template: ' <ul class="pagination rounded">\n' +
        '    <li class="page-item" v-if="pagination.current_page > 1">\n' +
        '        <a href="javascript:void(0)" :class="{\'page-link\': true}" v-on:click.prevent="changePage(pagination.current_page - 1)">\n' +
        '            <i class="mdi mdi-chevron-left"></i>\n' +
        '            </a>\n' +
        '        </li>\n' +
        '    <li v-for="page in pagesNumber" :class="{\'active\': page == pagination.current_page, \'page-item\': true}" >\n' +
        '        <a href="javascript:void(0)" v-on:click.prevent="changePage(page)" class="page-link">{{ page }}</a>\n' +
        '        </li>\n' +
        '    <li class="page-item" v-if="pagination.current_page < pagination.last_page">\n' +
        '        <a href="javascript:void(0)" class="page-link" v-on:click.prevent="changePage(pagination.current_page + 1)">\n' +
        '            <i class="mdi mdi-chevron-right"></i>\n' +
        '            </a>\n' +
        '        </li>\n' +
        '    </ul>'
}

export default paginationCustom;