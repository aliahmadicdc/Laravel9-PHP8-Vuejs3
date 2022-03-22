import axios from "axios"
import {CLEAR_MESSAGES, SET_IS_LOADING} from "../store/all/mutation-types"

const apiPrefix = 'api/v1/'

const ApiCall = axios.create({
    baseURL: 'http://laravel9.code/',
    withCredentials: true,
    header: {
        Accept: 'application/json',
        'Content-Type': 'application/json',
    }
})

const ApiService = {
    start() {
        StoreService.commit('all',SET_IS_LOADING,true)
        StoreService.commit('all',CLEAR_MESSAGES)
    },
    end() {
        StoreService.commit('all',SET_IS_LOADING,false)
    },
    createUrl(url, isApiRequest) {
        if (isApiRequest)
            return apiPrefix + url
        else
            return url
    },
    async post(url, data, onSuccess, onError, isApiRequest = false) {
        this.start()
        try {
            ApiCall.post(this.createUrl(url,isApiRequest), data).then(response => {
                onSuccess(response)
            }).catch(error => {
                onError(error)
            })
        } catch (error) {
            onError(error)
        }
        this.end()
    },
    async get(url, onSuccess, onError, isApiRequest = false) {
        this.start()
        try {
            ApiCall.get(this.createUrl(url,isApiRequest)).then(response => {
                onSuccess(response)
            }).catch(error => {
                onError(error)
            })
        } catch (error) {
            onError(error)
        }
        this.end()
    },
    async put(url, data, onSuccess, onError, isApiRequest = false) {
        this.start()
        try {
            ApiCall.put(this.createUrl(url,isApiRequest), data).then(response => {
                onSuccess(response)
            }).catch(error => {
                onError(error)
            })
        } catch (error) {
            onError(error)
        }
        this.end()
    },
    async delete(url, onSuccess, onError, isApiRequest = false) {
        this.start()
        try {
            ApiCall.delete(this.createUrl(url,isApiRequest)).then(response => {
                onSuccess(response)
            }).catch(error => {
                onError(error)
            })
        } catch (error) {
            onError(error)
        }
        this.end()
    }
}

window.ApiService = ApiService

export default ApiService
