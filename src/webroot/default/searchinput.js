ledap.App.register(['form-item', 'searchinput'], Vue);

var app = new Vue({
    el: "#app",
    data: {
        model: ledap.App.getModel({
            search: ''
        }),
        dp: ledap.App.getWebDp({
            httpOptions: {
                url: '/ledap/lesson/search'
            }
        }),
        document: ''
    },
    created: function() {
        this.getModel();
        this.getDocument();
    },
    methods: {
        getModel: function() {
            // data 也可以是后端接口返回
            var data = {
                search: {
                    label: '搜索',
                    hint: '请输入关键词',
                    value: '',
                    rules: [{
                        type: 'required',
                        options: {
                            message: '搜索不能为空'
                        }
                    }]
                }
            };
            this.model.load(data);
        },
        getDocument: function() {
            var _this = this;
            ledap.App.request({
                url: '/ledap/document/view',
                params: { id: 17 }
            }, function(data) {
                var model = ledap.App.getModel(data.data);
                _this.document = MavonEditor.markdownIt.render(model.content);
            });
        },
        choose: function(model, index, e) {
            console.log(model, index, e);
        },
        submit: function() {
            this.model.validate();
            if (this.model.hasErrors()) return;
            alert('提交的数据是：' + JSON.stringify(this.model));
        }
    }
});