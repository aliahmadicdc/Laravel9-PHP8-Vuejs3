async function verify(data) {
    await ApiService.post('panel/verify/check', data, (response) => {
        if (response.status === 204)
            window.location.href = '/panel/dashboard'
        else if (response.status === 401)
            MessageHandler.setMessage(window.t('AUTH.VERIFY.CODE_WRONG', {}, {locale: window.lang}))
        else
            MessageHandler.setMessage(null, true)
    }, (error) => {
        if (error.response.status === 401)
            MessageHandler.setMessage(window.t('AUTH.VERIFY.CODE_WRONG', {}, {locale: window.lang}))
        else
            MessageHandler.parseError(error)
    })
}

async function resend() {
    await ApiService.get('panel/verify/resend', (response) => {
        if (response.status === 202)
            MessageHandler.setMessage(window.t('AUTH.VERIFY.RESEND_SUCCESS', {}, {locale: window.lang}), false, 'success')
        else
            MessageHandler.setMessage(null, true)
    }, (error) => {
        MessageHandler.parseError(error)
    })
}

export default {verify, resend}
