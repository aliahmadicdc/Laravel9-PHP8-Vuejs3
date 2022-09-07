<template>
    <div class="flex-row-fluid ml-lg-8">
        <div class="card card-custom card-stretch">

            <Header :title="t('PAGES.PROFILE.PERSONAL', {}, {locale: lang})"
                    :description="t('PAGES.PROFILE.PERSONAL_DESCRIPTION', {}, {locale: lang})"
                    :buttons="[
                        {title:t('COMPONENTS.BUTTON.SAVE', {}, {locale: lang}),event:'save'}
                        ]" @save="save"/>

            <form class="form">
                <div class="card-body">
                    <div class="row">
                        <label class="col-xl-3"></label>
                        <div class="col-lg-9 col-xl-6">
                            <h5 class="font-weight-bold mb-6">{{ t('PAGES.PROFILE.PERSONAL', {}, {locale: lang}) }}</h5>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label text-right">{{
                                t('COMPONENTS.FORM.AVATAR', {}, {locale: lang})
                            }}</label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="image-input image-input-outline" id="kt_profile_avatar">
                                <img class="image-input-wrapper" loading="lazy"
                                     :src="user.image?user.image.image_full_path:'/assets/back/media/profile.png' ">
                                <label
                                    class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                    data-action="change" data-toggle="tooltip" title=""
                                    :data-original-title="t('COMPONENTS.FORM.CHANGE_AVATAR', {}, {locale: lang})">
                                    <i class="fa fa-pen icon-sm text-muted"></i>
                                    <input type="file" name="profile_avatar" accept=".jpg, .jpeg" ref="input"
                                           v-on:change="selectProfileImage"/>
                                    <input type="hidden" name="profile_avatar_remove"/>
                                </label>

                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                      data-action="cancel" data-toggle="tooltip"
                                      :title="t('COMPONENTS.FORM.CANCEL_AVATAR', {}, {locale: lang})">
                                    <i class="ki ki-bold-close icon-xs text-muted"></i>
                                </span>

                                <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                      data-action="remove" data-toggle="tooltip"
                                      :title="t('COMPONENTS.FORM.DELETE_AVATAR', {}, {locale: lang})">
                                    <i class="ki ki-bold-close icon-xs text-muted" v-on:click="deleteProfileImage"></i>
                                </span>
                            </div>
                            <span
                                class="form-text text-muted">{{
                                    t('COMPONENTS.FORM.EXE_AVATAR', {}, {locale: lang})
                                }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label text-right">{{
                                t('COMPONENTS.FORM.NAME', {}, {locale: lang})
                            }}</label>
                        <div class="col-lg-9 col-xl-6">
                            <input class="form-control form-control-lg form-control-solid" type="text"
                                   :class="{ 'is-invalid': v$.form.name.$errors.length }"
                                   v-model="v$.form.name.$model"
                                   @change="v$.form.name.$touch()"/>
                            <BaseInputError :errors="v$.form.name.$errors"/>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-xl-3"></label>
                        <div class="col-lg-9 col-xl-6">
                            <h5 class="font-weight-bold mt-10 mb-6">
                                {{ t('PAGES.PROFILE.CONTACT_INFORMATION', {}, {locale: lang}) }}</h5>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label text-right">{{
                                t('COMPONENTS.FORM.PHONE_NUMBER', {}, {locale: lang})
                            }}</label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="input-group input-group-lg input-group-solid">
                                <div class="input-group-prepend"><span class="input-group-text"><i
                                    class="la la-phone"></i></span></div>
                                <input disabled type="text" class="form-control form-control-lg form-control-solid"
                                       :value="user.phone_number"
                                       :placeholder="t('COMPONENTS.FORM.PHONE_NUMBER', {}, {locale: lang})"/>
                            </div>
                            <span
                                class="form-text text-muted">{{
                                    t('COMPONENTS.FORM.PHONE_NUMBER_DESCRIPTION', {}, {locale: lang})
                                }}</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label
                            class="col-xl-3 col-lg-3 col-form-label text-right">{{
                                t('COMPONENTS.FORM.EMAIL', {}, {locale: lang})
                            }}</label>
                        <div class="col-lg-9 col-xl-6">
                            <div class="input-group input-group-lg input-group-solid">
                                <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span>
                                </div>
                                <input disabled type="text" class="form-control form-control-lg form-control-solid"
                                       :value="user.email"
                                       :placeholder="t('COMPONENTS.FORM.EMAIL', {}, {locale: lang})"/>
                            </div>
                            <span
                                class="form-text text-muted">{{
                                    t('COMPONENTS.FORM.EMAIL_DESCRIPTION', {}, {locale: lang})
                                }}</span>
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
import Validator from "../validator/personal-information.validator";
import personalInformationApi from "../api/personal-information.api";
import profileImageApi from "../api/profile-image.api";

export default {
    name: "PersonalInformation",
    components: {Header},
    emits: ['save'],
    setup() {
        const t = inject('t')
        const lang = inject('lang')
        const user = inject('user')
        const input = ref(null)

        const v$ = Validator.init({
            name: user.value.name
        })

        const save = () => {
            v$.value.$touch()

            if (v$.value.$invalid) return

            personalInformationApi.savePersonalInformation({
                name: v$.value.form.name.$model
            })
        }

        const selectProfileImage = () => {
            let data = new FormData();
            data.append('image', input.value.files[0])

            profileImageApi.saveProfileImage(data)
        }

        const deleteProfileImage = () => {
            if (confirm(window.t('PAGES.PROFILE.SURE_DELETE_IMAGE', {locale: window.lang})))
                profileImageApi.deleteProfileImage()
        }

        return {
            t,
            lang,
            save,
            selectProfileImage,
            deleteProfileImage,
            user,
            v$,
            input,
        }
    }
}
</script>
