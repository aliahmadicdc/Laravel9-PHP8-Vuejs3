<template>
    <div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
        <div class="brand flex-column-auto" id="kt_brand">
            <router-link :to="{name:'dashboard'}" class="brand-logo">
                <img alt="Logo" src="/assets/back/media/logos/logo2.png"/>
            </router-link>
            <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
				<span class="svg-icon svg-icon svg-icon-xl">
                    <svg
                        xmlns="http://www.w3.org/2000/svg" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path
            d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
            fill="#000000" fill-rule="nonzero"
            transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) "/>
        <path
            d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
            fill="#000000" fill-rule="nonzero" opacity="0.3"
            transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) "/>
    </g>
</svg>
                </span>
            </button>
        </div>
        <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
            <div id="kt_aside_menu"
                 class="aside-menu my-4 "
                 data-menu-vertical="1"
                 data-menu-scroll="1" data-menu-dropdown-timeout="500">
                <ul class="menu-nav">
                    <li class="menu-item"
                        :class="route.path===router.resolve({name: 'dashboard'}).href ? 'menu-item-active' : ''"
                        aria-haspopup="true">
                        <router-link :to="{name:'dashboard'}" class="menu-link">
                            <span class="svg-icon menu-icon">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path
            d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
            fill="#000000" fill-rule="nonzero"/>
        <path
            d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
            fill="#000000" opacity="0.3"/>
    </g>
</svg>
                            </span>
                            <span class="menu-text">{{ t('PAGES.BACK.DASHBOARD', {}, {locale: lang}) }}</span>
                        </router-link>
                    </li>
                    <li class="menu-item" :class="[router.resolve({name: 'profile_personalInformation',params:{phoneNumber:user.phone_number}}).href,
                    router.resolve({name: 'profile_accountInformation',params:{phoneNumber:user.phone_number}}).href,
                    router.resolve({name: 'profile_changePassword',params:{phoneNumber:user.phone_number}}).href
                    ,router.resolve({name: 'profile_settings',params:{phoneNumber:user.phone_number}}).href
                    ].includes(route.path) ? 'menu-item-active' : ''"
                        aria-haspopup="true">
                        <router-link :to="{name:'profile', params:{phoneNumber : user.phone_number}}"
                                     class="menu-link">
                            <span class="svg-icon menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
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
                            <span class="menu-text">{{ t('PAGES.BACK.PROFILE', {}, {locale: lang}) }}</span>
                        </router-link>
                    </li>
                    <li class="menu-item"
                        :class="route.path===router.resolve({name: 'notifications'}).href ? 'menu-item-active' : ''"
                        aria-haspopup="true">
                        <router-link :to="{name:'notifications'}"
                                     class="menu-link">
                            <span class="svg-icon menu-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                     width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"></rect>
        <path
            d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z"
            fill="#000000"></path>
        <path
            d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z"
            fill="#000000" opacity="0.3"></path>
    </g>
</svg>
                            </span>
                            <span class="menu-text">{{ t('PAGES.BACK.NOTIFICATIONS', {}, {locale: lang}) }}</span>
                        </router-link>
                    </li>
<!--                    <li class="menu-section">-->
<!--                        <h4 class="menu-text">{{ t('PAGES.BACK.TOOLS', {}, {locale: lang}) }}</h4>-->
<!--                        <i class="menu-icon ki ki-bold-more-hor icon-md"></i>-->
<!--                    </li>-->
<!--                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">-->
<!--                        <a href="javascript:;" class="menu-link menu-toggle">-->
<!--                            <span class="svg-icon menu-icon">-->
<!--                                <svg-->
<!--                                    xmlns="http://www.w3.org/2000/svg"-->
<!--                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">-->
<!--    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
<!--        <rect x="0" y="0" width="24" height="24"/>-->
<!--        <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"/>-->
<!--        <path-->
<!--            d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"-->
<!--            fill="#000000" opacity="0.3"/>-->
<!--    </g>-->
<!--</svg>-->
<!--                            </span>-->
<!--                            <span class="menu-text">بلالبال</span>-->
<!--                            <i class="menu-arrow"></i>-->
<!--                        </a>-->
<!--                        <div class="menu-submenu">-->
<!--                            <i class="menu-arrow"></i>-->
<!--                            <ul class="menu-subnav">-->
<!--                                <li class="menu-item  menu-item-parent" aria-haspopup="true"><span-->
<!--                                    class="menu-link"><span class="menu-text">امکانات</span></span></li>-->
<!--                                <li class="menu-item  menu-item-submenu" aria-haspopup="true"-->
<!--                                    data-menu-toggle="hover"><a href="javascript:;" class="menu-link menu-toggle"><i-->
<!--                                    class="menu-bullet menu-bullet-line"><span></span></i><span-->
<!--                                    class="menu-text">کاربران</span><span class="menu-label"><span-->
<!--                                    class="label label-rounded label-primary">6</span></span><i-->
<!--                                    class="menu-arrow"></i></a>-->
<!--                                    <div class="menu-submenu "><i class="menu-arrow"></i>-->
<!--                                        <ul class="menu-subnav">-->
<!--                                            <li class="menu-item " aria-haspopup="true"><a-->
<!--                                                href="" class="menu-link "><i-->
<!--                                                class="menu-bullet menu-bullet-dot"><span></span></i><span-->
<!--                                                class="menu-text">لیست - پیش فرض</span></a></li>-->
<!--                                        </ul>-->
<!--                                    </div>-->
<!--                                </li>-->
<!--                                <li class="menu-item  menu-item-submenu" aria-haspopup="true"-->
<!--                                    data-menu-toggle="hover"><a href="javascript:;" class="menu-link menu-toggle"><i-->
<!--                                    class="menu-bullet menu-bullet-line"><span></span></i><span-->
<!--                                    class="menu-text">پروفایل</span><i class="menu-arrow"></i></a>-->
<!--                                    <div class="menu-submenu "><i class="menu-arrow"></i>-->
<!--                                        <ul class="menu-subnav">-->
<!--                                            <li class="menu-item  menu-item-submenu" aria-haspopup="true"-->
<!--                                                data-menu-toggle="hover"><a href="javascript:;"-->
<!--                                                                            class="menu-link menu-toggle"><i-->
<!--                                                class="menu-bullet menu-bullet-dot"><span></span></i><span-->
<!--                                                class="menu-text">پروفایل 1</span><i class="menu-arrow"></i></a>-->
<!--                                                <div class="menu-submenu "><i class="menu-arrow"></i>-->
<!--                                                    <ul class="menu-subnav">-->
<!--                                                        <li class="menu-item " aria-haspopup="true"><a-->
<!--                                                            href=""-->
<!--                                                            class="menu-link "><i-->
<!--                                                            class="menu-bullet menu-bullet-line"><span></span></i><span-->
<!--                                                            class="menu-text">بررسی</span></a></li>-->
<!--                                                    </ul>-->
<!--                                                </div>-->
<!--                                            </li>-->
<!--                                            <li class="menu-item " aria-haspopup="true"><a-->
<!--                                                href="" class="menu-link "><i-->
<!--                                                class="menu-bullet menu-bullet-dot"><span></span></i><span-->
<!--                                                class="menu-text">پروفایل 2</span></a></li>-->
<!--                                        </ul>-->
<!--                                    </div>-->
<!--                                </li>-->
<!--                                <li class="menu-item " aria-haspopup="true">-->
<!--                                    <a href="" class="menu-link">-->
<!--                                        <i-->
<!--                                            class="menu-bullet menu-bullet-line"><span></span></i><span-->
<!--                                        class="menu-text">صندوق ورودی</span><span class="menu-label"><span-->
<!--                                        class="label label-danger label-inline">جدید</span></span></a>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </li>-->
<!--                    <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">-->
<!--                        <a href="javascript:;" class="menu-link menu-toggle">-->
<!--                            <span class="svg-icon menu-icon">-->
<!--                                <svg xmlns="http://www.w3.org/2000/svg"-->
<!--                                     width="24px" height="24px" viewBox="0 0 24 24" version="1.1">-->
<!--    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
<!--        <rect x="0" y="0" width="24" height="24"/>-->
<!--        <path-->
<!--            d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"-->
<!--            fill="#000000" opacity="0.3"/>-->
<!--        <path-->
<!--            d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"-->
<!--            fill="#000000"/>-->
<!--    </g>-->
<!--</svg>-->
<!--                            </span>-->
<!--                            <span class="menu-text">فرم ها</span>-->
<!--                            <i class="menu-arrow"></i>-->
<!--                        </a>-->
<!--                        <div class="menu-submenu "><i class="menu-arrow"></i>-->
<!--                            <ul class="menu-subnav">-->
<!--                                <li class="menu-item  menu-item-parent" aria-haspopup="true"><span-->
<!--                                    class="menu-link"><span class="menu-text">فرم ها</span></span></li>-->
<!--                                <li class="menu-item  menu-item-submenu" aria-haspopup="true"-->
<!--                                    data-menu-toggle="hover"><a href="javascript:;" class="menu-link menu-toggle"><i-->
<!--                                    class="menu-bullet menu-bullet-dot"><span></span></i><span-->
<!--                                    class="menu-text">کنترل های فرم</span><i class="menu-arrow"></i></a>-->
<!--                                    <div class="menu-submenu "><i class="menu-arrow"></i>-->
<!--                                        <ul class="menu-subnav">-->
<!--                                            <li class="menu-item " aria-haspopup="true"><a-->
<!--                                                href="" class="menu-link "><i-->
<!--                                                class="menu-bullet menu-bullet-dot"><span></span></i><span-->
<!--                                                class="menu-text">اینپوت های پایه</span></a></li>-->
<!--                                        </ul>-->
<!--                                    </div>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </li>-->
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import {inject} from "vue"

export default {
    name: "RightMenu",
    setup() {
        const t = inject('t')
        const lang = inject('lang')
        const user = inject('user')
        const route = inject('route')
        const router = inject('router')

        return {
            user,
            t,
            lang,
            route,
            router
        }
    }
}
</script>
