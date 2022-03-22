import * as types from "./mutation-types"

export const getters = {
    [types.GET_IS_LOADING](state) {
        return state.isLoading
    },
    [types.GET_LANG](state) {
        return state.lang
    },
    [types.GET_MESSAGES](state) {
        return state.messages
    },
    [types.GET_USER](state) {
        return state.user
    },
    [types.GET_IS_AUTH](state) {
        return state.isAuth
    },
}
