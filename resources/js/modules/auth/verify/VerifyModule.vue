<template>
    <Verify/>
</template>

<script>
import Verify from "./components/Verify"
import {useStore} from "vuex"
import {useI18n} from "vue-i18n"
import {computed, provide} from "vue"

export default {
    name: "VerifyModule",
    components: {Verify},
    setup() {
        const {t, locale} = useI18n()
        const store = useStore()
        const lang = computed(() => store.state.all.lang)

        window.t = t
        window.store = store
        window.lang = lang

        provide('t', t)
        provide('locale', locale)
        provide('store', store)
        provide('lang', lang)
    }
}
</script>
