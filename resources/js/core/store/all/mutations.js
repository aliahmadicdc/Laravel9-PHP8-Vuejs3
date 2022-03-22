import * as types from "./mutation-types"

export const mutations = {
    [types.SET_IS_LOADING](state, isLoading) {
        state.isLoading = isLoading
    },
    [types.SET_LANG](state, lang) {
        state.lang = lang
    },
    [types.SET_MESSAGE](state, [message, mode]) {
        state.messages.push(message)

        if (mode === 'success')
            state.messageMode = 'alert-success'
        else if (mode === 'warning')
            state.messageMode = 'alert-warning'
        else
            state.messageMode = 'alert-danger'
    },
    [types.CLEAR_MESSAGES](state) {
        state.messages = []
        state.messageMode = ''
    },
    [types.SET_USER](state, user) {
        state.user = user
    },
    [types.SET_IS_AUTH](state, isAuth) {
        state.isAuth = isAuth
    },
    [types.CLEAR_USER](state) {
        state.user = null
    },
}
