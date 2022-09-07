<template>
    <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
        <div
            class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
            <div class="text-dark order-2 order-md-1">
                <span class="text-muted font-weight-bold mr-2">2022&copy;</span>
                <a href="https://citydevelopers.ir" target="_blank"
                   class="text-dark-75 text-hover-primary">{{ t('PAGES.BACK.CITY_DEVELOPERS', {}, {locale: lang}) }}</a>
            </div>
            <div class="nav nav-dark">
                <a href="/about" target="_blank"
                   class="nav-link pl-0 pr-5">{{ t('PAGES.BACK.ABOUT_US', {}, {locale: lang}) }}</a>
                <a href="/contact" target="_blank"
                   class="nav-link pl-0 pr-5">{{ t('PAGES.BACK.CONTACT_US', {}, {locale: lang}) }}</a>
                <a href="/rules" target="_blank"
                   class="nav-link pl-0 pr-5">{{ t('PAGES.BACK.RULES', {}, {locale: lang}) }}</a>
            </div>
        </div>
    </div>
</template>

<script>
import {inject} from "vue";

export default {
    name: "Footer",
    setup() {
        const t = inject('t')
        const lang = inject('lang')

        return {
            t,
            lang
        }
    }
}
</script>
