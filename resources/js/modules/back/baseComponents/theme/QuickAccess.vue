<template>
    <div class="dropdown">
        <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
            <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1">
                <span class="svg-icon svg-icon-xl svg-icon-primary">
                    <svg
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
<rect x="0" y="0" width="24" height="24"/>
<rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"/>
<rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"/>
<rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"/>
<rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"/>
</g>
</svg>
                </span>
            </div>
        </div>
        <div
            class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
            <div
                class="d-flex flex-column flex-center py-10 bgi-size-cover bgi-no-repeat rounded-top">
                <h4 class="font-weight-bold">
                    {{ t('PAGES.BACK.QUICK_ACCESS', {}, {locale: lang}) }}
                </h4>
            </div>
            <div class="row row-paddingless">
                <div class="col-6">
                    <router-link :to="{name:'profile', params:{phoneNumber : user.phone_number}}"
                                 class="d-block py-10 px-5 text-center bg-hover-light border-right border-bottom">
                        <span class="svg-icon svg-icon-3x svg-icon-success">
                            <svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px"
                                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon
                    points="0 0 24 0 24 24 0 24"></polygon><path
                    d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                    fill="#000000" fill-rule="nonzero" opacity="0.3"></path><path
                    d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                    fill="#000000" fill-rule="nonzero"></path></g>
            </svg>
                        </span>
                        <span
                            class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">{{
                                t('PAGES.BACK.PROFILE', {}, {locale: lang})
                            }}</span>
                    </router-link>
                </div>
                <div class="col-6">
                    <router-link :to="{name:'dashboard'}"
                                 class="d-block py-10 px-5 text-center bg-hover-light border-bottom">
                        <span class="svg-icon svg-icon-3x svg-icon-success">
                            <svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px"
                                height="24px" viewBox="0 0 24 24" version="1.1">
               <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon
                   points="0 0 24 0 24 24 0 24"></polygon><path
                   d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                   fill="#000000" fill-rule="nonzero"></path><path
                   d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                   fill="#000000" opacity="0.3"></path></g>
            </svg>
                        </span>
                        <span
                            class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">{{
                                t('PAGES.BACK.DASHBOARD', {}, {locale: lang})
                            }}</span>
                    </router-link>
                </div>
                <div class="col-6">
                    <router-link :to="{name:'notifications'}"
                                 class="d-block py-10 px-5 text-center bg-hover-light border-right">
                        <span class="svg-icon svg-icon-3x svg-icon-success">
                            <svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px"
                                height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24"
                                                                                        height="24"></rect><path
                    d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z"
                    fill="#000000"></path><path
                    d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z"
                    fill="#000000" opacity="0.3"></path></g>
            </svg>
                        </span>
                        <span
                            class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">{{
                                t('PAGES.BACK.NOTIFICATIONS', {}, {locale: lang})
                            }}</span>
                    </router-link>
                </div>
                <div class="col-6">
                    <router-link :to="{name : 'profile_changePassword',params:{phoneNumber : user.phone_number}}" class="d-block py-10 px-5 text-center bg-hover-light">
            <span class="svg-icon svg-icon-3x svg-icon-success">
                <svg
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
   <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"></path><path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="#000000" opacity="0.3"></path><path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="#000000" opacity="0.3"></path></g>
</svg>
            </span>
                        <span
                            class="d-block text-dark-75 font-weight-bold font-size-h6 mt-2 mb-1">{{
                                t('PAGES.BACK.CHANGE_PASSWORD', {}, {locale: lang})
                            }}</span>
                    </router-link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {computed, inject} from "vue";

export default {
    name: "QuickAccess",
    setup() {
        const t = inject('t')
        const lang = inject('lang')
        const user = inject('user')

        return {
            t,
            lang,
            user
        }
    }
}
</script>
