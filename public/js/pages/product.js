let app = new Vue({
    el: '#productPage',
    data: {
        products: [],
        product: {
            title: '',
            category_id: '',
            sku: '',
            description: '',
            status: 1,
        },
        loaders: {
            loading: false,
        }
    },
    methods: {
        StoreProduct(route){
            axios.post(route, this.product)
                .then((response) => {
                    if (response.status === 201){
                        this.resetProduct();
                        toastr.success(response.data.message);
                    }else{
                        toastr.error(response.data.message);
                    }
                })
                .catch(e => {
                    console.log(e.message);
                });
        },
        resetProduct() {
            this.product = {
                title: '',
                category_id: '',
                sku: '',
                description: '',
                status: 1,
            }
        }
    },
    computed: {

    },
    watch: {

    },
    created() {
        axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    },
    mounted() {

    }
});