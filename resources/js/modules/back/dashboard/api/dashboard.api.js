import {SET_USER} from "../../../../core/store/all/mutation-types"
import {SET_IS_READY} from "../store/mutation-types"

async function userInfo() {
    await ApiService.get('userInfo', (response) => {
        if (response.status === 200) {
            window.store.commit(`all/${SET_USER}`, response.data.data)
            window.store.commit(`dashboard/${SET_IS_READY}`, true)
        } else
            MessageHandler.setMessage(null, true)
    }, (error) => {
        MessageHandler.parseError(error);
    }, true)
}

export default {userInfo}
