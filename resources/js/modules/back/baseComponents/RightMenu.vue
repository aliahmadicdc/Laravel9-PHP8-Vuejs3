<template>
    <div>

    </div>
</template>

<script>
import {computed, inject} from "vue"

export default {
    name: "RightMenu",
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
