import {SET_USER} from "../../../../core/store/all/mutation-types";

async function saveProfileImage(data) {
    const config = {
        headers: {
            'content-type': 'multipart/form-data'
        }
    }

    await ApiService.post('profile/updateProfileImage', data, (response) => {
        if (response.status === 200) {
            StoreService.commit('all', SET_USER, response.data.data)
            MessageHandler.setMessage(t('HTTP.SUCCESS_UPDATE', {}, {locale: lang}), false, 'success')
        } else
            MessageHandler.setMessage(null, true)
    }, (error) => {
        MessageHandler.parseError(error)
    }, true, config)
}

async function deleteProfileImage() {
    await ApiService.get('profile/deleteProfileImage', (response) => {
        if (response.status === 200) {
            StoreService.commit('all', SET_USER, response.data.data)
            MessageHandler.setMessage(t('HTTP.SUCCESS_UPDATE', {}, {locale: lang}), false, 'success')
        } else
            MessageHandler.setMessage(null, true)
    }, (error) => {
        MessageHandler.parseError(error)
    }, true)
}

export default {saveProfileImage,deleteProfileImage}
