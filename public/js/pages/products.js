Vue.component('pagination-vue', paginationCustom);
let app = new Vue({
    el: '#productPage',
    data: {
        products: {
            total: 0,
            from: 1,
            to: 5,
            current_page: 1,
        },
        product: {},
        categories: []
    },
    methods: {
        getAllProducts(){
            let route = productListRoute + '?&page=' + this.products.current_page;
            axios.get(route)
                .then((response) => {
                    if (response.status === 200){
                        this.products = response.data.data;
                    }else{
                        toastr.error(response.data.message);
                    }
                })
                .catch(error => {
                    toastr.error(error.message)
                })
        },
        getCategoryList(){
            axios.get(CategoryListRoute)
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
        selectProduct(product){
            this.product = product;
        },
        deleteProduct(route){
            axios.delete(route)
                .then((response) => {
                    if(response.status === 200){
                        this.getAllProducts();
                        toastr.success(response.data.message);
                    }else{
                        toastr.error(response.data.message);
                    }
                }).catch(error => {
                toastr.error(error.message);
            })
        },
        resetProduct(){
            this.product = {}
        }

    },
    computed: {
        
    },
    watch: {
        
    },
    created() {
        axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
        this.getAllProducts();
        this.getCategoryList();
    },
    mounted() {
    }
});