<template>
    <Register/>
</template>

<script>
import Register from "./components/Register"
import {useStore} from "vuex"
import {useI18n} from "vue-i18n"
import {computed, provide} from "vue"

export default {
    name: "RegisterModule",
    components: {Register}
}
</script>
