<template>
    <span class="label font-weight-bold label-lg label-inline" :class="labelClass">{{ title }}</span>
</template>

<script>
import * as labelTypes from "./../../../../../core/config/data/label-types"

export default {
    name: "Status",
    props: {
        title: String,
        status: String
    },
    setup(props) {
        let labelClass = '';

        if (props.status === labelTypes.success)
            labelClass = 'label-light-success';
        else if (props.status === labelTypes.danger)
            labelClass = 'label-light-danger';
        else
            labelClass = 'label-light-warning';

        return {
            labelClass,
        }
    }
}
</script>
