Vue.component('pagination-vue', paginationCustom);
new Vue({
    el: '#categoryPage',
    data: {
        category: {
            name: '',
            parent_id: '',
            slug: '',
            status: 1,
        },
        categories: {
            total: 0,
            from: 1,
            to: 5,
            current_page: 1,
        }
    },
    methods: {
        getCategoryList(){
            let route = CategoryListRoute + '?&page=' + this.categories.current_page;
            axios.get(route)
                .then((response) => {
                    if (response.status === 200){
                        this.categories = response.data.data;
                    }else{
                        toastr.error(response.data.message);
                    }
                })
                .catch(error => {
                    toastr.error(error.message)
                })
        },
        createCategory(route) {
            axios.post(route, this.category)
                .then((response) => {
                    if(response.status === 201){
                        this.resetCategory();
                        this.getCategoryList();
                        toastr.success(response.data.message);
                    }else{
                        this.resetCategory();
                        toastr.error(response.data.message);
                    }
                }).catch(error => {
                    this.resetCategory();
                    toastr.error(error.message);
            })
        },
        updateCategory(route){
            axios.put(route, {
                name: this.category.name,
                slug: this.category.slug
            })
                .then((response) => {
                    if(response.status === 201){
                        this.resetCategory();
                        this.getCategoryList();
                        toastr.success(response.data.message);
                    }else{
                        this.resetCategory();
                        toastr.error(response.data.message);
                    }
                }).catch(error => {
                this.resetCategory();
                toastr.error(error.message);
            })
        },
        deleteCategory(route){
            axios.delete(route)
                .then((response) => {
                    if(response.status === 204){
                        this.resetCategory();
                        this.getCategoryList();
                        toastr.success(response.message);
                    }else{
                        this.resetCategory();
                        toastr.error(response.message);
                    }
                }).catch(error => {
                this.resetCategory();
                toastr.error(error.message);
            })
        },
        setCategory(category){
            this.category = category
        },
        resetCategory() {
            this.category = {
                name: '',
                parent_id: ''
            }
        }
    },
    computed: {

    },
    watch: {

    },
    created() {
        axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
        this.getCategoryList();
    },
    mounted() {

    }
});