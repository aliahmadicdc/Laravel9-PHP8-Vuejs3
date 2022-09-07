<template>
    <div class="form-group d-flex flex-wrap flex-center">
        <button type="submit" id="kt_login_signup_submit"
                :disabled="loading"
                class="btn btn-primary font-weight-bold px-9 py-4 my-3">
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
