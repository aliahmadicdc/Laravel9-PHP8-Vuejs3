<template>
    <div class="row align-items-center">
        <div class="col-lg-9 col-xl-8">
            <div class="row align-items-center">
                <div class="col-md-4 my-2 my-md-0">
                    <div class="input-icon">
                        <input type="text" class="form-control"
                               v-bind:placeholder="t('COMPONENTS.TABLE.SEARCH_DESCRIPTION', {}, {locale: lang})"
                               id="kt_datatable_search_query">
                        <span><i class="flaticon2-search-1 text-muted"></i></span>
                    </div>
                </div>
                <div class="col-md-4 my-2 my-md-0">
                    <div class="d-flex align-items-center">
                        <label class="mr-3 mb-0 d-none d-md-block">وضعیت:</label>
                        <div class="dropdown bootstrap-select form-control"><select
                            class="form-control" id="kt_datatable_search_status">
                            <option value="">همه</option>
                            <option value="1">در انتظار</option>
                            <option value="2">تحویل داده شده</option>
                            <option value="3">لغو شده</option>
                            <option value="4">موفقیت</option>
                            <option value="5">اطلاعات</option>
                            <option value="6">هشدار</option>
                        </select>
                            <button type="button" tabindex="-1"
                                    class="btn dropdown-toggle btn-light bs-placeholder"
                                    data-toggle="dropdown" role="combobox" aria-owns="bs-select-1"
                                    aria-haspopup="listbox" aria-expanded="false"
                                    data-id="kt_datatable_search_status" title="همه">
                                <div class="filter-option">
                                    <div class="filter-option-inner">
                                        <div class="filter-option-inner-inner">همه</div>
                                    </div>
                                </div>
                            </button>
                            <div class="dropdown-menu ">
                                <div class="inner show" role="listbox" id="bs-select-1"
                                     tabindex="-1">
                                    <ul class="dropdown-menu inner show" role="presentation"></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 my-2 my-md-0">
                    <div class="d-flex align-items-center">
                        <label class="mr-3 mb-0 d-none d-md-block">نوع:</label>
                        <div class="dropdown bootstrap-select form-control"><select
                            class="form-control" id="kt_datatable_search_type">
                            <option value="">همه</option>
                            <option value="1">Online</option>
                            <option value="2">Retail</option>
                            <option value="3">Direct</option>
                        </select>
                            <button type="button" tabindex="-1"
                                    class="btn dropdown-toggle btn-light bs-placeholder"
                                    data-toggle="dropdown" role="combobox" aria-owns="bs-select-2"
                                    aria-haspopup="listbox" aria-expanded="false"
                                    data-id="kt_datatable_search_type" title="همه">
                                <div class="filter-option">
                                    <div class="filter-option-inner">
                                        <div class="filter-option-inner-inner">همه</div>
                                    </div>
                                </div>
                            </button>
                            <div class="dropdown-menu ">
                                <div class="inner show" role="listbox" id="bs-select-2"
                                     tabindex="-1">
                                    <ul class="dropdown-menu inner show" role="presentation"></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
            <a class="btn btn-light-primary px-6 font-weight-bold">
                {{ t('COMPONENTS.TABLE.SEARCH', {}, {locale: lang}) }}
            </a>
        </div>
    </div>
</template>

<script>
import {inject} from "vue";

export default {
    name: "SearchArea",
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
