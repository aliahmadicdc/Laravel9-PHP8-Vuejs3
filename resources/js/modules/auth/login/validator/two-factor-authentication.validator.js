import {reactive} from "vue"
import {helpers, required} from "@vuelidate/validators"
import useVuelidate from "@vuelidate/core"

const Validator = {
    init() {

        const state = reactive({
            form: {
                code: '',
            }
        })

        const rules = {
            form: {
                code: {
                    required: helpers.withMessage(t('AUTH.VALIDATION.REQUIRED', {model: t('AUTH.INPUT.CODE', {}, {locale: lang})}, {locale: lang}), required),
                    code: helpers.withMessage(t('AUTH.VALIDATION.NOT_CODE', {count: "6"}, {locale: lang}), helpers.regex(/^[0-9]{6}/)),
                }
            }
        }

        return useVuelidate(rules, state)
    }
}

export default Validator

