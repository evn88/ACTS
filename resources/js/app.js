/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
// Vue.use(CKEditor)

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const admin = require.context('./', true, /\.vue$/i);
// console.log(admin.keys());
// console.log(admin.keys().map(function (e) {
//     console.log(e.split(['/']))
//     if(e.split('/').inArray(''))
//     console.log(e.split(['/']).pop().split('.')[0])
// }));
// admin.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('admin-staff-component', require('./components/admin/StaffComponent').default);
// Vue.component('admin-staff-modal-component', require('./components/modal/StaffModalComponent').default);
Vue.component('admin-add-test-component', require('./components/admin/AddTestComponent').default);

Vue.component('course-test-component', require('./components/course/TestComponent').default);

//Инициализация Bootstrap DateTimePicker
$(function () {
    $('.datetimepicker2').datetimepicker({
        locale: 'ru'
    });


    $('.chart').easyPieChart({
        size: 150,
        barColor: '#00adfa',
        scaleColor: false,
        lineWidth: 15,
        trackColor: 'white',
        lineCap: 'circle',
        animate: 2000,
    });

    $('.count').each(function () {
        // console.log($(this).text());
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        },{
            duration: 2000,
            easing: 'swing',
                step: function (now) {
                    // console.log(Math.ceil(now));
                $(this).text(Math.ceil(now)+'%');
            }
        });
    });

    $('#deleteConfirm').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var route = button.data('route'); // Extract info from data-* attributes
        var info = button.data('info'); // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this);
        $("#deleteForm").attr("action", route);
        if (info) {
            $("#confirmDeleteInfo").text(info);
        } else {
            $("#confirmDeleteInfo").remove();
        }
    });

});


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    data: {}
});



