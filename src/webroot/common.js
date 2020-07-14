ledap.App.getTheme().addComponent({
    'name': 'dropdown1',
    template: '<select class="form-control" v-on="inputListeners" :name="attr">' +
        '<option v-for="key in dictOption.order" :value="key" :selected="key === model[attr]">{{dictOption.list[key]}}</option>' +
    '</select>',
}, 'dropdown');
Vue.mixin({
    updated: function() {
        if (window.watermark) {
            window.watermark.refresh();
        }
    }
});
const headerApp = new Vue({
    el: "#header",
    data: {
        alerts: {
            'num': '3+',
            'items': [
                { icon: 'fa-file-alt', date: 'December 12, 2019', variant: 'primary', title: 'A new monthly report is ready to download!', important: true, },
                { icon: 'fa-donate', date: 'December 7, 2019', variant: 'success', title: '$290.29 has been deposited into your account!', important: false, },
                { icon: 'fa-exclamation-triangle', date: 'December 2, 2019', variant: 'warning', title: "Spending Alert: We've noticed unusually high spending for your account.", important: false, },
            ],
        },
        msgs: {
            'num': '7',
            'items': [
                { img: 'https://source.unsplash.com/fn_BT9fwg_E/60x60', msg: "Hi there! I am wondering if you can help me with a problem I've been having.", user: 'Emily Fowler · 58m', variant: 'success', important: true },
                { img: 'https://source.unsplash.com/AU4VPcFN4LE/60x60', msg: "I have the photos that you ordered last month, how would you like them sent to you?", user: 'Jae Chun · 1d', variant: 'secondary', important: false },
                { img: 'https://source.unsplash.com/CS2uCrpNzJY/60x60', msg: "Last month's report looks great, I am very happy with the progress so far, keep up the good work!", user: 'Morgan Alvarez · 2d', variant: 'warning', important: false },
                { img: 'https://source.unsplash.com/Mv9hjnEUHR4/60x60', msg: "Last month's report looks great, I am very happy with the progress so far, keep up the good work!", user: 'Morgan Alvarez · 2d', variant: 'success', important: false },
            ],
        },
    },
    methods: {
        toggleSideBar: function() {
            sideBarApp.toggle();
        },
        logout: function(url) {
            this.$confirm("你确定要退出当前网站?", {
                variant: 'danger',
                okVariant: 'primary',
            }).then(function(val) {
                if (val) {
                    location.href = url;
                }
            });
        }
    },
});
const sideBarApp = new Vue({
    el: '#sidebar',
    data: {
        selected: '',
        isToggle: false,
        items: [],
    },
    created: function() {
        //从ls中取isToggle
        let isToggle = localStorage.getItem("isToggle")
        this.isToggle = isToggle === 'true' ? true : false;
        this.getItems();
        this.initSelected();
    },
    methods: {
        toggle: function() {
            this.isToggle = !this.isToggle;
            localStorage.setItem("isToggle", this.isToggle);
        },
        getItems: function() {
            ledap.App.request({ url: '/ledap/default/menu' }, function(res){
                this.items = res.data;
            }.bind(this));
        },
        initSelected: function() {
            let pathArr = location.pathname.split("/");
            let newArr = [];
            for (i = 0; i < pathArr.length; i++) {
                if (pathArr[i]) {
                    newArr.push(pathArr[i]);
                }
                if(i >=2) {
                    break;
                }
            }
            this.selected = newArr.join('-');
        },
        setSelected: function(val) {
            this.selected = val;
        }
    },
});
