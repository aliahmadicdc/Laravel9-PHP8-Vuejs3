import {reactive} from "vue"
import {helpers, minLength, required} from "@vuelidate/validators"
import useVuelidate from "@vuelidate/core"

const form = reactive({
    form: {
        phoneNumber: '',
        password: '',
    }
})

const Validator = {
    init(t = window.t, lang = window.lang) {
        return useVuelidate({
            form: {
                phoneNumber: {
                    required: helpers.withMessage(t('AUTH.VALIDATION.REQUIRED', {model: t('AUTH.INPUT.PHONE_NUMBER', {}, {locale: lang})}, {locale: lang}), required),
                    code: helpers.withMessage(t('AUTH.VALIDATION.NOT_PHONE_NUMBER', {}, {locale: lang}), helpers.regex(/^[0-9]{6}/)),
                },
                password: {
                    required: helpers.withMessage(t('AUTH.VALIDATION.REQUIRED', {model: t('AUTH.INPUT.PASSWORD', {}, {locale: lang})}, {locale: lang}), required),
                    min: helpers.withMessage(
                        t('AUTH.VALIDATION.MIN_LENGTH_FIELD', {
                            model: t('AUTH.INPUT.PASSWORD', {}, {locale: lang}),
                            min: '8'
                        }, {locale: lang})
                        , minLength(8))
                }
            }
        }, form)
    }
}

export default Validator

