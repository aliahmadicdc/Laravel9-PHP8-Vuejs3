import {reactive} from "vue"
import {helpers, required} from "@vuelidate/validators"
import useVuelidate from "@vuelidate/core"

const Validator = {
    init(defaultValues) {

        const state = reactive({
            form: {
                message_notification: defaultValues.message_notification,
                sms_notification: defaultValues.sms_notification,
                email_notification: defaultValues.email_notification,
                two_factor_authentication: defaultValues.two_factor_authentication,
            }
        })

        const rules = {
            form: {
                message_notification: {
                    required: helpers.withMessage(t('AUTH.VALIDATION.REQUIRED', {model: t('PAGES.PROFILE.MESSAGE_NOTIFICATION', {}, {locale: lang})}, {locale: lang}), required)
                },
                sms_notification: {
                    required: helpers.withMessage(t('AUTH.VALIDATION.REQUIRED', {model: t('PAGES.PROFILE.SMS_NOTIFICATION', {}, {locale: lang})}, {locale: lang}), required)
                },
                email_notification: {
                    required: helpers.withMessage(t('AUTH.VALIDATION.REQUIRED', {model: t('PAGES.PROFILE.EMAIL_NOTIFICATION', {}, {locale: lang})}, {locale: lang}), required)
                },
                two_factor_authentication: {
                    required: helpers.withMessage(t('AUTH.VALIDATION.REQUIRED', {model: t('PAGES.PROFILE.TWO_STEP_VERIFICATION', {}, {locale: lang})}, {locale: lang}), required)
                }
            }
        }

        return useVuelidate(rules, state)
    }
}

export default Validator

