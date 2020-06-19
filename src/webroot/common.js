ledap.App.getTheme().addComponent({
    'name': 'dropdown1',
    template: `<select class="form-control" v-on="inputListeners" :name="attr">
        <option v-for="key in dictOption.order" :value="key" :selected="key === model[attr]">{{dictOption.list[key]}}</option>
    </select>`,
},'dropdown');
Vue.mixin({
  updated: function() {
    window.watermark.refresh();
  }
});
const headerApp = new Vue({
    el:"#header",
    methods:{
        toggleSideBar: function()
        {
            sideBarApp.toggle();
        },
        logout: function(url){
            this.$confirm("你确定要退出当前网站?", {
                  variant: 'danger',
                  okVariant: 'primary',
            }).then((val)=>{
                if(val) {
                    location.href=url;
                }
            });
        }
    },
});
const sideBarApp = new Vue({
    el:'#sidebar',
    data: {
        menu: '',
        isToggle: false,
        items : {
            " " : [
                {id: 'admin-default', title:'仪表盘', url:'/ledap/index', icon: 'fa-tachometer-alt'},
            ],
        },
    },
    created: function(){
        //从ls中取isToggle
        let isToggle = localStorage.getItem("isToggle")
        this.isToggle = isToggle === 'true' ? true : false;
        this.initMenu();
    },
    methods: {
        toggle:function(){
            this.isToggle = !this.isToggle;
            localStorage.setItem("isToggle", this.isToggle);
        },
        initMenu: function(){
            let pathArr = location.pathname.split("/");
            let newArr = [];
            for(i = 0; i<pathArr.length; i++) {
                if(pathArr[i]) {
                    newArr.push(pathArr[i]);
                }
            }
            newArr.pop();
            this.menu = newArr.join('-');
        },
        setMenu:function(val) {
            this.menu = val;
        }
    },
});
