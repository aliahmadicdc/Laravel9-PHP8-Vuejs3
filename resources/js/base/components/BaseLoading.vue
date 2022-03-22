<template>
    <div v-if="loading" class="alert alert-success base-loading">
        <div class="spinner-grow text-light" role="status"></div>
        <div class="mt-1 ml-2">{{ t('AUTH.VALIDATION.LOADING', {}, {locale: lang}) }}</div>
    </div>
</template>

<script>
import {computed, inject} from "vue"

export default {
    name: "loading",
    setup() {
        const store = inject('store')
        const loading = computed(() => store.state.all.isLoading)

        return {
            t: window.t,
            lang: window.lang,
            loading
        }
    }
}
</script>
