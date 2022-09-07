<template>
    <div class="login-form login-signin">
        <div class="text-center mb-10 mb-lg-20">
            <h3 class="font-size-h1">{{ t('AUTH.TFA.TITLE', {}, {locale: lang}) }}</h3>
            <p class="text-muted font-weight-bold">{{
                    t('AUTH.TFA.TEXT', {phone: loginData.phone_number}, {locale: lang})
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
                <a href="" v-on:click="resend" class="font-weight-bold my-3 mr-2 pointer"
                   id="kt_login_forgot">
                    {{ t('AUTH.TFA.RESEND', {}, {locale: lang}) }}
                </a>
                <BaseSubmitButton :title="t('AUTH.TFA.BUTTON', {}, {locale: lang})"/>
            </div>
            <div
                class="mt-5 mb-15 mb-lg-0 flex-column-auto justify-content-center py-5 px-10 text-center">
                <span class="font-weight-bold text-dark-50">{{
                        t('AUTH.TFA.CANCEL', {phone: loginData.phone_number}, {locale: lang})
                    }}</span>
                <a href="" v-on:click="goToLogin" class="font-weight-bold ml-2">{{
                        t('AUTH.LOGIN.TITLE', {locale: lang})
                    }}
                </a>
            </div>
        </form>
    </div>
</template>

<script>
import Validator from "./../validator/two-factor-authentication.validator"
import twoFactorAuthenticationApi from "./../api/two_factor_authentication.api"
import {computed, inject} from "vue";
import {SET_NEED_2FA} from "../store/mutation-types";

export default {
    name: "twoFactorAuthentication",
    setup() {
        const t = inject('t')
        const lang = inject('lang')
        const store = inject('store')

        const v$ = Validator.init()
        const loginData = computed(() => store.state.login.loginData)

        const verify = () => {
            v$.value.$touch()

            if (v$.value.$invalid) return;

            twoFactorAuthenticationApi.verify({
                code: v$.value.form.code.$model,
                phone_number: loginData.value.phone_number,
                password: loginData.value.password
            })
        }

        const resend = () => {
            twoFactorAuthenticationApi.resend({
                phone_number: loginData.value.phone_number,
                password: loginData.value.password
            })
        }

        const goToLogin = () => {
            StoreService.commit('login', SET_NEED_2FA, false)
        }

        return {
            t,
            lang,
            v$,
            loginData,
            verify,
            resend,
            goToLogin
        }
    }
}
</script>
