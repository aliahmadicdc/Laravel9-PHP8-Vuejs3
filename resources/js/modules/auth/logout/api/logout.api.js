import {CLEAR_USER, SET_IS_AUTH} from "../../../../core/store/all/mutation-types"
import {IS_AUTH} from "../../../../core/services/data/storage-types"
import {SET_NEED_2FA} from "../../login/store/mutation-types";

async function logout() {
    await ApiService.post('logout', null, (response) => {
        if (response.status === 204) {
            StorageService.save(IS_AUTH, false)
            StoreService.commit('all', CLEAR_USER)
            StoreService.commit('all', SET_IS_AUTH, false)
            StoreService.commit('login', SET_NEED_2FA, false)

            window.router.push({name: 'login'})
        } else
            MessageHandler.setMessage(null, true)
    }, (error) => {
        if (error.response.status === 401) {
            StorageService.save(IS_AUTH, false)
            StoreService.commit('all', CLEAR_USER)
            StoreService.commit('all', SET_IS_AUTH, false)

            window.router.push({name: 'login'})
        } else
            MessageHandler.parseError(error)
    }, true)
}

export default {logout}
