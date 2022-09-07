<template>
    <div class="login-form">
        <div class="text-center mb-10 mb-lg-20">
            <h3 class="font-size-h1">{{ phoneNumber }}</h3>
            <h3 class="font-size-h1">{{ t('AUTH.PASSWORD.TITLE', {}, {locale: lang}) }}</h3>
            <p class="text-muted font-weight-bold">{{ t('AUTH.PASSWORD.TEXT', {}, {locale: lang}) }}</p>
        </div>
        <form class="form fv-plugins-bootstrap fv-plugins-framework" novalidate="novalidate"
              @submit.prevent="resetPassword"
              id="kt_login_signup_form" method="POST">
            <div class="form-group fv-plugins-icon-container">
                <input class="form-control form-control-solid h-auto py-5 px-6" type="password"
                       :class="{ 'is-invalid': v$.form.password.$errors.length }"
                       v-model="v$.form.password.$model"
                       @change="v$.form.password.$touch()"
                       v-bind:placeholder="t('AUTH.PASSWORD.NEW_PASSWORD', {}, {locale: lang})" name="password"
                       autocomplete="off">
                <BaseInputError :errors="v$.form.password.$errors"/>
            </div>
            <div class="form-group fv-plugins-icon-container">
                <input class="form-control form-control-solid h-auto py-5 px-6" type="password"
                       :class="{ 'is-invalid': v$.form.passwordConfirmation.$errors.length }"
                       v-bind:placeholder="t('AUTH.PASSWORD.NEW_PASSWORD_CONFIRMATION', {}, {locale: lang})"
                       v-model="v$.form.passwordConfirmation.$model"
                       @change="v$.form.passwordConfirmation.$touch()"
                       name="password_confirmation"
                       autocomplete="off">
                <BaseInputError :errors="v$.form.passwordConfirmation.$errors"/>
            </div>
            <div class="form-group fv-plugins-icon-container">
                <BaseSubmitButton :title="t('AUTH.PASSWORD.BUTTON', {}, {locale: lang})"/>
            </div>
        </form>
    </div>
</template>

<script>
import Validator from "./../validator/passwordReset.validator"
import passwordResetApi from "./../api/passwordReset.api"
import {inject} from "vue";

export default {
    name: "passwordReset",
    setup() {
        const t = inject('t')
        const lang = inject('lang')
        const phoneNumber = inject('phone_number');
        const token = inject('token')

        const v$ = Validator.init()

        const resetPassword = () => {
            v$.value.$touch()

            if (v$.value.$invalid) return;

            passwordResetApi.reset({
                token: token,
                phone_number: phoneNumber,
                password: v$.value.form.password.$model,
                password_confirmation: v$.value.form.passwordConfirmation.$model
            })
        }

        return {
            t,
            lang,
            v$,
            phoneNumber,
            resetPassword
        }
    }
}
</script>
