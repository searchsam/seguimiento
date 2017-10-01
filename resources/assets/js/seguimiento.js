window.addEventListener('load', function () {

    new Vue({
        el: '#interruptor',
        data: {
            checkValue: 0
        },
        methods: {
            checkToggle: function() {
                this.checkValue==0 ? 1 : 0;
            }
        }
    });

    new Vue({
        el: '#user-foto',
        data: {
            image: $('#default').val() || ''
        },
        methods: {
            onFileChange(e) {
                var files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
            },
            createImage(file) {
                var image = new Image();
                var reader = new FileReader();
                var vm = this;

                reader.onload = (e) => {
                    vm.image = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        }
    });

    Vue.component('estudio-row', {
        template: '#estudio-row'
    });

    new Vue({
        el: '#estudio-form',
        data: {
            range: 0
        },
        methods: {
            addEstudioform: function() {

                this.range += 1;
            }
        }
    });

});
