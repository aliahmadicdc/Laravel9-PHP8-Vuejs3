<template>
    <td v-if="isAction==='false'" :data-field="dataField" :aria-label="title" class="datatable-cell">
        <span style="width: 137px;">
            <Status v-if="isLabel==='true'" :title="title" :status="status"/>
            <span v-else>{{ title }}</span>
        </span>
    </td>

    <td v-else-if="isAction==='true'" data-field="Actions" data-autohide-disabled="false" aria-label="null" class="datatable-cell">
        <span style="overflow: visible; position: relative; width: 125px;">
            <a v-if="options.editAction"
               href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" title="Edit details">
                <span class="svg-icon svg-icon-md">
                    <svg
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g
                        stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">	                                        <rect
                        x="0" y="0" width="24" height="24"></rect>	                                        <path
                        d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z"
                        fill="#000000" fill-rule="nonzero"
                        transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "></path>	                                        <rect
                        fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"></rect>	                                    </g></svg>
                </span>
            </a>
            <a v-if="options.deleteAction"
               href="javascript:;" class="btn btn-sm btn-clean btn-icon" title="Delete">
                <span class="svg-icon svg-icon-md">
                    <svg
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g
                        stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">	                                        <rect
                        x="0" y="0" width="24" height="24"></rect>	                                        <path
                        d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                        fill="#000000" fill-rule="nonzero"></path>	                                        <path
                        d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                        fill="#000000" opacity="0.3"></path>	                                    </g>	                                </svg>
                </span>
            </a>
        </span>
    </td>
</template>

<script>
import Status from "./Status";
import {onMounted} from "vue";

export default {
    name: "Td",
    components: {Status},
    props: {
        dataField: String,
        title: String,
        isLabel: String,
        status: String,
        isAction: String,
        options: Object
    }
}
</script>
