<template>
    <div class="login-form login-signin">
        <div class="text-center mb-10 mb-lg-20">
            <h3 class="font-size-h1">{{ t('AUTH.LOGIN.TITLE', {}, {locale: lang}) }}</h3>
            <p class="text-muted font-weight-bold">{{ t('AUTH.LOGIN.TEXT', {}, {locale: lang}) }}</p>
        </div>
        <form class="form fv-plugins-bootstrap fv-plugins-framework" novalidate="novalidate" @submit.prevent="login"
              id="kt_login_signin_form" method="POST">
            <div class="form-group fv-plugins-icon-container">
                <input class="form-control form-control-solid h-auto py-5 px-6" type="text"
                       inputmode="numeric"
                       :class="{ 'is-invalid': v$.form.phoneNumber.$errors.length }"
                       v-model="v$.form.phoneNumber.$model"
                       @change="v$.form.phoneNumber.$touch()"
                       v-bind:placeholder="t('AUTH.LOGIN.PHONE_NUMBER_HOLDER', {}, {locale: lang})"
                       name="phone_number"
                       autocomplete="off">
                <BaseInputError :errors="v$.form.phoneNumber.$errors"/>
            </div>
            <div class="form-group fv-plugins-icon-container">
                <input class="form-control form-control-solid h-auto py-5 px-6" type="password"
                       :class="{ 'is-invalid': v$.form.password.$errors.length }"
                       v-model="v$.form.password.$model"
                       @change="v$.form.password.$touch()"
                       v-bind:placeholder="t('AUTH.INPUT.PASSWORD', {}, {locale: lang})"
                       name="password"
                       autocomplete="off">
                <BaseInputError :errors="v$.form.password.$errors"/>
            </div>

            <BaseRecaptcha/>

            <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                <router-link :to="{name:'forgotPassword'}" class="font-weight-bold ml-2 my-3 mr-2"
                             id="kt_login_forgot">{{ t('AUTH.FORGOT.TITLE', {}, {locale: lang}) }}
                </router-link>
                <BaseSubmitButton :title="t('AUTH.LOGIN.BUTTON', {}, {locale: lang})"/>
            </div>
            <div
                class="mt-5 mb-15 mb-lg-0 flex-column-auto justify-content-center py-5 px-10 text-center">
                <span class="font-weight-bold text-dark-50">{{
                        t('AUTH.LOGIN.DONT_HAVE_ACCOUNT', {}, {locale: lang})
                    }}</span>
                <router-link :to="{name:'register'}" class="font-weight-bold ml-2"
                             id="kt_login_signup">{{ t('AUTH.REGISTER.TITLE', {}, {locale: lang}) }}
                </router-link>
            </div>
        </form>
    </div>
</template>

<script>
import Validator from "../../login/validator/login.validator"
import loginApi from "../../login/api/login.api"
import {SET_LOGIN_DATA} from "../store/mutation-types";
import {inject} from "vue";

export default {
    name: "login",
    setup() {
        const t = inject('t')
        const lang = inject('lang')

        const v$ = Validator.init()

        const login = () => {
            v$.value.$touch()

            if (v$.value.$invalid) return

            let data = {
                phone_number: v$.value.form.phoneNumber.$model,
                password: v$.value.form.password.$model,
            }

            window.StoreService.commit('login', SET_LOGIN_DATA, data)

            loginApi.login(data)
        }

        return {
            t,
            lang,
            v$,
            login
        }
    }
}
</script>
