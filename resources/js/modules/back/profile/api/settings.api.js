import {SET_USER} from "../../../../core/store/all/mutation-types";
import logoutApi from "../../../auth/logout/api/logout.api";

async function updateSettings(data) {
    await ApiService.post('profile/updateSettings', data, (response) => {
        if (response.status === 200) {
            StoreService.commit('all', SET_USER, response.data.data)
            MessageHandler.setMessage(t('HTTP.SUCCESS_UPDATE', {}, {locale: lang}), false, 'success')
        } else
            MessageHandler.setMessage(null, true)
    }, (error) => {
        MessageHandler.parseError(error)
    }, true)
}

async function disableAccount() {
    await ApiService.get('profile/disableAccount', (response) => {
        if (response.status === 200) {
            MessageHandler.setMessage(t('HTTP.SUCCESS_UPDATE', {}, {locale: lang}), false, 'success')
            logoutApi.logout()
        } else
            MessageHandler.setMessage(null, true)
    }, (error) => {
        if (error.response.status === 503)
            logoutApi.logout()
        else
            MessageHandler.parseError(error)
    }, true)
}

export {updateSettings, disableAccount}


