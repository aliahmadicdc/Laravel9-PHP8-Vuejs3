<template>
    <div id="kt_header" class="header header-fixed">
        <div class=" container-fluid  d-flex align-items-stretch justify-content-between">
            <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                <div id="kt_header_menu"
                     class="header-menu header-menu-mobile header-menu-layout-default">
                    <ul class="menu-nav">
                        <li class="menu-item menu-item-submenu menu-item-rel"
                            data-menu-toggle="click" aria-haspopup="true">
                            <a href="javascript:;" class="menu-link menu-toggle">
                                <span class="menu-text">{{ t('PAGES.BACK.USER_AREA', {}, {locale: lang}) }}</span>
                                <i class="menu-arrow"></i>
                            </a>
                            <div class="menu-submenu menu-submenu-classic menu-submenu-left">
                                <ul class="menu-subnav">
                                    <li class="menu-item" aria-haspopup="true">
                                        <router-link :to="{name:'dashboard'}" class="menu-link">
                      <span class="svg-icon menu-icon">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg" width="24px"
                                            height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon
                                                points="0 0 24 0 24 24 0 24"></polygon><path
                                                d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                                fill="#000000" fill-rule="nonzero"></path><path
                                                d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                                fill="#000000" opacity="0.3"></path></g>
                                        </svg>
                                      </span>
                                            <span class="menu-text">{{
                                                    t('PAGES.BACK.DASHBOARD', {}, {locale: lang})
                                                }}</span>
                                        </router-link>
                                    </li>
                                    <li class="menu-item menu-item-submenu" data-menu-toggle="hover"
                                        aria-haspopup="true">
                                        <a href="javascript:;" class="menu-link menu-toggle">
                      <span class="svg-icon menu-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1">
                          <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon
                              points="0 0 24 0 24 24 0 24"></polygon><path
                              d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                              fill="#000000" fill-rule="nonzero" opacity="0.3"></path><path
                              d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                              fill="#000000" fill-rule="nonzero"></path></g>
                        </svg>
                      </span>
                                            <span class="menu-text">{{
                                                    t('PAGES.BACK.ACCOUNT', {}, {locale: lang})
                                                }}</span>
                                            <i class="menu-arrow"></i>
                                        </a>
                                        <div class="menu-submenu menu-submenu-classic menu-submenu-right">
                                            <ul class="menu-subnav">
                                                <li class="menu-item" aria-haspopup="true">
                                                    <router-link v-if="user"
                                                                 :to="{name:'profile',params:{phoneNumber : user.phone_number}}"
                                                                 class="menu-link">
                                                        <i class="menu-bullet menu-bullet-dot">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">{{
                                                                t('PAGES.BACK.PROFILE', {}, {locale: lang})
                                                            }}</span>
                                                    </router-link>
                                                </li>
                                                <li class="menu-item" aria-haspopup="true">
                                                    <router-link :to="{name:'notifications'}" class="menu-link">
                                                        <i class="menu-bullet menu-bullet-dot">
                                                            <span></span>
                                                        </i>
                                                        <span class="menu-text">{{
                                                                t('PAGES.BACK.NOTIFICATIONS', {}, {locale: lang})
                                                            }}</span>
                                                    </router-link>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
<!--                        <li class="menu-item menu-item-submenu" data-menu-toggle="click" aria-haspopup="true">-->
<!--                            <a href="javascript:;" class="menu-link menu-toggle">-->
<!--                                <span class="menu-text">امکانات</span>-->
<!--                                <i class="menu-arrow"></i>-->
<!--                            </a>-->
<!--                            <div class="menu-submenu menu-submenu-fixed menu-submenu-left" style="width:1000px">-->
<!--                                <div class="menu-subnav">-->
<!--                                    <ul class="menu-content">-->
<!--                                        <li class="menu-item">-->
<!--                                            <h3 class="menu-heading menu-toggle">-->
<!--                                                <i class="menu-bullet menu-bullet-dot">-->
<!--                                                    <span></span>-->
<!--                                                </i>-->
<!--                                                <span class="menu-text">گزارش کارها</span>-->
<!--                                                <i class="menu-arrow"></i>-->
<!--                                            </h3>-->
<!--                                            <ul class="menu-inner">-->
<!--                                                <li class="menu-item" aria-haspopup="true">-->
<!--                                                    <a href="javascript:;" class="menu-link">-->
<!--                            <span class="svg-icon menu-icon">-->
<!--                              <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"-->
<!--                                   version="1.1">-->
<!--                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">-->
<!--        <rect x="0" y="0" width="24" height="24"/>-->
<!--        <path-->
<!--            d="M5.84026576,8 L18.1597342,8 C19.1999115,8 20.0664437,8.79732479 20.1528258,9.83390904 L20.8194924,17.833909 C20.9112219,18.9346631 20.0932459,19.901362 18.9924919,19.9930915 C18.9372479,19.9976952 18.8818364,20 18.8264009,20 L5.1735991,20 C4.0690296,20 3.1735991,19.1045695 3.1735991,18 C3.1735991,17.9445645 3.17590391,17.889153 3.18050758,17.833909 L3.84717425,9.83390904 C3.93355627,8.79732479 4.80008849,8 5.84026576,8 Z M10.5,10 C10.2238576,10 10,10.2238576 10,10.5 L10,11.5 C10,11.7761424 10.2238576,12 10.5,12 L13.5,12 C13.7761424,12 14,11.7761424 14,11.5 L14,10.5 C14,10.2238576 13.7761424,10 13.5,10 L10.5,10 Z"-->
<!--            fill="#000000"/>-->
<!--        <path-->
<!--            d="M10,8 L8,8 L8,7 C8,5.34314575 9.34314575,4 11,4 L13,4 C14.6568542,4 16,5.34314575 16,7 L16,8 L14,8 L14,7 C14,6.44771525 13.5522847,6 13,6 L11,6 C10.4477153,6 10,6.44771525 10,7 L10,8 Z"-->
<!--            fill="#000000" fill-rule="nonzero" opacity="0.3"/>-->
<!--    </g>-->
<!--                              </svg>-->
<!--                            </span>-->
<!--                                                        <span class="menu-text">آخرین کارهای</span>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                            </ul>-->
<!--                                        </li>-->
<!--                                        <li class="menu-item">-->
<!--                                            <h3 class="menu-heading menu-toggle">-->
<!--                                                <i class="menu-bullet menu-bullet-dot">-->
<!--                                                    <span></span>-->
<!--                                                </i>-->
<!--                                                <span class="menu-text">مدیریت نیروی انسانی</span>-->
<!--                                                <i class="menu-arrow"></i>-->
<!--                                            </h3>-->
<!--                                            <ul class="menu-inner">-->
<!--                                                <li class="menu-item" aria-haspopup="true">-->
<!--                                                    <a href="javascript:;" class="menu-link">-->
<!--                                                        <i class="menu-bullet menu-bullet-dot">-->
<!--                                                            <span></span>-->
<!--                                                        </i>-->
<!--                                                        <span class="menu-text">مدیریت ارشد</span>-->
<!--                                                    </a>-->
<!--                                                </li>-->
<!--                                            </ul>-->
<!--                                        </li>-->
<!--                                    </ul>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </li>-->
                    </ul>
                </div>
            </div>
            <div class="topbar">

                <NotificationBar/>

                <QuickAccess/>

                <div class="topbar-item">
                    <div
                        class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2"
                        id="kt_quick_user_toggle">
                                <span
                                    class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">{{
                                        t('PAGES.BACK.HELLO', {}, {locale: lang})
                                    }}</span>
                        <span v-if="user"
                              class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{
                                user.name
                            }}</span>
                        <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
		                        <span class="symbol-label font-size-h5 font-weight-bold">U</span>
		                    </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {computed, inject} from "vue"
import * as alertTypes from "../../../../core/config/data/alert-types"
import NotificationBar from "./NotificationBar";
import QuickAccess from "./QuickAccess";

export default {
    name: "Header",
    components: {QuickAccess, NotificationBar},
    setup() {
        const t = inject('t')
        const lang = inject('lang')
        const user = inject('user')

        return {
            user,
            t,
            lang,
            alertTypes
        }
    }
}
</script>
