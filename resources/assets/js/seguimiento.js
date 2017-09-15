
var check = new Vue({
    el: '#interruptor',
    data: {
        checkValue:0,
        checkToggle
    },
    methods: {
        checkToggle: function() {
            this.checkValue==0 ? 1 : 0
        }
    }
})
