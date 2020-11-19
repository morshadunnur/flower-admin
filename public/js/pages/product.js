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
            feature_image: '',
            cost_price: '',
            selling_price: '',
            quantity: '',
            gallery: [],
        },
        loaders: {
            loading: false,
        },
        file: '',
        files: [],
    },
    methods: {
        StoreProduct(route){
            let formData = new FormData();
            formData.append('category_id', this.product.category_id);
            formData.append('title', this.product.title);
            formData.append('status', this.product.status);
            formData.append('sku', this.product.sku);
            formData.append('description', this.product.description);
            formData.append('feature_image', this.product.feature_image)
            formData.append('cost_price', this.product.cost_price);
            formData.append('selling_price', this.product.selling_price);
            formData.append('quantity', this.product.quantity);
            for (let file of this.product.gallery){
                formData.append('gallery[]', file);
            }
            axios.post(route, formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
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
            const featureImage = this.$refs.featureImage;
            featureImage.type = 'text';
            featureImage.type = 'file';
        },
        handleFeatureImage(){
            this.product.feature_image = this.$refs.featureImage.files[0];
        },
        handleGalleryImage(){
            console.log(this.$refs.galleryImages.files);
            for (let file of this.$refs.galleryImages.files){
                this.product.gallery.push(file);
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