import {IS_AUTH} from "../../../../core/services/data/storage-types"
import {SET_IS_AUTH, SET_USER} from "../../../../core/store/all/mutation-types";
import {SET_NEED_2FA} from "../store/mutation-types";

async function login(data) {
    await ApiService.post('login', data, (response) => {
        if (response.status === 204) {
            StoreService.commit('login', SET_NEED_2FA, true)
        } else if (response.status === 200) {
            StoreService.commit('all', SET_USER, response.data.data)
            StoreService.commit('all', SET_IS_AUTH, true)
            StorageService.save(IS_AUTH, true)

            if (response.data.data.phone_number_verified_at !== null)
                router.push({name: 'dashboard'})
            else
                router.push({name: 'verify'})
        } else
            MessageHandler.setMessage(null, true)
    }, (error) => {
        MessageHandler.parseError(error)
    }, true)
}

export default {login}
