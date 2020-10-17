new Vue({
    el: '#categoryPage',
    data: {
        category: {
            name: '',
        }
    },
    methods: {
        createCategory(route) {
            axios.post(route, this.category)
                .then((response) => {
                    if(response.status === 201){
                        this.resetCategory();
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
        resetCategory() {
            this.category = {
                name: ''
            }
        }
    },
    computed: {

    },
    watch: {

    },
    mounted() {
        axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    }
});