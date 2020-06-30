ledap.App.register(["form-item","detail", "group", "tab", 'grid', 'pager', "baseinput"], Vue);
const app = new Vue({
  el: "#app",
  data : {
    dp : ledap.App.getWebDp({
        httpOptions:{
            url: "/ledap/lesson/index",
            params: GetParams(),
        },
    }),
    model: ledap.App.getModel(data.model),
    isLoading: false,
    modalConfig:{
        show:false,
        type:"view",
    },
    columns : [
        'id',
        'name',
        'status',
        'attr',
        'creationTime',
        //'updateTime',
        {
            'label' : '操作',
            'value' : function(model) {
                return `<div class="btn-group">
                    <a class="btn btn-primary text-white" @click="vm.view(model)" >查看</a>
                    <a class="btn btn-warning text-white" @click="vm.update(model)">编辑</a>
                    <a class="btn btn-danger text-white" @click="vm.remove(model)">删除</a></div>`; 
            },
            'format' : 'html',
        }
    ],
    detailColumns : [
        'id',
        'name',
        'status',
        'attr',
        'creationTime',
        //'updateTime',
    ],
    
  },
  created: function(){
    this.dp.isLoading = true;
    this.dp.refresh("");
  },
  methods : {
    refresh(){
        this.dp.refresh("");
    },
    remove(model){
        if(confirm("你确定要删除该数据")) {
            ledap.App.request({
                url: "/ledap/lesson/delete?id=" + model.id,
                method: 'POST',
            }, () =>{
                this.dp.remove(model);
            })
        }
    },
    create() {
        this.model = ledap.App.getModel(data.model);
        this.modalConfig = {
            show: true,
            type: "create",
        };
    },
    update(model){
        this.getRemoteModel(model);
        this.modalConfig = {
            show: true,
            type: "update",
        };
    },
    view(model) {
        this.getRemoteModel(model);
        this.modalConfig = {
            show:true,
            type: "view",
        };
    },
    //如果与table字段一致，可以直接this.model = model;
    getRemoteModel(model){
        this.isLoading = true;
        let url = '/ledap/lesson/view?id='+model.id;
        ledap.App.request({
            url: url,
            method: 'GET',
        }, (data) =>{
            this.isLoading = false;
            this.model = ledap.App.getModel(data.model).load(data.data);
        }, (data) => {
            this.isLoading = false;
            this.$toast(data.message, {variant:'danger'});
        });
    },
    submit() {
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
        let url = this.type === "create" ? '/ledap/lesson/create' : '/ledap/lesson/update?id='+this.model.id;
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
                this.modalConfig.show = false;
                this.refresh();
            }
        }, (data)=>{
            this.isLoading = false;
            this.$toast(data.message, {variant:'danger'});
        });
    }
  }
});

