import * as types from "./mutation-types"

export const actions = {
    [types.SET_NEED_2FA]({commit}, need2FA) {
        commit([types.SET_NEED_2FA], need2FA)
    },
    [types.SET_LOGIN_DATA]({commit}, loginData) {
        commit([types.SET_LOGIN_DATA], loginData)
    },
}
