<template>
    <router-view/>
</template>

<script>
import {useI18n} from "vue-i18n";
import {useStore} from "vuex";
import {computed, provide} from "vue";
import {useRoute, useRouter} from "vue-router";

export default {
    name: "App",
    setup() {
        const {t, locale} = useI18n();
        const store = useStore();
        const lang = computed(() => store.state.all.lang);
        const user = computed(() => store.state.all.user);
        const options = computed(() => store.state.all.options);
        const route = useRoute();
        const router = useRouter();

        window.t = t;
        window.store = store;
        window.lang = lang;
        window.user = user;
        window.options = options;
        window.route = route;
        window.router = router;

        provide("t", t);
        provide("locale", locale);
        provide("store", store);
        provide("lang", lang);
        provide("user", user);
        provide("options", options);
        provide("route", route);
        provide("router", router);

        return {};
    },
};
</script>
