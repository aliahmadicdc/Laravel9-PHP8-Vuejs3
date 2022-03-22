<template>

    <RightMenu/>

    <PanelHeader/>

    <div class="container mt-5">

        <router-view v-if="isReady"/>

    </div>

    <PanelFooter/>

    <BaseLoading/>

</template>

<script>
import RightMenu from "./baseComponents/RightMenu"
import PanelHeader from "./baseComponents/PanelHeader"
import PanelFooter from "./baseComponents/PanelFooter"
import dashboardApi from "./dashboard/api/dashboard.api"

import {useI18n} from "vue-i18n"
import {useStore} from "vuex"
import {computed, onMounted, provide} from "vue"
import {useRoute, useRouter} from "vue-router"

export default {
    name: "App",
    components: {
        PanelFooter,
        PanelHeader,
        RightMenu,
    },
    setup() {
        const {t, locale} = useI18n()
        const store = useStore();
        const lang = computed(() => store.state.all.lang)
        const user = computed(() => store.state.all.user)
        const route = useRoute()
        const router = useRouter()

        window.t = t
        window.store = store
        window.lang = lang
        window.user = user
        window.route = route
        window.router = router

        provide("t", t)
        provide("locale", locale)
        provide("store", store)
        provide("lang", lang)
        provide("user", user)
        provide("route", route)
        provide("router", router)

        const isReady = computed(() => store.state.dashboard.isReady)
        const isAuth = computed(() => store.state.all.isAuth)

        const getUserInfo = () => {
            dashboardApi.userInfo()
        };

        onMounted(() => {
            if (isAuth.value == true || isAuth.value == "true") getUserInfo()
        });

        return {
            isReady,
        };
    },
};
</script>
