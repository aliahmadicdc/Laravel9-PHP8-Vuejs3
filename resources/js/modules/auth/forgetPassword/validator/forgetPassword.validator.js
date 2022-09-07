import {reactive} from "vue"
import {helpers, required} from "@vuelidate/validators"
import useVuelidate from "@vuelidate/core"

const Validator = {
    init() {

        const state = reactive({
            form: {
                phoneNumber: '',
            }
        })

        const rules = {
            form: {
                phoneNumber: {
                    required: helpers.withMessage(t('AUTH.VALIDATION.REQUIRED', {model: t('AUTH.INPUT.PHONE_NUMBER', {}, {locale: lang})}, {locale: lang}), required),
                    phone: helpers.withMessage(t('AUTH.VALIDATION.NOT_PHONE_NUMBER', {}, {locale: lang}), helpers.regex(/^(09)[0-9]{9}/)),
                },
            }
        }

        return useVuelidate(rules, state)
    }
}

export default Validator

