<template>
    <div id="kt_quick_user" class="offcanvas offcanvas-right p-10" v-if="user!=null">
        <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
            <h3 class="font-weight-bold m-0">
                {{ t('PAGES.BACK.USER_AREA', {}, {locale: lang}) }}
            </h3>
            <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
                <i class="ki ki-close icon-xs text-muted"></i>
            </a>
        </div>
        <div class="offcanvas-content pr-5 mr-n5">
            <div class="d-flex align-items-center mt-5">
                <div class="symbol symbol-100 mr-5">
                    <img class="symbol-label" loading="lazy"
                         :src="user.image ? user.image.image_full_path : '/assets/back/media/profile.png'"
                         :alt="user.image ? user.image.alt : ''">
                    <i class="symbol-badge bg-success"></i>
                </div>
                <div class="d-flex flex-column">
                    <span class="font-weight-bold font-size-h5 text-dark-75">
                        {{ user.name }}
                    </span>
                    <div class="text-muted mt-1">
                        {{ user.roles[0].title }}
                    </div>
                    <div class="navi mt-2">
                        <a :href="'tel:' + user.phone_number" class="navi-item">
                            <span class="navi-link p-0 pb-2">
                                <span class="navi-icon mr-1">
                                    <span class="svg-icon svg-icon-lg svg-icon-primary">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink"
                                            width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
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
                                <span class="navi-text text-muted text-hover-primary">{{ user.phone_number }}</span>
                            </span>
                        </a>

                        <BaseLogoutButton/>

                    </div>
                </div>
            </div>
            <div class="separator separator-dashed mt-8 mb-5"></div>
            <div class="navi navi-spacer-x-0 p-0">

                <router-link :to="{ name:'profile',params:{phoneNumber:user.phone_number}}" class="navi-item">
                    <div class="navi-link">
                        <div class="symbol symbol-40 bg-light mr-3">
                            <div class="symbol-label">
                                <span class="svg-icon svg-icon-md svg-icon-success">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
       <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon
           points="0 0 24 0 24 24 0 24"></polygon><path
           d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
           fill="#000000" fill-rule="nonzero" opacity="0.3"></path><path
           d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
           fill="#000000" fill-rule="nonzero"></path></g>
    </svg>
                                </span>
                            </div>
                        </div>
                        <div class="navi-text">
                            <div class="font-weight-bold">
                                {{ t('PAGES.BACK.PROFILE', {}, {locale: lang}) }}
                            </div>
                            <div class="text-muted">
                                {{ t('PAGES.BACK.PROFILE_SETTINGS', {}, {locale: lang}) }}
                            </div>
                        </div>
                    </div>
                </router-link>

                <router-link :to="{ name:'notifications'}" class="navi-item">
                    <div class="navi-link">
                        <div class="symbol symbol-40 bg-light mr-3">
                            <div class="symbol-label">
                               <span class="svg-icon svg-icon-md svg-icon-warning">
                                   <svg
                                       xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                       width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24"
                                                                                height="24"></rect><path
            d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z"
            fill="#000000"></path><path
            d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z"
            fill="#000000" opacity="0.3"></path></g>
    </svg>
                               </span>
                            </div>
                        </div>
                        <div class="navi-text">
                            <div class="font-weight-bold">
                                {{ t('PAGES.BACK.NOTIFICATIONS', {}, {locale: lang}) }}
                            </div>
                            <div class="text-muted">
                                {{ t('PAGES.BACK.NOTIFICATIONS_DESCRIPTION', {}, {locale: lang}) }}
                            </div>
                        </div>
                    </div>
                </router-link>

            </div>
            <div class="separator separator-dashed my-7"></div>
        </div>
    </div>
</template>
<script>
import {inject} from "vue"

export default {
    name: "UserPanel",
    setup() {
        const t = inject('t')
        const lang = inject('lang')
        const user = inject('user')

        return {
            t,
            lang,
            user
        }
    },
}
</script>
