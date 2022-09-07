<template>
    <div class="login-form">
        <div class="text-center mb-10 mb-lg-20">
            <h3 class="font-size-h1">{{ t('AUTH.FORGOT.TITLE', {}, {locale: lang}) }}</h3>
            <p class="text-muted font-weight-bold">{{
                    t('AUTH.FORGOT.TEXT', {}, {locale: lang})
                }}</p>
        </div>
        <form class="form fv-plugins-bootstrap fv-plugins-framework" novalidate="novalidate" @submit.prevent="request"
              id="kt_login_signup_form" method="POST">
            <div class="form-group fv-plugins-icon-container">
                <input class="form-control form-control-solid h-auto py-5 px-6" type="text"
                       inputmode="numeric"
                       :class="{ 'is-invalid': v$.form.phoneNumber.$errors.length }"
                       v-model="v$.form.phoneNumber.$model"
                       @change="v$.form.phoneNumber.$touch()"
                       v-bind:placeholder="t('AUTH.LOGIN.PHONE_NUMBER_HOLDER', {}, {locale: lang})" name="phone_number"
                       autocomplete="off">
                <BaseInputError :errors="v$.form.phoneNumber.$errors"/>
            </div>

            <BaseRecaptcha/>

            <div class="form-group fv-plugins-icon-container">
                <BaseSubmitButton :title="t('AUTH.FORGOT.BUTTON', {}, {locale: lang})"/>
            </div>
            <div
                class="mt-5 mb-15 mb-lg-0 flex-column-auto justify-content-center py-5 px-10 text-center">
                <span class="font-weight-bold text-dark-50">{{
                        t('AUTH.LOGIN.HAVE_ACCOUNT', {}, {locale: lang})
                    }}</span>
                <router-link :to="{name:'login'}" class="font-weight-bold ml-2"
                             id="kt_login_signup">{{ t('AUTH.LOGIN.TITLE', {}, {locale: lang}) }}
                </router-link>
            </div>
        </form>
    </div>
</template>

<script>
import Validator from "./../validator/forgetPassword.validator"
import forgetPasswordApi from "./../api/forgetPassword.api"
import {inject} from "vue";

export default {
    name: "ForgetPassword",
    setup() {
        const t = inject('t')
        const lang = inject('lang')

        const v$ = Validator.init()

        const request = () => {
            v$.value.$touch()

            if (v$.value.$invalid) return;

            forgetPasswordApi.request({
                phone_number: v$.value.form.phoneNumber.$model,
            })
        }

        return {
            t,
            lang,
            v$,
            request
        }
    }
}
</script>
