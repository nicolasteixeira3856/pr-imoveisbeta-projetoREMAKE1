import Home from './Home.vue';

Vue.use(BootstrapVue);

export default new Vue({
    render: h => h(Home),
}).$mount('#vue-content-home');
