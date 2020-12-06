let app = new Vue({
    el: '#detailProduct',
    data: {
        product: {},
        editProductPrice: {

        },
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
                                this.product = response.data;
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
        },
        selectProductPrice(price) {
            this.editProductPrice = price;
        },
        resetProductPrice(){
            this.editProductPrice = {};
        },
        updateProductPrice(route){
            axios.put(route, {
                price_id: this.editProductPrice.id,
                cost_price: this.editProductPrice.cost_price,
                selling_price: this.editProductPrice.selling_price,
                quantity: this.editProductPrice.quantity,
            })
                        .then(response => {
                            if (response.status === 204){
                                this.getProductDetails();
                                toastr.success('Price Updated');
                            }
                        })
                        .catch(e => {
                            switch (e.response.status){
                                case 422:
                                    toastr.error(e.response.message);
                                    break;
                                case 406:
                                    toastr.error('Could not process data');
                                    break;
                                case 500:
                                    toastr.error('Something Went wrong');
                                    break;
                                default:
                                    toastr.error('Something Went wrong');
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