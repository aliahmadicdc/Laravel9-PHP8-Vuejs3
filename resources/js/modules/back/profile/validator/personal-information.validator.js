import {reactive} from "vue"
import {helpers, minLength, required} from "@vuelidate/validators"
import useVuelidate from "@vuelidate/core"

const Validator = {
    init(defaultValues) {

        const state = reactive({
            form: {
                name: defaultValues.name,
            }
        })

        const rules = {
            form: {
                name: {
                    required: helpers.withMessage(t('AUTH.VALIDATION.REQUIRED', {model: t('COMPONENTS.FORM.NAME', {}, {locale: lang})}, {locale: lang}), required),
                    min: helpers.withMessage(t('PAGES.PROFILE.VALIDATION.NOT_NAME_LEN', {}, {locale: lang}), minLength(5)),
                    name: helpers.withMessage(t('PAGES.PROFILE.VALIDATION.NOT_NAME', {}, {locale: lang}), helpers.regex(/^[\u0600-\u06FF\s]+$/)),
                },
            }
        }

        return useVuelidate(rules, state)
    }
}

export default Validator

