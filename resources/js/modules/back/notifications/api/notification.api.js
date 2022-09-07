import {SET_IS_READY, SET_NOTIFICATIONS} from "../store/mutation-types";
import {SET_USER_NOTIFICATION} from "../../../../core/store/all/mutation-types";

async function userNotifications() {
    await ApiService.get('profile/notifications', (response) => {
        if (response.status === 200) {
            StoreService.commit('notifications', SET_NOTIFICATIONS, response.data.data)
            StoreService.commit('all', SET_USER_NOTIFICATION, response.data.data)
            StoreService.commit('notifications', SET_IS_READY, true)
        } else
            MessageHandler.setMessage(null, true)
    }, (error) => {
        MessageHandler.parseError(error);
    }, true)
}

export default {userNotifications}
