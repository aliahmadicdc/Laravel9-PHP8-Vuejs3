import * as types from "./mutation-types"

export const mutations = {
    [types.SET_IS_READY](state, isReady) {
        state.isReady = isReady
    },
    [types.SET_NOTIFICATIONS](state, notifications) {
        state.notifications = notifications
    },
}
