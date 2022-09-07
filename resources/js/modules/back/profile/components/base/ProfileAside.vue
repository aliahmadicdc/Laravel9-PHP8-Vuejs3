<template>
    <div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">
        <div class="card card-custom card-stretch">
            <div class="card-body pt-4">
                <div class="d-flex align-items-center">
                    <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                        <img class="symbol-label" loading="lazy"
                             :src="user.image ? user.image.image_full_path : '/assets/back/media/profile.png'"
                             :alt="user.image ? user.image.alt : ''">
                        <i class="symbol-badge bg-success"></i>
                    </div>
                    <div>
                        <a class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">
                            {{ user.name }}
                        </a>
                        <div class="text-muted">
                            {{ user.roles[0].title }}
                        </div>
                        <div class="mt-2">

                            <BaseLogoutButton/>

                        </div>
                    </div>
                </div>
                <div class="py-9">
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span class="font-weight-bold mr-2">{{ t('AUTH.LOGIN.EMAIL', {}, {locale: lang}) }}</span>
                        <a :href="'mailto:' + user.email" class="text-muted text-hover-primary">{{ user.email }}</a>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-2">
                        <span
                            class="font-weight-bold mr-2">{{ t('AUTH.LOGIN.PHONE_NUMBER', {}, {locale: lang}) }}</span>
                        <a :href="'tel:' + user.phone_number"
                           class="text-muted text-hover-primary">{{ user.phone_number }}</a>
                    </div>
                </div>
                <div class="separator separator-dashed mb-5"></div>
                <div class="navi navi-bold navi-hover navi-active navi-link-rounded">
                    <div class="navi-item mb-2">
                        <router-link :to="{name : 'profile_personalInformation'}" active-class="active"
                                     exact-active-class="active"
                                     class="navi-link py-4">
                            <span class="navi-icon mr-2">
                                <span class="svg-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                         viewBox="0 0 24 24"
                                         version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <polygon points="0 0 24 0 24 24 0 24"/>
                <path
                    d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                    fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                <path
                    d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                    fill="#000000" fill-rule="nonzero"/>
            </g>
                                    </svg>
                                </span>
                            </span>
                            <span class="navi-text font-size-lg">
                                {{ t('PAGES.PROFILE.PERSONAL', {}, {locale: lang}) }}
                            </span>
                        </router-link>
                    </div>
                    <div class="navi-item mb-2">
                        <router-link :to="{name : 'profile_accountInformation'}" active-class="active"
                                     exact-active-class="active" class="navi-link py-4">
                            <span class="navi-icon mr-2">
                                <span class="svg-icon">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg" width="24px"
                                        height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path
                                                    d="M10,4 L21,4 C21.5522847,4 22,4.44771525 22,5 L22,7 C22,7.55228475 21.5522847,8 21,8 L10,8 C9.44771525,8 9,7.55228475 9,7 L9,5 C9,4.44771525 9.44771525,4 10,4 Z M10,10 L21,10 C21.5522847,10 22,10.4477153 22,11 L22,13 C22,13.5522847 21.5522847,14 21,14 L10,14 C9.44771525,14 9,13.5522847 9,13 L9,11 C9,10.4477153 9.44771525,10 10,10 Z M10,16 L21,16 C21.5522847,16 22,16.4477153 22,17 L22,19 C22,19.5522847 21.5522847,20 21,20 L10,20 C9.44771525,20 9,19.5522847 9,19 L9,17 C9,16.4477153 9.44771525,16 10,16 Z"
                                                    fill="#000000"></path>
                                                <rect fill="#000000" opacity="0.3" x="2" y="4" width="5" height="16"
                                                      rx="1"></rect>
                                            </g>
        </svg>
                                </span>
                            </span>
                            <span class="navi-text font-size-lg">
                                {{ t('PAGES.PROFILE.INFORMATION', {}, {locale: lang}) }}
                            </span>
                        </router-link>
                    </div>
                    <div class="navi-item mb-2">
                        <router-link :to="{name : 'profile_changePassword'}" active-class="active"
                                     exact-active-class="active" class="navi-link py-4">
                            <span class="navi-icon mr-2">
                        <span class="svg-icon">
                            <svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px"
                                height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path
            d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
            fill="#000000" opacity="0.3"/>
        <path
            d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z"
            fill="#000000" opacity="0.3"/>
        <path
            d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z"
            fill="#000000" opacity="0.3"/>
    </g>
</svg>
                        </span>
                            </span>
                            <span class="navi-text font-size-lg">
                                {{ t('PAGES.PROFILE.CHANGE_PASSWORD', {}, {locale: lang}) }}
                            </span>
                        </router-link>
                    </div>
                    <div class="navi-item mb-2">
                        <router-link :to="{name : 'profile_settings'}" active-class="active" exact-active-class="active"
                                     class="navi-link py-4">
                            <span class="navi-icon mr-2">
                        <span class="svg-icon">
                            <svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px"
                                height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path
                                                    d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                    fill="#000000"></path>
                                                <path
                                                    d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                    fill="#000000" opacity="0.3"></path>
                                            </g>
</svg>
                        </span>
                            </span>
                            <span class="navi-text font-size-lg">
                                {{ t('PAGES.PROFILE.SETTINGS', {}, {locale: lang}) }}
                            </span>
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {computed, inject} from "vue";

export default {
    name: "ProfileAside",
    setup() {
        const t = inject('t')
        const lang = inject('lang')
        const user = inject('user')

        return {
            user,
            t,
            lang
        }
    }
}
</script>
