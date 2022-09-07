<template>
    <section class="padding-100-0 position-relative">
        <div class="container">
            <div class="page-404-styles text-center">
                <img src="/assets/back/media/404.png" alt="404">
                <p class="mt-5">{{ t('PAGES.BACK.NOT_FOUND', {}, {locale: lang}) }}</p>
                <router-link :to="{name:'dashboard'}" class="btn-order-default-nuhost mt-2">
                    {{ t('PAGES.BACK.DASHBOARD', {}, {locale: lang}) }}
                </router-link>
            </div>
        </div>
    </section>
</template>

<script>
import {inject} from "vue";

export default {
    name: "404Module",
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
