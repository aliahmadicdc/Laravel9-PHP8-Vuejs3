<template>
    <div class="container mt-5">
        <div class="text-center mb-10 mb-lg-20">
            <h3 class="font-size-h1">{{ phoneNumber }}</h3>
            <h3 class="font-size-h1">{{ t('AUTH.PASSWORD.TITLE', {}, {locale: lang}) }}</h3>
            <p class="text-muted font-weight-bold">{{ t('AUTH.PASSWORD.TEXT', {}, {locale: lang}) }}</p>
        </div>
        <form class="form" novalidate="novalidate"
              @submit.prevent="resetPassword"
              id="kt_login_signup_form" method="POST">
            <div class="form-group">
                <input class="form-control" type="password"
                       :class="{ 'is-invalid': v$.form.password.$errors.length }"
                       v-model="v$.form.password.$model"
                       @change="v$.form.password.$touch()"
                       v-bind:placeholder="t('AUTH.PASSWORD.NEW_PASSWORD', {}, {locale: lang})" name="password"
                       autocomplete="off">
                <BaseInputError :errors="v$.form.password.$errors"/>
            </div>
            <div class="form-group">
                <input class="form-control" type="password"
                       :class="{ 'is-invalid': v$.form.passwordConfirmation.$errors.length }"
                       v-bind:placeholder="t('AUTH.PASSWORD.NEW_PASSWORD_CONFIRMATION', {}, {locale: lang})"
                       v-model="v$.form.passwordConfirmation.$model"
                       @change="v$.form.passwordConfirmation.$touch()"
                       name="password_confirmation"
                       autocomplete="off">
                <BaseInputError :errors="v$.form.passwordConfirmation.$errors"/>
            </div>
            <div class="form-group">
                <BaseSubmitButton :title="t('AUTH.PASSWORD.BUTTON', {}, {locale: lang})"/>
            </div>
        </form>
        <BaseMessages/>
        <BaseLoading/>
    </div>
</template>

<script>
import Validator from "./../validator/passwordReset.validator"
import passwordResetApi from "./../api/passwordReset.api"
import {getLastSlug, getParams} from "../../../../core/services/functions.service"

export default {
    name: "passwordReset",
    setup() {
        const v$ = Validator.init()

        const phoneNumber = getParams('phone_number')
        const token = getLastSlug()

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
            t: window.t,
            lang: window.lang,
            v$,
            phoneNumber,
            resetPassword
        }
    }
}
</script>
