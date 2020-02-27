
require('./bootstrap');

window.Vue = require('vue');

// import Vue from 'vue'
import VueRouter from 'vue-router'
import VueAxios from 'vue-axios';
import axios from 'axios';

Vue.use(VueAxios, axios);
Vue.use(VueRouter)

import App from './components/App'
import Home from './components/Home'
import Login from './components/Login'
import Register from './components/Register'
import SingleProduct from './components/SingleProduct'
import Checkout from './components/Checkout'
import Confirmation from './components/Confirmation'
import OrdersList from './components/OrdersList'
import OrderView from './components/OrderView'



const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/login',
            name: 'login',
            component: Login
        },
        {
            path: '/register',
            name: 'register',
            component: Register
        },
        {
            path: '/products/:id',
            name: 'single-products',
            component: SingleProduct
        },
        {
            path: '/confirmation',
            name: 'confirmation',
            component: Confirmation
        },
        {
            path: '/checkout',
            name: 'checkout',
            component: Checkout,
            props: (route) => ({ pid: route.query.pid })
        },
        {
            path: '/orders',
            name: 'orders',
            component: OrdersList,
        },
        {
            path: '/view/orders/:orderId',
            name: 'OrderView',
            component: OrderView,
            props:true
        },
        // {
        //     path: '/dashboard',
        //     name: 'userboard',
        //     component: UserBoard,
        //     meta: {
        //         requiresAuth: true,
        //         is_user: true
        //     }
        // },
        // {
        //     path: '/admin/:page',
        //     name: 'admin-pages',
        //     component: Admin,
        //     meta: {
        //         requiresAuth: true,
        //         is_admin: true
        //     }
        // },
        // {
        //     path: '/admin',
        //     name: 'admin',
        //     component: Admin,
        //     meta: {
        //         requiresAuth: true,
        //         is_admin: true
        //     }
        // },
    ],
})

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (localStorage.getItem('code_challenge.jwt') == null) {
            next({
                path: '/login',
                params: { nextUrl: to.fullPath }
            })
        } else {
            let user = JSON.parse(localStorage.getItem('code_challenge.user'))
            if (to.matched.some(record => record.meta.is_admin)) {
                if (user.is_admin == 1) {
                    next()
                }
                else {
                    next({ name: 'home' })
                }
            }
            else if (to.matched.some(record => record.meta.is_user)) {
                if (user.is_admin == 0) {
                    next()
                }
                else {
                    next({ name: 'admin' })
                }
            }
            next()
        }
    } else {
        next()
    }
})

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);


// const app = new Vue({
//     el: '#app'
// });
