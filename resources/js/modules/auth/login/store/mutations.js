import * as types from "./mutation-types"

export const mutations = {
    [types.SET_NEED_2FA](state, need2FA) {
        if (need2FA === undefined) need2FA = false
        state.needTwoFactorAuthentication = need2FA
    },
    [types.SET_LOGIN_DATA](state, loginData) {
        state.loginData = loginData
    }
}
