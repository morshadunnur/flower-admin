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
        },
        file: '',
        files: [],
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
        },
        handleSingleFile(){
            this.file = this.$refs.singleFile.files[0];
        },
        handleMultipleFile(){
            for (let file of this.$refs.multipleFile.files){
                this.files.push(file);
            }
        },
        uploadSinglePhoto(route){
            let formData = new FormData();
            formData.append('photo', this.file);
            axios.post(route, formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    console.log(response);
                })
                .catch(e => {
                    console.log(e);
                });
        },
        uploadMultiplePhoto(route){
            let formData = new FormData();
            formData.append('photos', this.files);
            axios.post(route, formData , {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            })
                .then(response => {
                    console.log(response);
                })
                .catch(e => {
                    console.log(e);
                });
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