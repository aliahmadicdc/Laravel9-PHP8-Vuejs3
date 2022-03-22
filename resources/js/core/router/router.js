import {createRouter, createWebHistory} from "vue-router"
import PanelModule from "../../modules/back/panel/PanelModule"
import NotFoundModule from "../../modules/back/404/404Module"

import {dashboardRoutes} from "./../../modules/back/dashboard/index"
import {notificationsRoutes} from "./../../modules/back/notifications/index"

const routes = [
    {
        path: '/panel', component: PanelModule, name: 'panel',
        children: [
            {path: '/:pathMatch(.*)*', name: 'NotFound', component: NotFoundModule},
            dashboardRoutes,
            notificationsRoutes
        ]
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes: routes
})

router.beforeEach((to, from, next) => {
    if (to.path !== '/login' && window.store.state.all.isAuth == false) window.location.href = '/login'
    else next()
})

export default router
