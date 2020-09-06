/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');



window.Vue = require('vue');

window.addEventListener('onload', function () {
    VanillaTilt.init(document.querySelector('#pic'))
})

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('follow-button', require('./components/FollowButton.vue').default);
Vue.component('like-button', require('./components/LikeButton.vue').default);
Vue.component('post-image', require('./components/PostImage.vue').default);
Vue.component('post-create-button', require('./components/PostCreateButton.vue').default);
Vue.component('cctv-button', require('./components/CCTVButton.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//search bar
$(document).ready(function() {
    $('.search').click(function() {
        $('.search').addClass('activated');
        $('.line-1').css({
            'transform': 'rotate(45deg)',
            'top': '0px',
            'left': '0px'
        });
        $('.line-2').css({
            'height':'40px',
            'opacity':'1'
        });
    });
    $('.line-1, .line-2').click(function() {
        $('.search').removeClass('activated').val('');
        $('.line-1').css({
            'transform': 'rotate(-45deg)',
            'top': '-20px',
            'left': '34px'
        });
        $('.line-2').css({
            'height':'0px',
            'opacity':'0'
        });

    });
});



const app = new Vue({
    el: '#app',
});
