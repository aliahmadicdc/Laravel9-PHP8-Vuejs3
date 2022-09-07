import {reactive} from "vue"
import {helpers, minLength, required, sameAs} from "@vuelidate/validators"
import useVuelidate from "@vuelidate/core"

const Validator = {
    init() {

        const state = reactive({
            form: {
                phoneNumber: '',
                password: '',
                passwordConfirmation: '',
                accept: ''
            }
        })

        const rules = {
            form: {
                phoneNumber: {
                    required: helpers.withMessage(t('AUTH.VALIDATION.REQUIRED', {model: t('AUTH.INPUT.PHONE_NUMBER', {}, {locale: lang})}, {locale: lang}), required),
                    phone: helpers.withMessage(t('AUTH.VALIDATION.NOT_PHONE_NUMBER', {}, {locale: lang}), helpers.regex(/^(09)[0-9]{9}/)),
                },
                password: {
                    required: helpers.withMessage(t('AUTH.VALIDATION.REQUIRED', {model: t('AUTH.INPUT.PASSWORD', {}, {locale: lang})}, {locale: lang}), required),
                    min: helpers.withMessage(
                        t('AUTH.VALIDATION.MIN_LENGTH_FIELD', {
                            model: t('AUTH.INPUT.PASSWORD', {}, {locale: lang}),
                            min: '8'
                        }, {locale: lang})
                        , minLength(8))
                },
                passwordConfirmation: {
                    required: helpers.withMessage(
                        t('AUTH.VALIDATION.REQUIRED', {model: t('AUTH.INPUT.CONFIRM_PASSWORD', {}, {locale: lang})}, {locale: lang})
                        , required
                    ),
                    min: helpers.withMessage(
                        t('AUTH.VALIDATION.MIN_LENGTH_FIELD', {
                            model: t('AUTH.INPUT.CONFIRM_PASSWORD', {}, {locale: lang}),
                            min: '8'
                        }, {locale: lang})
                        , minLength(8)
                    ),
                    /*sameAs: helpers.withMessage(
                        t('AUTH.VALIDATION.NOT_SAME', {
                            model: t('AUTH.INPUT.CONFIRM_PASSWORD', {}, {locale: lang}),
                            other: t('AUTH.INPUT.PASSWORD', {}, {locale: lang})
                        }, {locale: lang})
                        , sameAs(form.form.password)
                    ),*/
                },
                accept: {
                    sameAs: helpers.withMessage(
                        t('AUTH.VALIDATION.ACCEPT', {model: t('AUTH.REGISTER.RULES', {}, {locale: lang})}, {locale: lang})
                        , sameAs(true)
                    )
                }
            }
        }

        return useVuelidate(rules, state)
    }
}

export default Validator

