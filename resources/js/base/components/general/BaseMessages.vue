<template>
    <div class="alert base-messages" :class="messageMode" v-if="messageMode">
        <div v-for="(message,index) in messages" :key="index">
            <div v-html="message"></div>
        </div>
    </div>
</template>

<script>
import {computed, inject, watch} from "vue";
import {CLEAR_MESSAGES} from "../../../core/store/all/mutation-types";

export default {
    name: "messages",
    setup() {
        const store = inject('store')

        const messages = computed(() => store.state.all.messages)
        const messageMode = computed(() => store.state.all.messageMode)

        watch(() => store.state.all.messageMode, (first, second) => {
            if (first !== '') {
                setTimeout(() => {
                    StoreService.commit('all',CLEAR_MESSAGES)
                }, 2000)
            }
        });

        return {
            messages,
            messageMode
        }
    }
}
</script>
