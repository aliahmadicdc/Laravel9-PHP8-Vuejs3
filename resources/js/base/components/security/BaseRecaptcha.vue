<template>
    <div class="d-flex justify-content-center mt-2 mb-2">
        <VueRecaptcha
            :sitekey="siteKey"
            :load-recaptcha-script="true"
            @verify="handleSuccess"
            @error="handleError"
        ></VueRecaptcha>
    </div>
</template>

<script>
import {VueRecaptcha} from 'vue-recaptcha';
import {SET_RECAPTCHA} from "../../../core/store/all/mutation-types";

export default {
    name: "BaseRecaptcha",
    components: {
        VueRecaptcha
    },
    setup() {

        const siteKey = '6LcCGXYgAAAAAC6BnC_mCge0xzKxGcsEm3jmGl8E';

        const handleError = () => {
            StoreService.commit('all', SET_RECAPTCHA, null)
        };

        const handleSuccess = (response) => {
            StoreService.commit('all', SET_RECAPTCHA, response)
        };

        return {
            handleSuccess,
            handleError,
            siteKey,
        };
    }
}
</script>
