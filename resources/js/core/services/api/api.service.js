import axios from "axios"
import {CLEAR_MESSAGES, SET_IS_LOADING} from "../../store/all/mutation-types"

const apiPrefix = 'api/v1/'

const ApiCall = axios.create({
    baseURL: 'your base url',
    withCredentials: true,
    header: {
        Accept: 'application/json',
        'Content-Type': 'application/json',
    }
})

const ApiService = {
    start() {
        StoreService.commit('all', SET_IS_LOADING, true)
        StoreService.commit('all', CLEAR_MESSAGES)
    },
    end() {
        StoreService.commit('all', SET_IS_LOADING, false)
    },
    createUrl(url, isApiRequest) {
        if (isApiRequest)
            return apiPrefix + url
        else
            return url
    },
    async post(url, data, onSuccess, onError, isApiRequest = false, config = null, useGlobalLoading = true) {
        if (useGlobalLoading)
            this.start()

        if (window.store.state.all.recaptchaResponse != null)
            data['recaptchaResponse'] = window.store.state.all.recaptchaResponse

        ApiCall.post(this.createUrl(url, isApiRequest), data, config).then(response => {
            if (useGlobalLoading)
                this.end()
            onSuccess(response)
        }).catch(error => {
            if (useGlobalLoading)
                this.end()
            onError(error)
        })
    },
    async get(url, onSuccess, onError, isApiRequest = false, config = null, useGlobalLoading = true) {
        if (useGlobalLoading)
            this.start()

        ApiCall.get(this.createUrl(url, isApiRequest), config).then(response => {
            if (useGlobalLoading)
                this.end()
            onSuccess(response)
        }).catch(error => {
            if (useGlobalLoading)
                this.end()
            onError(error)
        })
    },
    async put(url, data, onSuccess, onError, isApiRequest = false, config = null, useGlobalLoading = true) {
        if (useGlobalLoading)
            this.start()

        ApiCall.put(this.createUrl(url, isApiRequest), data, config).then(response => {
            if (useGlobalLoading)
                this.end()
            onSuccess(response)
        }).catch(error => {
            if (useGlobalLoading)
                this.end()
            onError(error)
        })
    },
    async delete(url, onSuccess, onError, isApiRequest = false, config = null, useGlobalLoading = true) {
        if (useGlobalLoading)
            this.start()

        ApiCall.delete(this.createUrl(url, isApiRequest), config).then(response => {
            if (useGlobalLoading)
                this.end()
            onSuccess(response)
        }).catch(error => {
            if (useGlobalLoading)
                this.end()
            onError(error)
        })
    }
}

window.ApiService = ApiService

export default ApiService
