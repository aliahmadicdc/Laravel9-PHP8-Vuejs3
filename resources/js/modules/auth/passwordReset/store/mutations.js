import * as types from "./mutation-types"

export const mutations = {
    [types.SET_IS_READY](state, isReady) {
        state.isReady = isReady
    },
}
