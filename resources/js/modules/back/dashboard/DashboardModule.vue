<template>
    <Dashboard/>
</template>

<script>
import Dashboard from "./components/Dashboard"
import logoutApi from "./../../auth/logout/api/logout.api"

export default {
    name: "DashboardModule",
    components: {Dashboard},
    setup() {
        const logoutFun = () => {
            logoutApi.logout()
        }

        return {
            logoutFun
        }
    }
}
</script>
