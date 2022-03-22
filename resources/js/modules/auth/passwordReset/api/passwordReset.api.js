async function reset(data) {
    await ApiService.post('password/reset', data, (response) => {
        if (response.status === 201) {
            MessageHandler.setMessage(window.t('AUTH.PASSWORD.SUCCESS', {}, {locale: window.lang}))

            window.location.href = '/login'
        }else
            MessageHandler.setMessage(null, true)
    }, (error) => {
        MessageHandler.parseError(error)
    })
}

export default {reset}
