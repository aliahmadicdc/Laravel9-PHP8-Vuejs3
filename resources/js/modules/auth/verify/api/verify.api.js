async function verify(data) {
    await ApiService.post('verify/check', data, (response) => {
        if (response.status === 200)
            router.push({name: 'dashboard'})
        else
            MessageHandler.setMessage(null, true)
    }, (error) => {
        MessageHandler.parseError(error)
    }, true)
}

async function resend() {
    await ApiService.get('verify/resend', (response) => {
        if (response.status === 202)
            MessageHandler.setMessage(t('AUTH.VERIFY.RESEND_SUCCESS', {}, {locale: lang}), false, 'success')
        else
            MessageHandler.setMessage(null, true)
    }, (error) => {
        MessageHandler.parseError(error)
    }, true)
}

export default {verify, resend}
