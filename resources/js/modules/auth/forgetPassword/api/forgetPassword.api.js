async function request(data) {
    await ApiService.post('password/request', data, (response) => {
        if (response.status === 200)
            MessageHandler.setMessage(t('AUTH.FORGOT.SUCCESS', {}, {locale: lang}), false, 'success')
        else
            MessageHandler.setMessage(null, true)
    }, (error) => {
        MessageHandler.parseError(error)
    }, true)
}

export default {request}
