ledap.App.register(['detail', 'form-item', 'dropdown'], Vue);
const app = new Vue({
  el: "#app",
  data : {
    model: ledap.App.getModel(data.model),
    type : data.type,
    isLoading : false,
    columns : [
        'id',
        'name',
        'mobile',
        {
            'attribute' : 'gender',
            'value' : function(model){
                return model.genderDesc;
            }
        },
        'creationTime',
        'updateTime',
    ],
  },
  methods : {
    submit : function(){
        event.preventDefault();
        if(!this.model.validate()) {
            errors = this.model.getErrors();
            let error = "";
            Object.keys(errors).forEach(key => {
                if(errors[key].length > 0) {
                    error = errors[key][0];
                }
            });
            this.$toast(error, {variant:'warning'});
            return false;
        }
        let url = this.type === "create" ? '/ledap/student/create' : '/ledap/student/update?id='+this.model.id;
        this.isLoading = true;
        ledap.App.request({
            url: url,
            method: 'POST',
            data: this.model
        }, (data) =>{
            this.model.load(data.data);
            this.isLoading  = false;
            if(!this.model.hasErrors()) {
                this.$toast("操作成功");
                location.href="/ledap/student/index";
            }
        }, (data)=>{
            this.isLoading = false;
            this.$toast(data.message, {variant:'danger'});
        });
    },
    changeType: function() {
        if(this.type === 'create') {
            return;
        }
        if(this.type === 'update') {
            this.type = 'view';
            return;
        }
        this.type = 'update';
    }
  },
});

