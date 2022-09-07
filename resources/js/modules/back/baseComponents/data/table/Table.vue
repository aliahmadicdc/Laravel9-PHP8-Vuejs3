<template>
    <div class="card-body">
        <div class="mb-7">

            <SearchArea v-if="options.search==='true'"/>

        </div>
        <div
            class="datatable datatable-bordered datatable-head-custom datatable-default datatable-primary datatable-loaded"
            id="kt_datatable" style="">
            <table class="datatable-table" style="display: block;">
                <thead class="datatable-head">
                <tr class="datatable-row" style="left: 0px;">

                    <Th v-for="label in data.labels" :data-field="label"
                        :title="label"/>

                </tr>
                </thead>
                <tbody class="datatable-body" style="">
                <tr v-for="(item,index) in data.data" data-row="0" class="datatable-row" style="left: 0px;">

                    <Td v-for="(row,inner_index) in item.data" :data-field="data.labels[inner_index]" :title="row.data"
                        :is-label="row.isLabel" :status="row.labelType" :is-action="row.isAction" :options="item.options"/>

                </tr>
                </tbody>
            </table>

            <Paginate v-if="options.pagination==='true'"/>

        </div>
    </div>
</template>

<script>
import SearchArea from "./SearchArea";
import Th from "./Th";
import Paginate from "./Paginate";
import Td from "./Td";
import BaseLogoutButton from "../../../../../base/components/logout/BaseLogoutButton";
import {inject} from "vue";

export default {
    name: "Table",
    components: {BaseLogoutButton, Td, Paginate, Th, SearchArea},
    props: ['data','options'],
    setup() {
        const t = inject('t')
        const lang = inject('lang')

        return {
            t,
            lang
        }
    }
}
</script>
