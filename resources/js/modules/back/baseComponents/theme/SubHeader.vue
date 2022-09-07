<template>
    <div class="subheader py-2 py-lg-6 subheader-solid " id="kt_subheader">
        <div
            class="container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <div class="d-flex align-items-center flex-wrap mr-1">
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <router-link :to="{name:'dashboard'}">
                        <h5 class="text-dark font-weight-bold my-1 mr-5">
                            {{ t('PAGES.BACK.PANEL', {}, {locale: lang}) }}</h5>
                    </router-link>
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <span v-if="route.name" class="text-muted">
                                {{ t(`PAGES.ROUTES.${route.name}`, {}, {locale: lang}) }}
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import {inject} from "vue";

export default {
    name: "SubHeader",
    setup() {
        const t = inject('t')
        const lang = inject('lang')
        const route = inject('route')

        return {
            t,
            lang,
            route
        }
    }
}
</script>
