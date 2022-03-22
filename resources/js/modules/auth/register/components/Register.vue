<template>
    <div class="container mt-5">
        <div class="text-center mb-10 mb-lg-20">
            <h3 class="font-size-h1">{{ t('AUTH.REGISTER.TITLE', {}, {locale: lang}) }}</h3>
            <p class="text-muted font-weight-bold">{{ t('AUTH.REGISTER.TEXT', {}, {locale: lang}) }}</p>
        </div>
        <form @submit.prevent="register"
              id="kt_login_signup_form" method="POST">
            <div class="form-group">
                <input class="form-control" type="text"
                       :class="{ 'is-invalid': v$.form.name.$errors.length }"
                       v-model="v$.form.name.$model"
                       @change="v$.form.name.$touch()"
                       v-bind:placeholder="t('AUTH.INPUT.NAME', {}, {locale: lang})" name="name"
                       autocomplete="off">
                <BaseInputError :errors="v$.form.name.$errors"/>
            </div>
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
                <input class="form-control" type="password"
                       :class="{ 'is-invalid': v$.form.password.$errors.length }"
                       v-model="v$.form.password.$model"
                       @change="v$.form.password.$touch()"
                       v-bind:placeholder="t('AUTH.INPUT.PASSWORD', {}, {locale: lang})" name="password"
                       autocomplete="off">
                <BaseInputError :errors="v$.form.password.$errors"/>
            </div>
            <div class="form-group">
                <input class="form-control" type="password"
                       :class="{ 'is-invalid': v$.form.passwordConfirmation.$errors.length }"
                       v-bind:placeholder="t('AUTH.INPUT.CONFIRM_PASSWORD', {}, {locale: lang})"
                       v-model="v$.form.passwordConfirmation.$model"
                       @change="v$.form.passwordConfirmation.$touch()"
                       name="password_confirmation"
                       autocomplete="off">
                <BaseInputError :errors="v$.form.passwordConfirmation.$errors"/>
            </div>
            <div class="form-group">
                <label class="checkbox mb-0">
                    <input type="checkbox" name="agree" v-model="v$.form.accept.$model">
                    <span></span>{{ t('AUTH.REGISTER.ACCEPT', {}, {locale: lang}) }}<a href="#" target="_blank">{{
                        t('AUTH.REGISTER.RULES', {}, {locale: lang})
                    }}</a>
                </label>
                <BaseInputError :errors="v$.form.accept.$errors"/>
            </div>
            <div class="form-group">
                <a href="/login" class="text-dark-50 text-hover-primary my-3 mr-2"
                   id="kt_login_forgot">
                    {{ t('AUTH.LOGIN.TITLE', {}, {locale: lang}) }}
                </a>
                <BaseSubmitButton :title="t('AUTH.REGISTER.BUTTON', {}, {locale: lang})"/>
            </div>
        </form>
        <BaseMessages/>
        <BaseLoading/>
    </div>
</template>

<script>
import registerApi from "./../api/register.api"
import Validator from "../validator/register.validator"

export default {
    name: "register",
    setup() {
        const v$ = Validator.init()

        const register = () => {
            v$.value.$touch()

            if (v$.value.$invalid) return

            registerApi.register({
                name: v$.value.form.name.$model,
                phone_number: v$.value.form.phoneNumber.$model,
                password: v$.value.form.password.$model,
                password_confirmation: v$.value.form.passwordConfirmation.$model,
                agree: v$.value.form.accept.$model,
            })
        }

        return {
            t: window.t,
            lang: window.lang,
            v$,
            register
        }
    }
}
</script>
