<template>
    <div class="datatable-pager datatable-paging-loaded">
        <ul class="datatable-pager-nav mb-5 mb-sm-0">
            <li><a title="اول"
                   class="datatable-pager-link datatable-pager-link-first datatable-pager-link-disabled"
                   data-page="1" disabled="disabled"><i class="flaticon2-fast-next"></i></a></li>
            <li><a title="قبلی"
                   class="datatable-pager-link datatable-pager-link-prev datatable-pager-link-disabled"
                   data-page="1" disabled="disabled"><i class="flaticon2-next"></i></a></li>
            <li style=""></li>
            <li style="display: none;"><input type="text" class="datatable-pager-input form-control"
                                              title="شماره صفحه"></li>
            <li><a
                class="datatable-pager-link datatable-pager-link-number datatable-pager-link-active"
                data-page="1" title="1">1</a></li>
            <li><a class="datatable-pager-link datatable-pager-link-number" data-page="2" title="2">2</a>
            </li>
            <li></li>
            <li><a title="بعدی" class="datatable-pager-link datatable-pager-link-next"
                   data-page="2"><i class="flaticon2-back"></i></a></li>
            <li><a title="آخری" class="datatable-pager-link datatable-pager-link-last"
                   data-page="10"><i class="flaticon2-fast-back"></i></a></li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "Paginate"
}
</script>
