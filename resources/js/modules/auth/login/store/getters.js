import * as types from "./mutation-types"

export const getters = {
    [types.GET_NEED_2FA](state) {
        return state.needTwoFactorAuthentication
    },
    [types.GET_LOGIN_DATA](state) {
        return state.loginData
    }
}
