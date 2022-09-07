<template>
    <div class="login-form">
        <div class="text-center mb-10 mb-lg-20">
            <h3 class="font-size-h1">{{ t('AUTH.VERIFY.TITLE', {}, {locale: lang}) }}</h3>
            <p class="text-muted font-weight-bold">{{
                    t('AUTH.VERIFY.TEXT', {phone: phoneNumber}, {locale: lang})
                }}</p>
        </div>
        <form class="form fv-plugins-bootstrap fv-plugins-framework" novalidate="novalidate" @submit.prevent="verify"
              id="kt_login_signup_form" method="POST">
            <div class="form-group fv-plugins-icon-container">
                <input class="form-control form-control-solid h-auto py-5 px-6" type="text"
                       inputmode="numeric"
                       :class="{ 'is-invalid': v$.form.code.$errors.length }"
                       v-model="v$.form.code.$model"
                       @change="v$.form.code.$touch()"
                       v-bind:placeholder="t('AUTH.VERIFY.CODE_HINT', {}, {locale: lang})" name="code"
                       autocomplete="off">
                <BaseInputError :errors="v$.form.code.$errors"/>
            </div>
            <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                <a href="" @click="resend" class="font-weight-bold my-3 mr-2 pointer"
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
    </div>
</template>

<script>
import Validator from "./../validator/verify.validator"
import verifyApi from "./../api/verify.api"
import {inject} from "vue"

export default {
    name: "verify",
    setup() {
        const t = inject('t')
        const lang = inject('lang')
        const store = inject('store')

        const v$ = Validator.init()

        const phoneNumber = store.state.all.user.phone_number

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
            t,
            lang,
            v$,
            phoneNumber,
            verify,
            resend
        }
    }
}
</script>
