import {reactive} from "vue"
import {helpers, minLength, required, sameAs} from "@vuelidate/validators"
import useVuelidate from "@vuelidate/core"

const Validator = {
    init(defaultValues) {

        const state = reactive({
            form: {
                old_password: defaultValues.old_password,
                new_password: defaultValues.new_password,
                new_password_confirmation: defaultValues.new_password_confirmation,
            }
        })

        const rules = {
            form: {
                old_password: {
                    required: helpers.withMessage(t('AUTH.VALIDATION.REQUIRED', {model: t('PAGES.PROFILE.OLD_PASSWORD', {}, {locale: lang})}, {locale: lang}), required),
                    min: helpers.withMessage(
                        t('AUTH.VALIDATION.MIN_LENGTH_FIELD', {
                            model: t('PAGES.PROFILE.OLD_PASSWORD', {}, {locale: lang}),
                            min: '8'
                        }, {locale: lang})
                        , minLength(8))
                },
                new_password: {
                    required: helpers.withMessage(t('AUTH.VALIDATION.REQUIRED', {model: t('PAGES.PROFILE.NEW_PASSWORD', {}, {locale: lang})}, {locale: lang}), required),
                    min: helpers.withMessage(
                        t('AUTH.VALIDATION.MIN_LENGTH_FIELD', {
                            model: t('PAGES.PROFILE.NEW_PASSWORD', {}, {locale: lang}),
                            min: '8'
                        }, {locale: lang})
                        , minLength(8))
                },
                new_password_confirmation: {
                    required: helpers.withMessage(t('AUTH.VALIDATION.REQUIRED', {model: t('PAGES.PROFILE.NEW_PASSWORD_CONFIRMATION', {}, {locale: lang})}, {locale: lang}), required),
                    min: helpers.withMessage(
                        t('AUTH.VALIDATION.MIN_LENGTH_FIELD', {
                            model: t('PAGES.PROFILE.NEW_PASSWORD_CONFIRMATION', {}, {locale: lang}),
                            min: '8'
                        }, {locale: lang})
                        , minLength(8)),
                    // sameAs: helpers.withMessage(
                    //     t('AUTH.VALIDATION.NOT_SAME', {
                    //         model: t('PAGES.PROFILE.NEW_PASSWORD_CONFIRMATION', {}, {locale: lang}),
                    //         other: t('PAGES.PROFILE.NEW_PASSWORD', {}, {locale: lang})
                    //     }, {locale: lang})
                    //     , sameAs(this.new_password)
                    // )
                }
            }
        }

        return useVuelidate(rules, state)
    }
}

export default Validator

