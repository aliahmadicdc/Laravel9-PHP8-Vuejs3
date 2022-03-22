import {CLEAR_USER, SET_IS_AUTH} from "../../../../core/store/all/mutation-types"
import { IS_AUTH } from "./../../../../core/services/session-types"

async function logout() {
    await ApiService.post('logout', null, (response) => {
        if (response.status === 204) {
            SessionService.save(IS_AUTH, false)
            StoreService.commit('all', CLEAR_USER)
            StoreService.commit('all', SET_IS_AUTH,false)

            window.location.href = '/login'
        } else
            MessageHandler.setMessage(null, true)
    }, (error) => {
        MessageHandler.parseError(error)
    })
}

export default {logout}
