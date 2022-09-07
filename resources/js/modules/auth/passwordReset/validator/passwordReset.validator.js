import {reactive} from "vue"
import {helpers, minLength, required} from "@vuelidate/validators"
import useVuelidate from "@vuelidate/core"

const Validator = {
    init() {

        const state = reactive({
            form: {
                password: '',
                passwordConfirmation: ''
            }
        })

        const rules={
            form: {
                password: {
                    required: helpers.withMessage(t('AUTH.VALIDATION.REQUIRED', {model: t('AUTH.PASSWORD.NEW_PASSWORD', {}, {locale: lang})}, {locale: lang}), required),
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
                            model: t('AUTH.PASSWORD.NEW_PASSWORD_CONFIRMATION', {}, {locale: lang}),
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
            }
        }

        return useVuelidate(rules, state)
    }
}

export default Validator

