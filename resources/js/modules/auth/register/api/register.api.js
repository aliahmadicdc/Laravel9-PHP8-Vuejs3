import {IS_AUTH} from "../../../../core/services/data/storage-types"
import {SET_IS_AUTH, SET_USER} from "../../../../core/store/all/mutation-types";

async function register(data) {
    await ApiService.post('register', data, (response) => {
        if (response.status === 200) {
            StoreService.commit('all', SET_USER, response.data.data)
            StoreService.commit('all', SET_IS_AUTH, true)
            StorageService.save(IS_AUTH, true)

            router.push({name: 'verify'})
        } else
            MessageHandler.setMessage(null, true)
    }, (error) => {
        MessageHandler.parseError(error)
    },true)
}

export default {register}
