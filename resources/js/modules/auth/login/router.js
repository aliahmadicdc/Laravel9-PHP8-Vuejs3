import loginModule from "./LoginModule";
import {IS_AUTH} from "../../../core/services/data/storage-types";

const routes = {
    path: 'login',
    component: loginModule,
    name: 'login',
    beforeEnter(to, from, next) {
        if (window.StorageService.get(IS_AUTH) === "true")
            window.router.push({name: 'panel'});
        else
            next()
    }
}

export default routes
