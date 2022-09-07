<template>
    <th :data-field="dataField" class="datatable-cell datatable-cell-sort"
        data-autohide-disabled="false"><span
        style="width: 137px;">{{ title }}</span></th>
</template>

<script>

export default {
    name: "Th",
    props: {
        title: String,
        dataField: String,
    }
}
</script>
