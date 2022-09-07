<template>
    <button id="kt_login_signup_submit" type="button"
            :disabled="loading"
            @click="logout"
            class="btn btn-danger font-weight-bold px-9 py-4 my-3 mx-4">
        {{ t('AUTH.LOGOUT.TITLE', {}, {locale: lang}) }}
    </button>
</template>

<script>
import {computed, inject} from "vue"
import logoutApi from "../../../modules/auth/logout/api/logout.api"

export default {
    name: "BaseLogoutButton",
    props: ['title'],
    setup() {
        const store = inject('store')
        const loading = computed(() => store.state.all.isLoading)

        const logout = () => {
            logoutApi.logout()
        }

        return {
            t: window.t,
            lang: window.lang,
            loading,
            logout
        }
    }
}
</script>
