<template>
    <div class="container mt-5">
        <div class="text-center mb-10 mb-lg-20">
            <h3 class="font-size-h1">{{ t('AUTH.FORGOT.TITLE', {}, {locale: lang}) }}</h3>
            <p class="text-muted font-weight-bold">{{
                    t('AUTH.FORGOT.TEXT', {}, {locale: lang})
                }}</p>
        </div>
        <form novalidate="novalidate" @submit.prevent="request"
              id="kt_login_signup_form" method="POST">
            <div class="form-group">
                <input class="form-control" type="text"
                       inputmode="numeric"
                       :class="{ 'is-invalid': v$.form.phoneNumber.$errors.length }"
                       v-model="v$.form.phoneNumber.$model"
                       @change="v$.form.phoneNumber.$touch()"
                       v-bind:placeholder="t('AUTH.LOGIN.PHONE_NUMBER_HOLDER', {}, {locale: lang})" name="phone_number"
                       autocomplete="off">
                <BaseInputError :errors="v$.form.phoneNumber.$errors"/>
            </div>
            <div class="form-group">
                <a href="/login" class="text-dark-50 text-hover-primary my-3 mr-2"
                   id="kt_login_forgot">
                    {{ t('AUTH.LOGIN.TITLE', {}, {locale: lang}) }}
                </a>
                <BaseSubmitButton :title="t('AUTH.FORGOT.BUTTON', {}, {locale: lang})"/>
            </div>
        </form>
        <BaseMessages/>
        <BaseLoading/>
    </div>
</template>

<script>
import Validator from "./../validator/forgetPassword.validator"
import forgetPasswordApi from "./../api/forgetPassword.api"

export default {
    name: "ForgetPassword",
    setup() {
        const v$ = Validator.init()

        const request = () => {
            v$.value.$touch()

            if (v$.value.$invalid) return;

            forgetPasswordApi.request({
                phone_number: v$.value.form.phoneNumber.$model,
            })
        }

        return {
            t: window.t,
            lang: window.lang,
            v$,
            request
        }
    }
}
</script>
