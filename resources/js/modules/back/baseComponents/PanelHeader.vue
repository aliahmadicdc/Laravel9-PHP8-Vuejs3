<template>
    <div class="row p-0 m-0" style="direction: ltr">
        <div class="p-2">
            <RouterLink :to="{name : 'dashboard'}">Dashboard</RouterLink>
        </div>
        <div class="p-2">
            <RouterLink :to="{name : 'notifications'}">Notifications</RouterLink>
        </div>
        <div class="p-2">
            <BaseLogoutButton/>
        </div>
    </div>
</template>

<script>
import {computed, inject} from "vue"

export default {
    name: "Header",
    setup() {
        const store = inject('store')
        const user = computed(() => store.state.all.user)

        return {
            user,
            t: window.t,
            lang: window.lang
        }
    }
}
</script>
