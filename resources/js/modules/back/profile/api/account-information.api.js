import {SET_USER} from "../../../../core/store/all/mutation-types";

async function saveAccountInformation(data) {
    await ApiService.post('profile/updateAccountInformation', data, (response) => {
        if (response.status === 200) {
            StoreService.commit('all', SET_USER, response.data.data)
            MessageHandler.setMessage(t('HTTP.SUCCESS_UPDATE', {}, {locale: lang}), false, 'success')
        } else
            MessageHandler.setMessage(null, true)
    }, (error) => {
        MessageHandler.parseError(error)
    }, true)
}

async function sendEmailVerify() {
    await ApiService.get('profile/email/verify/send', (response) => {
        if (response.status === 202) {
            MessageHandler.setMessage(t('HTTP.SUCCESS_SEND', {}, {locale: lang}), false, 'success')
        } else
            MessageHandler.setMessage(null, true)
    }, (error) => {
        MessageHandler.parseError(error)
    }, true)
}

async function checkEmailVerify(data) {
    await ApiService.post('profile/email/verify/check', data,(response) => {
        if (response.status === 200) {
            StoreService.commit('all', SET_USER, response.data.data)
            MessageHandler.setMessage(t('HTTP.SUCCESS_VERIFY', {}, {locale: lang}), false, 'success')
        } else
            MessageHandler.setMessage(null, true)
    }, (error) => {
        MessageHandler.parseError(error)
    }, true)
}

export default {saveAccountInformation, sendEmailVerify,checkEmailVerify}
