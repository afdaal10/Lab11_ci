const { createApp } = Vue;
const { createRouter, createWebHashHistory } = VueRouter;

const apiUrl = 'http://localhost:8080';

// Definisikan routes dengan meta auth
const routes = [
    { path: '/', component: Home },
    { path: '/login', component: Login },
    {
        path: '/artikel',
        component: Artikel,
        meta: { requiresAuth: true }
    },
    {
        path: '/about',
        component: About,
        meta: { requiresAuth: true }
    }
];

const router = createRouter({
    history: createWebHashHistory(),
    routes
});

// Navigation Guards
router.beforeEach((to, from, next) => {
    const isAuthenticated = localStorage.getItem('isLoggedIn') === 'true';

    if (to.matched.some(record => record.meta.requiresAuth) && !isAuthenticated) {
        alert('Akses Ditolak! Anda harus login terlebih dahulu.');
        next('/login');
    } else {
        next();
    }
});

// Root Vue Instance
const app = createApp({
    data() {
        return {
            isLoggedIn: false,
            username: ''
        }
    },
    mounted() {
        this.isLoggedIn = localStorage.getItem('isLoggedIn') === 'true';
        this.username   = localStorage.getItem('username') ?? '';
    },
    methods: {
        logout() {
            if (confirm('Apakah Anda yakin ingin keluar aplikasi?')) {
                localStorage.removeItem('isLoggedIn');
                localStorage.removeItem('userToken');
                localStorage.removeItem('username');
                this.isLoggedIn = false;
                this.$router.push('/');
            }
        }
    }
});

app.use(router);
app.mount('#app');