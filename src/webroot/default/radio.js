ledap.App.register(['form-item', 'groupinput', 'radio'], Vue);
var app = new Vue({
    el: '#app',
    data: {
        model: ledap.App.getModel({
            sex: ''
        }),
        p: {}
    },
    created: function() {
        // data 也可以是后端接口返回
        var data = {
            sex: {
                label: '性别',
                rules: [{
                    type: 'dict',
                    options: {
                        list: {
                            '1': '男',
                            '2': '女',
                        },
                        multiple: false,
                        excludes: [],
                        message: '性别不正确',
                        skipOnEmpty: 1
                    }
                }, {
                    type: 'required',
                    options: {
                        message: '请选择性别'
                    }
                }],
                'value': []
            }
        };
        this.model.load(data);
    },
    methods: {
        submit: function() {
            this.model.validate();
            if (this.model.hasErrors()) return;
            alert('提交的数据是：' + JSON.stringify(this.model));
        }
    }
});