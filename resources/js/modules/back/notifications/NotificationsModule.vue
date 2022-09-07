<template>
    <Notifications v-if="isReady"/>
</template>

<script>
import Notifications from "./components/Notifications";
import notificationApi from "./api/notification.api"
import {computed, inject, onMounted} from "vue";
import {SET_IS_READY} from "./store/mutation-types";

export default {
    name: "NotificationsModule",
    components: {Notifications},
    setup() {
        const store = inject('store')

        StoreService.commit('notifications', SET_IS_READY, false)

        const isReady = computed(() => store.state.notifications.isReady);

        const getUserNotifications = () => {
            notificationApi.userNotifications();
        }

        onMounted(() => {
            getUserNotifications();
        })

        return {
            isReady
        }
    }
}
</script>
