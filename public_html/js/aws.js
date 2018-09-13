const app = new Vue({
    el: '#app',
    data: {
        error: '',
        success: '',
        packages: [],
        source_address: '',
        destination_address: '',
        cost: ''
    },
    methods: {
        create: function(){
            const vm = this;
            axios.get('/package/create?source_address='+vm.source_address+'&destination_address='+vm.destination_address+'&cost='+vm.cost).then(function (response) {
                if(response.data.hasOwnProperty('error')){
                    vm.error = 'Error: ' + response.data.error;
                }else{
                    vm.success = response.data.success;
                    vm.source_address = '';
                    vm.destination_address = '';
                    vm.cost = '';
                }
            }).catch(function(e) {
                vm.error = '' + e;
            });
            setTimeout(function(){
                vm.error = '';
                vm.success = '';
            },5000);
        },
        fetch: function(){
            const vm = this;
            axios.get('/package/fetch').then(function (response) {
                vm.packages = response.data.packages;
            }).catch(function(e) {
                vm.error = '' + e;
            });
        },
        update: function(object){
            const vm = this;
            axios.post('/package/update',{
                package: object
            }).then(function (response) {
                if(response.data.hasOwnProperty('error')){
                    vm.error = 'Error: ' + response.data.error;
                }else{
                    vm.success = response.data.success;
                }
            }).catch(function(e) {
                vm.error = '' + e;
            });
            setTimeout(function(){
                vm.error = '';
                vm.success = '';
            },5000);
        },
        remove: function(object){
            const vm = this;
            axios.post('/package/delete',{
                package: object
            }).then(function (response) {
                if(response.data.hasOwnProperty('error')){
                    vm.error = 'Error: ' + response.data.error;
                }else{
                    vm.success = response.data.success;
                }
            }).catch(function(e) {
                vm.error = '' + e;
            });
            setTimeout(function(){
                vm.error = '';
                vm.success = '';
            },5000);
        },
    },
    mounted: function() {
        this.packages = initial_packages;
    }
});

setInterval(function(){
    app.fetch();
},10000);
