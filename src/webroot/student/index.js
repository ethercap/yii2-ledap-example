ledap.App.register(["form-item", "group", "tab", 'grid', 'pager'], Vue);
const app = new Vue({
  el: "#app",
  data : {
    dp : ledap.App.getWebDp({
        httpOptions:{
            url: "/ledap/student/index",
            params: GetParams(),
        }
    }),
    //此处的规则基本与GridView一致，详细参见文档。本处尽量给一个比较详细的各种情况的示例，实际不用这么复杂
    columns : [
        {
            attribute:'id',
            label: 'ID',
            useSort:true,
        },
        {
            attribute : 'name',
            label: '姓名',
            value : function(model){
                return model.name;
            },
            //加上这个后，点击标题可以排序,需要后端支持
            useSort: true,
            width: '10%',
        },
        {
            attribute : 'mobile',
            //有时候我们希望改掉label,默认为raw,如果需要html，请设置labelFormat
            label : function(model){
                //需要引用当前app时，用vm指代。
                return '<span @click="vm.sort(\'mobile\')">手机号</span>';
            },
            labelFormat: 'html'
        },
        {
            label: "性别",
            value: function(model) {
                return model.genderDesc;
            },
        },
        {
            label: "添加时间",
            attribute :  'creationTime',
        },
        {
            'label' : '操作',
            'value' : function(model) {
                return `<div class="btn-group">
                    <a class="btn btn-primary text-white" href="/ledap/student/view?id=`+ model.id +`">查看</a>
                    <a class="btn btn-warning text-white" href="/ledap/student/view?id=`+ model.id +`&type=update">编辑</a>
                    <a class="btn btn-danger text-white" @click="vm.remove(model)">删除</a></div>`; 
            },
            'format' : 'html',
        }
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
                url: "/ledap/student/delete?id=" + model.id,
                method: 'POST',
            }, () =>{
                this.dp.remove(model);
            })
        }
    },
    sort(attr){
        this.dp.sort = attr;
        this.dp.refresh();
    }
  }
});

