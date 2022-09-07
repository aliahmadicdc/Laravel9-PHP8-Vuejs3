<template>
    <div class="flex-row-fluid ml-lg-8">
        <div class="card card-custom">

            <Header :title="t('PAGES.PROFILE.SETTINGS', {}, {locale: lang})"
                    :description="t('PAGES.PROFILE.SETTINGS_DESCRIPTION', {}, {locale: lang})"
                    :buttons="[
                        {title:t('COMPONENTS.BUTTON.SAVE', {}, {locale: lang}),event:'save'}
                        ]" @save="save"/>

            <form class="form">
                <div class="card-body">
                    <div class="row">
                        <label class="col-xl-3"></label>
                        <div class="col-lg-9 col-xl-6">
                            <h5 class="font-weight-bold mb-6">
                                {{ t('COMPONENTS.FORM.NOTIFICATIONS', {}, {locale: lang}) }}</h5>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label text-right">{{
                                t('COMPONENTS.FORM.EMAIL', {}, {locale: lang})
                            }}</label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="switch switch-sm">
                                <label>
                                    <input type="checkbox" name="email_notification"
                                           :class="{ 'is-invalid': v$.form.email_notification.$errors.length }"
                                           v-model="v$.form.email_notification.$model"
                                           @change="v$.form.email_notification.$touch()"/>
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label text-right">{{
                                t('COMPONENTS.FORM.SMS', {}, {locale: lang})
                            }}</label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="switch switch-sm">
                                <label>
                                    <input type="checkbox" name="sms_notification"
                                           :class="{ 'is-invalid': v$.form.sms_notification.$errors.length }"
                                           v-model="v$.form.sms_notification.$model"
                                           @change="v$.form.sms_notification.$touch()"/>
                                    <span></span>
                                </label>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row align-items-center">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label text-right">{{
                                t('COMPONENTS.FORM.NOTIFICATION', {}, {locale: lang})
                            }}</label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="switch switch-sm">
                                <label>
                                    <input type="checkbox" name="message_notification"
                                           :class="{ 'is-invalid': v$.form.message_notification.$errors.length }"
                                           v-model="v$.form.message_notification.$model"
                                           @change="v$.form.message_notification.$touch()"/>
                                    <span></span>
                                     <BaseInputError :errors="v$.form.message_notification.$errors"/>
                                </label>
                            </span>
                        </div>
                    </div>
                    <div class="separator separator-dashed my-5"></div>
                    <div class="row">
                        <label class="col-xl-3"></label>
                        <div class="col-lg-9 col-xl-6">
                            <h5 class="font-weight-bold mb-6">
                                {{ t('COMPONENTS.FORM.SECURITY', {}, {locale: lang}) }}</h5>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">{{
                                t('COMPONENTS.FORM.TWO_FACTOR_AUTHENTICATION', {}, {locale: lang})
                            }}</label>
                        <div class="col-lg-9 col-xl-6">
                            <span class="switch switch-sm">
                                <label>
                                    <input type="checkbox" name="two_step_verification"
                                           :class="{ 'is-invalid': v$.form.two_factor_authentication.$errors.length }"
                                           v-model="v$.form.two_factor_authentication.$model"
                                           @change="v$.form.two_factor_authentication.$touch()"/>
                                    <span></span>
                                </label>
                            </span>
                            <p class="form-text text-muted pt-2">
                                {{ t('COMPONENTS.FORM.TWO_FACTOR_AUTHENTICATION_DESCRIPTION', {}, {locale: lang}) }}
                            </p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">{{
                                t('COMPONENTS.FORM.DISABLE_ACCOUNT', {}, {locale: lang})
                            }}</label>
                        <div class="col-lg-9 col-xl-6">
                            <p class="form-text text-muted py-2">
                                {{ t('COMPONENTS.FORM.DISABLE_ACCOUNT_DESCRIPTION', {}, {locale: lang}) }}
                            </p>
                            <button type="button" class="btn btn-light-danger font-weight-bold btn-sm"
                                    v-on:click="disableAccount">
                                {{ t('COMPONENTS.FORM.DISABLE_ACCOUNT', {}, {locale: lang}) }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import Header from "./base/Header";
import {inject, ref} from "vue";
import Validator from "../validator/settings.validator";
import * as settingsApi from "../api/settings.api";
import {
    emailNotification,
    messageNotification,
    smsNotification,
    twoFactorAuthentication
} from "../../../../core/config/data/option-types";

export default {
    name: "Settings",
    components: {Header},
    emits: ['save'],
    setup() {
        const t = inject('t')
        const lang = inject('lang')
        const user = inject('user')
        const message_notification = ref(false)
        const sms_notification = ref(false)
        const email_notification = ref(false)
        const two_factor_authentication = ref(false)

        user.value.options.forEach((item, index) => {
            if (item.option_key === messageNotification)
                if (parseInt(item.option_value) === 1) message_notification.value = true
            if (item.option_key === smsNotification)
                if (parseInt(item.option_value) === 1) sms_notification.value = true
            if (item.option_key === emailNotification)
                if (parseInt(item.option_value) === 1) email_notification.value = true
            if (item.option_key === twoFactorAuthentication)
                if (parseInt(item.option_value) === 1) two_factor_authentication.value = true
        })

        const v$ = Validator.init({
            message_notification: message_notification.value,
            sms_notification: sms_notification.value,
            email_notification: email_notification.value,
            two_factor_authentication: two_factor_authentication.value,
        })

        const save = () => {
            v$.value.$touch()

            if (v$.value.$invalid) return

            settingsApi.updateSettings({
                message_notification: v$.value.form.message_notification.$model,
                sms_notification: v$.value.form.sms_notification.$model,
                email_notification: v$.value.form.email_notification.$model,
                two_factor_authentication: v$.value.form.two_factor_authentication.$model
            })
        }

        const disableAccount = () => {
            if (confirm(window.t('COMPONENTS.FORM.DISABLE_ACCOUNT_QUESTION', {locale: window.lang})))
                settingsApi.disableAccount()
        }

        return {
            t,
            lang,
            save,
            disableAccount,
            v$
        }
    }
}
</script>
