require('./bootstrap');



import { createApp }  from 'vue';
import App from './components/App.vue'
import router from './router';
import store from './store';
import Notification from './helpers/Notification.js';  

// Importing notification class
window.Notification=Notification
// window.location.reload = createApp(App)
// window.Reload=    Vue.createApp({});
// var Vue = require('vue')
//  window.reload=  createApp(App);
// const app = createApp(App);
// app.config.globalProperties.$reload=  createApp({}); 
axios.defaults.withCredentials = true;

store.dispatch('getUser').then(()=>{
    createApp(App)
        .use(router)
        .use(store) 
        .mount("#app");
})

