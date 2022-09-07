import registerModule from "./RegisterModule";
import {IS_AUTH} from "../../../core/services/data/storage-types";

const routes = {
    path: 'register',
    component: registerModule,
    name: 'register',
    beforeEnter(to, from, next) {
        if (window.StorageService.get(IS_AUTH) === "true")
            window.router.push({name: 'panel'});
        else
            next()
    }
}

export default routes
