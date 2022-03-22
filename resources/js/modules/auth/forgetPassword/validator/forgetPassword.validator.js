import {reactive} from "vue"
import {helpers, required} from "@vuelidate/validators"
import useVuelidate from "@vuelidate/core"

const form = reactive({
    form: {
        phoneNumber: '',
    }
})

const Validator = {
    init(t = window.t, lang = window.lang) {
        return useVuelidate({
            form: {
                phoneNumber: {
                    required: helpers.withMessage(t('AUTH.VALIDATION.REQUIRED', {model: t('AUTH.INPUT.PHONE_NUMBER', {}, {locale: lang})}, {locale: lang}), required),
                    phone: helpers.withMessage(t('AUTH.VALIDATION.NOT_PHONE_NUMBER', {}, {locale: lang}), helpers.regex(/^(09)[0-9]{9}/)),
                },
            }
        }, form)
    }
}

export default Validator

