Vue.component('pagination-vue', paginationCustom);
let app = new Vue({
    el: '#productPage',
    data: {
        products: {
            total: 0,
            from: 1,
            to: 5,
            current_page: 1,
        }
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
        }
    },
    computed: {
        
    },
    watch: {
        
    },
    created() {
        axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
        this.getAllProducts();
    },
    mounted() {
        
    }
});