import {SET_IS_AUTH, SET_USER} from "../../../../core/store/all/mutation-types";
import {IS_AUTH} from "../../../../core/services/data/storage-types";

async function verify(data) {
    await ApiService.post('twoFactorAuthentication/check', data, (response) => {
        if (response.status === 200) {
            StoreService.commit('all', SET_USER, response.data.data)
            StoreService.commit('all', SET_IS_AUTH, true)
            StorageService.save(IS_AUTH, true)

            window.router.push({name: 'dashboard'})
        }else
            MessageHandler.setMessage(null, true)
    }, (error) => {
        MessageHandler.parseError(error)
    }, true)
}

async function resend(data) {
    await ApiService.post('twoFactorAuthentication/resend', data,(response) => {
        if (response.status === 202)
            MessageHandler.setMessage(t('AUTH.VERIFY.RESEND_SUCCESS', {}, {locale:lang}), false, 'success')
        else
            MessageHandler.setMessage(null, true)
    }, (error) => {
        MessageHandler.parseError(error)
    }, true)
}

export default {verify, resend}
