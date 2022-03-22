import * as types from "./mutation-types"

export const actions = {
    [types.SET_IS_LOADING]({state, commit, rootState}, isLoading) {
        commit([types.SET_IS_LOADING], isLoading)
    },
    [types.SET_LANG]({commit}, lang) {
        commit([types.SET_LANG], lang)
    },
    [types.SET_MESSAGE]({commit}, message, mode) {
        commit([types.SET_MESSAGE], message, mode)
    },
    [types.CLEAR_MESSAGES]({commit}) {
        commit([types.CLEAR_MESSAGES])
    },
    [types.SET_USER]({commit}, user) {
        commit([types.SET_USER], user)
    },
    [types.SET_IS_AUTH]({commit}, isAuth) {
        commit([types.SET_IS_AUTH], isAuth)
    },
    [types.CLEAR_USER]({commit}) {
        commit([types.CLEAR_USER])
    },
}
