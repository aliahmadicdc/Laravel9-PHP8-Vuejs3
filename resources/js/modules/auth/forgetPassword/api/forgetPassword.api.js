async function request(data) {
    await ApiService.post('password/email', data, (response) => {
        if (response.status === 200)
            MessageHandler.setMessage(window.t('AUTH.FORGOT.SUCCESS', {}, {locale: window.lang}), false, 'success')
        else if (response.status === 429)
            MessageHandler.setMessage(window.t('AUTH.FORGOT.TOO_REQUEST', {}, {locale: window.lang}), false, 'warning')
        else
            MessageHandler.setMessage(null, true)
    }, (error) => {
        if (error.response.status === 429)
            MessageHandler.setMessage(window.t('AUTH.FORGOT.TOO_REQUEST', {}, {locale: window.lang}), false, 'warning')
        else
            MessageHandler.parseError(error)
    })
}

export default {request}
