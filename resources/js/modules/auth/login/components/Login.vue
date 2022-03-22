<template>
    <div class="container">
        <div class="mt-5">
            <div class="text-center mb-10 mb-lg-20">
                <h3 class="font-size-h1">{{ t('AUTH.LOGIN.TITLE', {}, {locale: lang}) }}</h3>
                <p class="text-muted font-weight-bold">{{ t('AUTH.LOGIN.TEXT', {}, {locale: lang}) }}</p>
            </div>
            <form @submit.prevent="login" method="POST">
                <div class="form-group">
                    <input class="form-control" type="text"
                           inputmode="numeric"
                           :class="{ 'is-invalid': v$.form.phoneNumber.$errors.length }"
                           v-model="v$.form.phoneNumber.$model"
                           @change="v$.form.phoneNumber.$touch()"
                           v-bind:placeholder="t('AUTH.LOGIN.PHONE_NUMBER_HOLDER', {}, {locale: lang})"
                           name="phone_number"
                           autocomplete="off">
                    <BaseInputError :errors="v$.form.phoneNumber.$errors"/>
                </div>
                <div class="form-group">
                    <input class="form-control" type="password"
                           :class="{ 'is-invalid': v$.form.password.$errors.length }"
                           v-model="v$.form.password.$model"
                           @change="v$.form.password.$touch()"
                           v-bind:placeholder="t('AUTH.INPUT.PASSWORD', {}, {locale: lang})"
                           name="password"
                           autocomplete="off">
                    <BaseInputError :errors="v$.form.password.$errors"/>
                </div>
                <div class="form-group">
                    <a href="/password/reset" class="text-dark-50 text-hover-primary my-3 mr-2"
                       id="kt_login_forgot">
                        {{ t('AUTH.FORGOT.TITLE', {}, {locale: lang}) }}
                    </a>
                    <a href="/register" class="text-dark-50 text-hover-primary my-3 mr-2">
                        {{ t('AUTH.REGISTER.TITLE', {}, {locale: lang}) }}
                    </a>
                    <BaseSubmitButton :title="t('AUTH.LOGIN.BUTTON', {}, {locale: lang})"/>
                </div>
                <BaseMessages/>
                <BaseLoading/>
            </form>
        </div>
    </div>
</template>

<script>
import Validator from "../../login/validator/login.validator"
import loginApi from "../../login/api/login.api"

export default {
    name: "login",
    setup() {
        const v$ = Validator.init()

        const login = () => {
            v$.value.$touch()

            if (v$.value.$invalid) return

            loginApi.login({
                phone_number: v$.value.form.phoneNumber.$model,
                password: v$.value.form.password.$model
            })
        }

        return {
            t: window.t,
            lang: window.lang,
            v$,
            login
        }
    }
}
</script>
