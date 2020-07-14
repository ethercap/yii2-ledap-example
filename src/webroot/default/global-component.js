ledap.App.register([], Vue);
var app = new Vue({
    el: '#app',
    data: {
        isLoading: false,
        jsConfig: {
            title: "Test",
            size:'sm',
            buttonSize: 'sm',
            okVariant : "success",
            okTitle: "OK",
            cancelTitle: "cancel",
            centered: true,
            message: "hello world",
        },
        sizeList : [
            {value: "sm", text:"small"},
            {value: "lg", text:"large"},
            {value: "", text:"normal"},
        ],
        variants: [
            {value: "primary", text:"primary"},
            {value: "secondary", text:"secondary"},
            {value: "danger", text:"danger"},
            {value: "warning", text:"warning"},
            {value: "info", text:"info"},
            {value: "success", text:"success"},
            {value: "light", text:"light"},
            {value: "dark", text:"dark"},
    
        ],
    },
    methods: {
        showLoading: function(){
            this.isLoading = true;
            setTimeout(function(){
                this.isLoading = false;
            }.bind(this), 3000);
        },
        showAlert: function(){
            //参见https://bootstrap-vue.org/docs/components/modal
            //等同于，this.$bvModal.msgBoxOk
            this.$alert(this.jsConfig.message, this.jsConfig);    
        },
        showConfirm: function(){
            //参见https://bootstrap-vue.org/docs/components/modal
            //this.$bvModal.msgBoxConfirm
            this.$confirm(this.jsConfig.message, this.jsConfig).then(function(ret){
                console.log(ret);
            }).catch(function(){
                console.log("error");
            });    
        },
        test: function(){
            this.$toast("hello world");
        },
    },
});
 
