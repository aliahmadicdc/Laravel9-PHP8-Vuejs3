<template>
    <div class="login-form login-signin">
        <div class="text-center mb-10 mb-lg-20">
            <h3 class="font-size-h1">{{ t('AUTH.REGISTER.TITLE', {}, {locale: lang}) }}</h3>
            <p class="text-muted font-weight-bold">{{ t('AUTH.REGISTER.TEXT', {}, {locale: lang}) }}</p>
        </div>
        <form class="form fv-plugins-bootstrap fv-plugins-framework" novalidate="novalidate" @submit.prevent="register"
              id="kt_login_signin_form" method="POST">
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
            <div class="form-group fv-plugins-icon-container">
                <input class="form-control form-control-solid h-auto py-5 px-6" type="password"
                       :class="{ 'is-invalid': v$.form.password.$errors.length }"
                       v-model="v$.form.password.$model"
                       @change="v$.form.password.$touch()"
                       v-bind:placeholder="t('AUTH.INPUT.PASSWORD', {}, {locale: lang})" name="password"
                       autocomplete="off">
                <BaseInputError :errors="v$.form.password.$errors"/>
            </div>
            <div class="form-group fv-plugins-icon-container">
                <input class="form-control form-control-solid h-auto py-5 px-6" type="password"
                       :class="{ 'is-invalid': v$.form.passwordConfirmation.$errors.length }"
                       v-bind:placeholder="t('AUTH.INPUT.CONFIRM_PASSWORD', {}, {locale: lang})"
                       v-model="v$.form.passwordConfirmation.$model"
                       @change="v$.form.passwordConfirmation.$touch()"
                       name="password_confirmation"
                       autocomplete="off">
                <BaseInputError :errors="v$.form.passwordConfirmation.$errors"/>
            </div>
            <div class="form-group fv-plugins-icon-container">
                <label class="checkbox mb-0">
                    <input type="checkbox" name="agree" v-model="v$.form.accept.$model">
                    <span></span>{{ t('AUTH.REGISTER.ACCEPT', {}, {locale: lang})}}<a href="https://didebanco.com/privacy-policy" target="_blank"> {{
                        t('AUTH.REGISTER.RULES', {}, {locale: lang})
                    }}</a>
                </label>
                <BaseInputError :errors="v$.form.accept.$errors"/>
            </div>

            <BaseRecaptcha/>

            <BaseSubmitButton :title="t('AUTH.REGISTER.BUTTON', {}, {locale: lang})"/>
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
import registerApi from "./../api/register.api"
import Validator from "../validator/register.validator"
import {inject} from "vue";

export default {
    name: "register",
    setup() {
        const t = inject('t')
        const lang = inject('lang')

        const v$ = Validator.init()

        const register = () => {
            v$.value.$touch()

            if (v$.value.$invalid) return

            registerApi.register({
                phone_number: v$.value.form.phoneNumber.$model,
                password: v$.value.form.password.$model,
                password_confirmation: v$.value.form.passwordConfirmation.$model,
                agree: v$.value.form.accept.$model,
            })
        }

        return {
            t,
            lang,
            v$,
            register
        }
    }
}
</script>
