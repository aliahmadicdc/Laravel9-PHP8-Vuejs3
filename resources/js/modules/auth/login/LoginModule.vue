<template>
    <Login v-if="!need2FA"/>

    <TwoFactorAuthentication v-if="need2FA"/>
</template>

<script>
import Login from "./components/Login"
import TwoFactorAuthentication from "./components/TwoFactorAuthentication";
import {computed, inject} from "vue";

export default {
    name: "LoginModule",
    components: {TwoFactorAuthentication, Login},
    setup() {
        const store = inject('store')

        const need2FA = computed(() => store.state.login.needTwoFactorAuthentication)

        return {
            need2FA,
        }
    }
}
</script>
