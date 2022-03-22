import {SET_MESSAGE} from "../store/all/mutation-types"
import logoutApi from "./../../modules/auth/logout/api/logout.api"

const messageHandler = {
    parseError(error = null, lang = window.lang, t = window.t) {
        if (error.response.status === 401) {
            logoutApi.logout()
        } else {
            try {
                const data = error.response.data
                let errors = ''

                for (let item in data.errors) {
                    errors += '<div>' + data.errors[item] + '</div>'
                }

                if (errors === '')
                    errors = t('AUTH.VALIDATION.CONNECTION_ERROR', {}, {locale: lang})

                StoreService.commit('all', SET_MESSAGE, [errors, 'danger'])
            } catch (err) {
                if (error.response.data.message !== undefined)
                    StoreService.commit('all', SET_MESSAGE, [error.response.data.message, 'danger'])
                else
                    StoreService.commit('all', SET_MESSAGE, [t('AUTH.VALIDATION.CONNECTION_ERROR', {}, {locale: lang}), 'danger'])
            }
        }
    },
    setMessage(message, autoMessage = false, messageMode = 'danger', store = window.store, lang = window.lang, t = window.t) {
        if (autoMessage)
            StoreService.commit('all', SET_MESSAGE, [t('AUTH.VALIDATION.CONNECTION_ERROR', {}, {locale: lang}), messageMode])
        else
            StoreService.commit('all', SET_MESSAGE, [message, messageMode])
    }
}

window.MessageHandler = messageHandler

export default messageHandler
