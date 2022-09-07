<template>
    <div class="flex-row-fluid ml-lg-8">
        <div class="card card-custom">

            <Header :title="t('PAGES.PROFILE.CHANGE_PASSWORD', {}, {locale: lang})"
                    :description="t('PAGES.PROFILE.CHANGE_PASSWORD_DESCRIPTION', {}, {locale: lang})"
                    :buttons="[
                        {title:t('COMPONENTS.BUTTON.SAVE', {}, {locale: lang}),event:'save'}
                        ]" @save="save"/>

            <form class="form">
                <div class="card-body">
                    <div class="alert alert-custom alert-light-primary fade show mb-10" role="alert">
                        <div class="alert-icon">
                            <span class="svg-icon svg-icon-3x svg-icon-primary">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
        <rect fill="#000000" x="11" y="10" width="2" height="7" rx="1"/>
        <rect fill="#000000" x="11" y="7" width="2" height="2" rx="1"/>
    </g>
</svg>
                            </span>
                        </div>
                        <div class="alert-text font-weight-bold">
                            {{ t('PAGES.PROFILE.PASSWORD_DESCRIPTION', {}, {locale: lang}) }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label text-alert">{{ t('PAGES.PROFILE.OLD_PASSWORD', {}, {locale: lang}) }}</label>
                        <div class="col-lg-9 col-xl-6">
                            <input type="password" class="form-control form-control-lg form-control-solid mb-2"
                                   :placeholder="t('PAGES.PROFILE.OLD_PASSWORD', {}, {locale: lang})"
                                   :class="{ 'is-invalid': v$.form.old_password.$errors.length }"
                                   v-model="v$.form.old_password.$model"
                                   @change="v$.form.old_password.$touch()"/>
                            <BaseInputError :errors="v$.form.old_password.$errors"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label text-alert">{{ t('PAGES.PROFILE.NEW_PASSWORD', {}, {locale: lang}) }}</label>
                        <div class="col-lg-9 col-xl-6">
                            <input type="password" class="form-control form-control-lg form-control-solid"
                                   :placeholder="t('PAGES.PROFILE.NEW_PASSWORD', {}, {locale: lang})"
                                   :class="{ 'is-invalid': v$.form.new_password.$errors.length }"
                                   v-model="v$.form.new_password.$model"
                                   @change="v$.form.new_password.$touch()"/>
                            <BaseInputError :errors="v$.form.new_password.$errors"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label text-alert">{{ t('PAGES.PROFILE.NEW_PASSWORD_CONFIRMATION', {}, {locale: lang}) }}</label>
                        <div class="col-lg-9 col-xl-6">
                            <input type="password" class="form-control form-control-lg form-control-solid"
                                   :placeholder="t('PAGES.PROFILE.NEW_PASSWORD_CONFIRMATION', {}, {locale: lang})"
                                   :class="{ 'is-invalid': v$.form.new_password_confirmation.$errors.length }"
                                   v-model="v$.form.new_password_confirmation.$model"
                                   @change="v$.form.new_password_confirmation.$touch()"/>
                            <BaseInputError :errors="v$.form.new_password_confirmation.$errors"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import Header from "./base/Header";
import Validator from "../validator/change-password.validator";
import changePasswordApi from "../api/change-password.api";
import {inject} from "vue";

export default {
    name: "ChangePassword",
    components: {Header},
    setup() {
        const t = inject('t')
        const lang = inject('lang')

        const v$ = Validator.init({
            old_password: '',
            new_password: '',
            new_password_confirmation: '',
        })

        const save = () => {
            v$.value.$touch()

            if (v$.value.$invalid) return

            changePasswordApi.changePassword({
                old_password: v$.value.form.old_password.$model,
                new_password: v$.value.form.new_password.$model,
                new_password_confirmation: v$.value.form.new_password_confirmation.$model,
            })
        }

        return {
            t,
            lang,
            save,
            v$
        }
    }
}
</script>
