import Vue from "vue";
import VueRouter from "vue-router";
import PeopleComponent from './components/PeopleComponent'
import ShowComponent from "./components/ShowComponent";
import Login from "./components/Login";
import Registration from "./components/Registration";


Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            component: PeopleComponent,
            name: 'people',
        },
        {
            path: '/show/:id',
            component: ShowComponent,
            name: 'person.show',
        },
        {
            path: '/user/login',
            component: Login,
            name: 'user.login',
        },
        {
            path: '/user/registration',
            component: Registration,
            name: 'user.registration',
        },
    ]
})
router.beforeEach((to, from, next) => {
    const token = localStorage.getItem('x_xsrf_token')

    if (!token) {
        if (to.name === 'user.login' || to.name === 'user.registration') {
            return next()
        } else {
            return next({
                name: 'user.login'
            })
        }
    }

    if(to.name === 'user.login' || to.name === 'user.registration' && token){
        return next({
            name: 'people'
        })
    }

    next()
})

export default router

