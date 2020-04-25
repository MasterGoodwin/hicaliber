require('./bootstrap');
import Vue from 'vue';
import axios from 'axios';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import App from './vue/App.vue';

Vue.use(ElementUI);

const app = new Vue({
    el: '#app',
    render: h => h(App),
});
