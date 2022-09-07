import * as types from "./mutation-types"

export const getters = {
    [types.GET_IS_READY](state) {
        return state.isReady
    },
    [types.GET_NOTIFICATIONS](state) {
        return state.notifications
    },
}
