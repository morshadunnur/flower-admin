let app = new Vue({
    el: '#detailProduct',
    data: {
        product: {},
    },
    methods: {
        getProductDetails(){
            axios.get(productDetailsRoute, {
                params: {
                    product_id: productId
                }
            })
                        .then(response => {
                            if (response.status === 200){
                                console.log(response.data);
                            }
                        })
                        .catch(e => {
                            switch (e.response.status){
                                case 422:

                                    break;
                                case 406:

                                    break;
                                case 500:

                                    break;
                                default:

                                    break;
                            }

                        })
        }
    },
    computed: {
        
    },
    created() {
        axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
        this.getProductDetails();
    },
    mounted() {
        
    }
});