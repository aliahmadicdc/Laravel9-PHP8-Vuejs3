import {SET_OPTIONS, SET_USER} from "../../../../core/store/all/mutation-types"
import {SET_IS_READY} from "../store/mutation-types"

async function userInfo() {
    await ApiService.get('profile/userInfo', (response) => {
        if (response.status === 200) {
            StoreService.commit('all',SET_USER,response.data.data.user)
            StoreService.commit('all',SET_OPTIONS,response.data.data.options)
            StoreService.commit('dashboard',SET_IS_READY,true)
        } else
            MessageHandler.setMessage(null, true)
    }, (error) => {
        MessageHandler.parseError(error);
    }, true)
}

export default {userInfo}
