<template>
    <div class="form-group">
        <button type="submit"
                :disabled="loading"
                class="btn btn-primary font-weight-bold full-width mt-2">
            {{ title }}
        </button>
    </div>
</template>

<script>
import {computed, inject} from "vue";

export default {
    name: "BaseSubmitButton",
    props: ['title'],
    setup() {
        const store = inject('store')
        const loading = computed(() => store.state.all.isLoading)

        return {
            loading
        }
    }
}
</script>
