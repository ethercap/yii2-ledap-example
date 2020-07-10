ledap.App.register(['grid', 'pager'], Vue);

var app = new Vue({
    el: '#app',
    data: {
        asc: true,
        dp: ledap.App.getWebDp({
            httpOptions: {
                url: '/ledap/lesson/search',
                params: {
                    'per-page': 5
                }
            }
        }),
        columns: [{
            attribute: 'id',
            labelFormat: 'html',
            "label": function(model, attribute) {
                // 使用 vm 指向本页面实例
                return '<div @click="vm.toggle">ID<span>{{vm.asc ? "^" : "v"}}</span></div>';
            },
            labelOptions: {
                style: { color: 'green' }
            }
        }, {
            attribute: 'text',
            label: '名称'
        }],
        document: ''
    },
    created: function() {
        this.dp.refresh();
        this.getDocument();
    },
    methods: {
        getDocument: function() {
            var _this = this;
            ledap.App.request({
                url: '/ledap/document/view',
                params: { id: 19 }
            }, function(data) {
                var model = ledap.App.getModel(data.data);
                _this.document = MavonEditor.markdownIt.render(model.content);
            });
        },
        toggle: function() {
            this.asc = !this.asc;
            this.dp.sortModels("id", this.asc);
        },
    }
});