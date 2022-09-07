import {reactive} from "vue"
import {helpers, minLength, required} from "@vuelidate/validators"
import useVuelidate from "@vuelidate/core"

const Validator = {
    init() {

        const state = reactive({
            form: {
                phoneNumber: '',
                password: '',
            }
        })

        const rules = {
            form: {
                phoneNumber: {
                    required: helpers.withMessage(t('AUTH.VALIDATION.REQUIRED', {model: t('AUTH.INPUT.PHONE_NUMBER', {}, {locale: lang})}, {locale: lang}), required),
                    code: helpers.withMessage(t('AUTH.VALIDATION.NOT_PHONE_NUMBER', {}, {locale: lang}), helpers.regex(/^[0-9]{11}/)),
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
        }

        return useVuelidate(rules, state)
    }
}

export default Validator

