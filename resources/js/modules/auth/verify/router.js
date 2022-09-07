import verifyModule from "./VerifyModule";
import {IS_AUTH} from "../../../core/services/data/storage-types";

const routes = {
    path: 'verify',
    component: verifyModule,
    name: 'verify',
    beforeEnter(to, from, next) {
        if (window.StorageService.get(IS_AUTH) === "true")
            if (window.store.state.all.user !== null) {
                if (window.store.state.all.user.phone_number_verified_at !== null)
                    window.router.push({name: 'panel'});
                else
                    next()
            } else
                window.router.push({name: 'login'});
        else
            window.router.push({name: 'login'});
    }
}

export default routes
