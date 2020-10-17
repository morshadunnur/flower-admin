new Vue({
    el: '#app',
    data: {
        category: 'hello',
    },
    methods: {

    },
    computed: {

    },
    watch: {

    },
    mounted() {
        axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
    }
});