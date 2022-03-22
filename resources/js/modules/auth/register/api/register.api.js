import {IS_AUTH, USER_PHONE_NUMBER} from "../../../../core/services/session-types"

async function register(data) {
    await ApiService.post('register', data, (response) => {
        if (response.status === 200) {
            SessionService.save(IS_AUTH, true)
            SessionService.save(USER_PHONE_NUMBER, data.phone_number)
            window.location.href = '/panel/verify'
        } else
            MessageHandler.setMessage(null, true)
    }, (error) => {
        MessageHandler.parseError(error)
    })
}

export default {register}
