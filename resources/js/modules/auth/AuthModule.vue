<template>
    <div class="d-flex flex-column flex-root h-100vh">
        <div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-row-fluid bg-white" id="kt_login">
            <div class="login-aside d-flex flex-row-auto bgi-size-cover bgi-no-repeat p-10 p-lg-10 aside-custom"
                 style="background-image: url('/assets/back/media/bg/bg-4.jpg');">
                <div class="d-flex flex-row-fluid flex-column justify-content-between">
                    <router-link :to="{name:'panel'}" class="flex-column-auto mt-5 pb-lg-0 pb-10">
                        <img src="/assets/back/media/logos/logo.png" class="max-h-70px"
                             alt="{{ t('AUTH.AUTH.LOGO_ALT', {}, {locale: lang}) }}">
                    </router-link>
                    <div class="flex-column-fluid d-flex flex-column justify-content-center">
                        <h3 class="font-size-h1 mb-5 text-white">{{
                                t('AUTH.AUTH.WELCOME_TITLE', {}, {locale: lang})
                            }}</h3>
                        <p class="font-weight-lighter text-white opacity-80">
                            {{ t('AUTH.AUTH.WELCOME', {}, {locale: lang}) }}
                        </p>
                    </div>
                    <div class="d-none flex-column-auto d-lg-flex justify-content-between mt-10">
                        <div class="opacity-70 font-weight-bold	text-white">
                            {{ t('AUTH.AUTH.COPY_RIGHT', {}, {locale: lang}) }}
                        </div>
                        <div class="d-flex">
                            <a href="https://didebanco.com/about-us" target="_blank"
                               class="text-white ml-10">{{ t('AUTH.AUTH.ABOUT', {}, {locale: lang}) }}</a>
                            <a href="https://didebanco.com/contact-us" target="_blank"
                               class="text-white ml-10">{{ t('AUTH.AUTH.CONTACT', {}, {locale: lang}) }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-row-fluid d-flex flex-column position-relative p-7 overflow-hidden">
                <div class="d-flex flex-column-fluid flex-center mt-30 mt-lg-0" id="app">

                    <router-view></router-view>

                </div>
                <div
                    class="d-flex d-lg-none flex-column-auto flex-column flex-sm-row justify-content-between align-items-center mt-5 p-5">
                    <div class="text-dark-50 font-weight-bold order-2 order-sm-1 my-2">
                        {{ t('AUTH.AUTH.COPY_RIGHT', {}, {locale: lang}) }}
                    </div>
                    <div class="d-flex order-1 order-sm-2 my-2">
                        <a href="https://didebanco.com/about-us" target="_blank"
                           class="text-dark-75 text-hover-primary ml-4">{{
                                t('AUTH.AUTH.ABOUT', {}, {locale: lang})
                            }}</a>
                        <a href="https://didebanco.com/contact-us" target="_blank"
                           class="text-dark-75 text-hover-primary ml-4">{{
                                t('AUTH.AUTH.CONTACT', {}, {locale: lang})
                            }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <BaseMessages/>
    <BaseLoading/>

</template>

<script>

import {inject} from "vue";

export default {
    name: "authModule",
    setup() {
        const t = inject('t')
        const lang = inject('lang')

        return {
            t,
            lang,
        };
    },
}
</script>
