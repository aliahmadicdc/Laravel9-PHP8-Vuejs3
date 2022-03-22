import {reactive} from "vue"
import {helpers, required} from "@vuelidate/validators"
import useVuelidate from "@vuelidate/core"

const form = reactive({
    form: {
        code: '',
    }
})

const Validator = {
    init(t = window.t, lang = window.lang) {
        return useVuelidate({
            form: {
                code: {
                    required: helpers.withMessage(t('AUTH.VALIDATION.REQUIRED', {model: t('AUTH.INPUT.CODE', {}, {locale: lang})}, {locale: lang}), required),
                    code: helpers.withMessage(t('AUTH.VALIDATION.NOT_CODE', {count: "6"}, {locale: lang}), helpers.regex(/^[0-9]{6}/)),
                }
            }
        }, form)
    }
}

export default Validator

