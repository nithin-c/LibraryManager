const router = new VueRouter();

router.map({
    '/': {
        name: 'index',
        component: require('./components/Index.vue')
    },
    '/login': {
        name: 'login',
        component: require('./components/Login.vue')
    },
    '/create': {
        name: 'create',
        component: require('./components/Create.vue')
    },
    '/show/:studentId': {
        name: 'show',
        component: require('./components/Show.vue')
    },
    '/edit/:studentId': {
        name: 'edit',
        component: require('./components/Edit.vue')
    },
});

var App = Vue.extend({});

router.start(App, '#app');