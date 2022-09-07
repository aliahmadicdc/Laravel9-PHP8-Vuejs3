<template>
    <PasswordReset v-if="isReady"/>
</template>

<script>
import PasswordReset from "./components/PasswordReset"
import passwordResetApi from "./api/passwordReset.api";
import {computed, inject, onMounted, provide} from "vue"

export default {
    name: "PasswordResetModule",
    components: {PasswordReset},
    setup() {
        const store = inject('store')
        const isReady = computed(() => store.state.passwordReset.isReady);

        const phoneNumber = route.params.phone_number;
        const token = route.params.token

        provide('phone_number', phoneNumber);
        provide('token', token);

        const getConfirm = () => {
            passwordResetApi.confirm({
                'phone_number': phoneNumber,
                'token': token
            })
        }

        onMounted(() => {
            getConfirm();
        })

        return {
            isReady,
        }
    }
}
</script>
