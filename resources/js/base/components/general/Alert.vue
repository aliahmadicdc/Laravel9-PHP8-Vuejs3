<template>
    <div class="m-10">
        <div class="alert mt-10" :class="className" role="alert">
            {{ text }}
        </div>
    </div>
</template>

<script>
export default {
    name: "Alert",
    props: {
        text: String,
        className: String
    }
}
</script>
