ledap.App.register(['form-item', 'groupinput', 'dropdown'], Vue);

var app = new Vue({
    el: '#app',
    data: {
        model: ledap.App.getModel({
            city: ''
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
                city: {
                    label: '城市',
                    rules: [{
                        type: 'dict',
                        options: {
                            list: {
                                '': '',
                                '上海': '上海',
                                '北京': '北京',
                                '杭州': '杭州',
                                '成都': '成都',
                                '武汉': '武汉',
                                '南京': '南京',
                                '厦门': '厦门',
                                '其他': '其他',
                            },
                            order: ['', '北京', '上海', '杭州', '成都', '武汉', '南京', '厦门', '其他'],
                            multiple: false,
                            excludes: [],
                            message: '城市的值不正确',
                            skipOnEmpty: 1
                        }
                    }, {
                        type: 'required',
                        options: {
                            message: '请选择城市'
                        }
                    }],
                    'value': ''
                }
            };
            this.model.load(data);
        },
        getDocument: function() {
            var _this = this;
            ledap.App.request({
                url: '/ledap/document/view',
                params: { id: 16 }
            }, function(data) {
                var model = ledap.App.getModel(data.data);
                _this.document = MavonEditor.markdownIt.render(model.content);
            });
        },
        submit: function() {
            this.model.validate();
            if (this.model.hasErrors()) return;
            alert('提交的数据是：' + JSON.stringify(this.model));
        }
    }
});