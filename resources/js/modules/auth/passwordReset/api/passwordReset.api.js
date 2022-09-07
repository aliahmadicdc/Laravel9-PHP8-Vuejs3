import {SET_IS_READY} from "../store/mutation-types";

async function reset(data) {
    await ApiService.post('password/reset', data, (response) => {
        if (response.status === 201) {
            MessageHandler.setMessage(t('AUTH.PASSWORD.SUCCESS', {}, {locale: lang}), false, 'success')

            router.push({name: 'login'})
        } else
            MessageHandler.setMessage(null, true)
    }, (error) => {
        MessageHandler.parseError(error)
    }, true)
}

async function confirm(data) {
    await ApiService.post('password/confirm', data, (response) => {
        if (response.status === 200)
            StoreService.commit('passwordReset', SET_IS_READY, true)
        else
            MessageHandler.setMessage(null, true)
    }, (error) => {
        if (error.response.status === 403) {
            MessageHandler.setMessage(t('AUTH.PASSWORD.EXPIRE_TOKEN', {}, {locale: lang}))

            router.push({name: 'login'})
        } else
            MessageHandler.parseError(error)
    }, true)
}

export default {reset, confirm}
