ledap.App.register(["form-item"], Vue);

var app = new Vue({
    el: "#app",
    data: {
        model: ledap.App.getModel({
            name: '',
            introduce: ''
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
                name: {
                    label: '姓名',
                    hint: '请输入姓名',
                    value: '',
                    rules: [{
                        type: 'string',
                        options: {
                            max: 5,
                            message: '姓名必须是一条字符串。',
                            skipOnEmpty: 1,
                            tooLong: '姓名只能包含至多5个字符。'
                        }
                    }, {
                        type: 'required',
                        options: {
                            message: '请填写姓名'
                        }
                    }]
                },
                introduce: {
                    label: '简介',
                    hint: '请输入简介',
                    value: '',
                    rules: [{
                        type: 'string',
                        options: {
                            max: 200,
                            message: '姓名必须是一条字符串。',
                            skipOnEmpty: 1,
                            tooLong: '姓名只能包含至多200个字符。'
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
                params: { id: 11 }
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