<template>
    <div class="fv-plugins-message-container red"
         v-for="(error, index) of errors"
         :key="index">
        <div class="error-msg">{{ error.$message }}</div>
    </div>
</template>

<script>
export default {
    name: "inputError",
    props: ['errors'],
}
</script>
