ledap.App.register(['detail', 'form-item', 'dropdown'], Vue);
Vue.use(MavonEditor);
const app = new Vue({
  el: "#app",
  data : {
    model: ledap.App.getModel(data.model),
    type : data.type,
    isLoading : false,
    value: "",
  },
  created: function(){
    let params = GetParams();
    if(params.id){
        sideBarApp.selected = sideBarApp.selected + params.id;
    }
    setTimeout(()=>{
        this.value = MavonEditor.markdownIt.render(this.model.content);
    }, 500);
  },
  methods: {
    submit : function(){
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
        let url = this.type === "create" ? '/ledap/document/create' : '/ledap/document/update?id='+this.model.id;
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
                if(this.type == "create") {
                    this.type = "update";
                }
            }
        }, (data)=>{
            this.isLoading = false;
            this.$toast(data.message, {variant:'danger'});
        });
    },
    $imgAdd(pos, $file){
        alert(pos);
        var formdata = new FormData();
        formdata.append('file', $file);
        ledap.App.request({
            url: "/ledap/document/upload",
            method: 'post',
            data: formdata,
            headers: { 'Content-Type': 'multipart/form-data' },
        }, (res)=>{
            this.$refs.md.$img2Url(pos, res.data.url); 
        })
    },
  },
});
