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
        }]
    },
    created: function() {
        this.dp.refresh();
    },
    methods: {
        toggle: function() {
            this.asc = !this.asc;
            this.dp.sortModels("id", this.asc);
        },
    }
});