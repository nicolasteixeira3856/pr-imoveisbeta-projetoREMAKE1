import LoginRegister from './LoginRegister.vue';

Vue.use(BootstrapVue);

export default new Vue({
    render: h => h(LoginRegister),
}).$mount('#vue-content-login-register');
