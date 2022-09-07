<template>
    <div class="flex-row-fluid ml-lg-8">
        <div class="card card-custom">

            <Header :title="t('PAGES.PROFILE.INFORMATION', {}, {locale: lang})"
                    :description="t('PAGES.PROFILE.INFORMATION_DESCRIPTION', {}, {locale: lang})"
                    :buttons="[
                        {title:t('COMPONENTS.BUTTON.SAVE', {}, {locale: lang}),event:'save'}
                        ]" @save="save"/>

            <form class="form">
                <div class="card-body">
                    <div class="row">
                        <label class="col-xl-3"></label>
                        <div class="col-lg-9 col-xl-6">
                            <h5 class="font-weight-bold mb-6">
                                {{ t('PAGES.PROFILE.INFORMATION', {}, {locale: lang}) }}</h5>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">{{
                                t('COMPONENTS.FORM.USER_ID', {}, {locale: lang})
                            }}</label>
                        <div class="col-lg-9 col-xl-6">
                            <input disabled class="form-control form-control-lg form-control-solid" type="text"
                                   :value="user.user_id"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">{{
                                t('COMPONENTS.FORM.USERNAME', {}, {locale: lang})
                            }}</label>
                        <div class="col-lg-9 col-xl-6">
                            <input class="form-control form-control-lg form-control-solid" type="text"
                                   :class="{ 'is-invalid': v$.form.username.$errors.length }"
                                   v-model="v$.form.username.$model"
                                   @change="v$.form.username.$touch()"/>
                            <BaseInputError :errors="v$.form.username.$errors"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-xl-3 col-lg-3 col-form-label">{{
                                t('COMPONENTS.FORM.EMAIL', {}, {locale: lang})
                            }}</label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="input-group input-group-lg input-group-solid">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-lg form-control-solid"
                                       :placeholder="t('COMPONENTS.FORM.EMAIL', {}, {locale: lang})"
                                       :class="{ 'is-invalid': v$.form.email.$errors.length }"
                                       v-model="v$.form.email.$model"
                                       @change="v$.form.email.$touch()"/>
                            </div>
                            <BaseInputError :errors="v$.form.email.$errors"/>
                        </div>
                    </div>
                    <div class="form-group row" v-if="user.email !=null && user.email_verified_at==null">
                        <label class="col-xl-3 col-lg-3 col-form-label">{{
                                t('COMPONENTS.FORM.EMAIL', {}, {locale: lang})
                            }}</label>
                        <div class="col-lg-9 col-xl-6">
                            <button type="button" v-on:click="verifyEmail" class="btn btn-success">
                                {{ t('PAGES.PROFILE.VERIFY_EMAIL', {}, {locale: lang}) }}
                            </button>
                            <span
                                class="form-text text-muted">{{
                                    t('COMPONENTS.FORM.EMAIL_VERIFY_DESCRIPTION', {}, {locale: lang})
                                }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">{{
                                t('COMPONENTS.FORM.LANGUAGE', {}, {locale: lang})
                            }}</label>
                        <div class="col-lg-9 col-xl-6">
                            <select class="form-control form-control-lg form-control-solid"
                                    :class="{ 'is-invalid': v$.form.language.$errors.length }"
                                    v-model="v$.form.language.$model"
                                    @change="v$.form.language.$touch()">
                                <option v-for="item in options.languages" :value="item.value">{{ item.title }}</option>
                            </select>
                            <BaseInputError :errors="v$.form.language.$errors"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label">{{
                                t('COMPONENTS.FORM.TIMEZONE', {}, {locale: lang})
                            }}</label>
                        <div class="col-lg-9 col-xl-6">
                            <select class="form-control form-control-lg form-control-solid"
                                    :class="{ 'is-invalid': v$.form.timezone.$errors.length }"
                                    v-model="v$.form.timezone.$model"
                                    @change="v$.form.timezone.$touch()">
                                <option v-for="item in options.timezones" :value="item.id">{{ item.zone_name }}</option>
                            </select>
                            <BaseInputError :errors="v$.form.timezone.$errors"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import Header from "./base/Header";
import {inject, onMounted, ref} from "vue";
import Validator from "../validator/account-information.validator";
import accountInformationApi from "../api/account-information.api";
import {languageType, timezoneType} from "../../../../core/config/data/option-types";

export default {
    name: "AccountInformation",
    components: {Header},
    emits: ['save'],
    setup() {
        const t = inject('t')
        const lang = inject('lang')
        const route = inject('route')
        const user = inject('user')
        const options = inject('options')
        const language = ref(null)
        const timezone = ref(null)

        user.value.options.forEach((item, index) => {
            if (item.option_key === languageType) language.value = item.option_value
            if (item.option_key === timezoneType) timezone.value = item.option_value
        })

        onMounted(() => {
            if (route.query !== undefined && route.query.email !== undefined && route.query.token !== undefined)
                accountInformationApi.checkEmailVerify({
                    email: route.query.email,
                    token: route.query.token
                })
        })

        const v$ = Validator.init({
            username: user.value.username,
            email: user.value.email,
            language: language.value,
            timezone: timezone.value,
        })

        const save = () => {
            v$.value.$touch()

            if (v$.value.$invalid) return

            accountInformationApi.saveAccountInformation({
                username: v$.value.form.username.$model,
                email: v$.value.form.email.$model,
                language: v$.value.form.language.$model,
                timezone: v$.value.form.timezone.$model
            })
        }

        const verifyEmail = () => {
            accountInformationApi.sendEmailVerify()
        }

        return {
            t,
            lang,
            save,
            verifyEmail,
            user,
            options,
            v$
        }
    }
}
</script>
