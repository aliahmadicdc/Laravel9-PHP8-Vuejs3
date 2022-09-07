import {createRouter, createWebHistory} from "vue-router"
import PanelModule from "../../modules/back/PanelModule"
import FrontModule from "../../modules/front/FrontModule"
import authModule from "../../modules/auth/AuthModule"
import NotFoundModule from "../../modules/back/404/404Module"

import {forgotPasswordRoutes} from "./../../modules/auth/forgetPassword/index"
import {loginRoutes} from "./../../modules/auth/login/index"
import {registerRoutes} from "./../../modules/auth/register/index"
import {verifyRoutes} from "./../../modules/auth/verify/index"
import {passwordResetRoutes} from "./../../modules/auth/passwordReset/index"

import {IS_AUTH} from "../services/data/storage-types";

let context = require.context('../../modules/back', true, /router.js/);
const dynamicPanelRoutes = []

context.keys().forEach((file) => {
    const storeConfig = context(file);
    const obj = storeConfig.default;

    dynamicPanelRoutes.push(obj)
});

context = require.context('../../modules/front', true, /router.js/);
const dynamicFrontRoutes = []

context.keys().forEach((file) => {
    const storeConfig = context(file);
    const obj = storeConfig.default;

    dynamicFrontRoutes.push(obj)
});

const routes = [
    {
        path: '/panel', component: PanelModule, name: 'panel',
        redirect: {name: 'dashboard'},
        children: dynamicPanelRoutes,
        beforeEnter(to, from, next) {
            if (to.path !== '/auth/login' && window.StorageService.get(IS_AUTH) === "false")
                window.router.push({name: 'login'});
            else
                next()
        }
    },
    {
        path: '', component: FrontModule, name: 'front',
        children: dynamicFrontRoutes,
    },
    {
        path: '/auth', component: authModule, name: 'auth',
        children: [
            {path: '/:pathMatch(.*)*', name: 'NotFound', component: NotFoundModule},
            loginRoutes,
            registerRoutes,
            forgotPasswordRoutes,
            passwordResetRoutes,
            verifyRoutes,
        ]
    },
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router
