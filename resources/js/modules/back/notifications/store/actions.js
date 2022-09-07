import * as types from "./mutation-types"

export const actions = {
    [types.SET_IS_READY]({commit}, isReady) {
        commit([types.SET_IS_READY], isReady)
    },
    [types.SET_NOTIFICATIONS]({commit}, notification) {
        commit([types.SET_NOTIFICATIONS], notification)
    },
}
