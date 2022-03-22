<template>
    <div class="container mt-5">
        <div class="text-center mb-10 mb-lg-20">
            <h3 class="font-size-h1">{{ t('AUTH.VERIFY.TITLE', {}, {locale: lang}) }}</h3>
            <p class="text-muted font-weight-bold">{{
                    t('AUTH.VERIFY.TEXT', {phone: phoneNumber}, {locale: lang})
                }}</p>
        </div>
        <form novalidate="novalidate" @submit.prevent="verify"
              id="kt_login_signup_form" method="POST">
            <div class="form-group">
                <input class="form-control" type="text"
                       inputmode="numeric"
                       :class="{ 'is-invalid': v$.form.code.$errors.length }"
                       v-model="v$.form.code.$model"
                       @change="v$.form.code.$touch()"
                       v-bind:placeholder="t('AUTH.VERIFY.CODE_HINT', {}, {locale: lang})" name="code"
                       autocomplete="off">
                <BaseInputError :errors="v$.form.code.$errors"/>
            </div>
            <div class="form-group">
                <a @click="resend" class="text-dark-50 text-hover-primary my-3 mr-2 pointer"
                   id="kt_login_forgot">
                    {{ t('AUTH.VERIFY.RESEND', {}, {locale: lang}) }}
                </a>
                <BaseSubmitButton :title="t('AUTH.VERIFY.BUTTON', {}, {locale: lang})"/>
            </div>
            <div class="text-center mt-5 mb-lg-20">
                <p class="text-muted font-weight-bold mt-5">{{
                        t('AUTH.LOGOUT.TEXT', {phone: phoneNumber}, {locale: lang})
                    }}</p>
                <BaseLogoutButton/>
            </div>
        </form>
        <BaseMessages/>
        <BaseLoading/>
    </div>
</template>

<script>
import Validator from "./../validator/verify.validator"
import verifyApi from "./../api/verify.api"
import {USER_PHONE_NUMBER} from "../../../../core/services/session-types"

export default {
    name: "verify",
    setup() {
        const v$ = Validator.init()

        const phoneNumber = SessionService.get(USER_PHONE_NUMBER)

        const verify = () => {
            v$.value.$touch()

            if (v$.value.$invalid) return;

            verifyApi.verify({
                code: v$.value.form.code.$model,
                phone_number: phoneNumber
            })
        }

        const resend = () => {
            verifyApi.resend()
        }

        return {
            t: window.t,
            lang: window.lang,
            v$,
            phoneNumber,
            verify,
            resend
        }
    }
}
</script>
