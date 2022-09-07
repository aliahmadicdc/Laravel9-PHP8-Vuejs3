import {reactive} from "vue"
import {helpers, minLength, required, email} from "@vuelidate/validators"
import useVuelidate from "@vuelidate/core"

const Validator = {
    init(defaultValues) {

        const state = reactive({
            form: {
                username: defaultValues.username,
                email: defaultValues.email,
                language: defaultValues.language,
                timezone: defaultValues.timezone,
            }
        })

        const rules = {
            form: {
                username: {
                    required: helpers.withMessage(t('AUTH.VALIDATION.REQUIRED', {model: t('COMPONENTS.FORM.USERNAME', {}, {locale: lang})}, {locale: lang}), required),
                    min: helpers.withMessage(t('PAGES.PROFILE.VALIDATION.NOT_USERNAME_LEN', {}, {locale: lang}), minLength(5)),
                    username: helpers.withMessage(t('PAGES.PROFILE.VALIDATION.NOT_USERNAME', {}, {locale: lang}), helpers.regex(/^[0-9A-Za-z]+$/)),
                },
                email: {
                    email: helpers.withMessage(t('PAGES.PROFILE.VALIDATION.EMAIL', {}, {locale: lang}), email),
                },
                language: {
                    required: helpers.withMessage(t('AUTH.VALIDATION.REQUIRED', {model: t('COMPONENTS.FORM.LANGUAGE', {}, {locale: lang})}, {locale: lang}), required),
                },
                timezone: {
                    required: helpers.withMessage(t('AUTH.VALIDATION.REQUIRED', {model: t('COMPONENTS.FORM.TIMEZONE', {}, {locale: lang})}, {locale: lang}), required),
                },
            }
        }

        return useVuelidate(rules, state)
    }
}

export default Validator

