<template>
    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="card card-custom">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">
                            {{ t(`PAGES.ROUTES.${route.name}`, {}, {locale: lang}) }}
                            <span
                                class="text-muted pt-2 font-size-sm d-block">{{
                                    t('PAGES.NOTIFICATIONS.DESCRIPTION', {}, {locale: lang})
                                }}</span>
                        </h3>
                    </div>
                    <div class="card-toolbar">

                        <SingleButton :label="t('PAGES.BACK.DASHBOARD', {}, {locale: lang})" event="goDashboard"
                                      @goDashboard="goDashboard"/>

                    </div>
                </div>

                <Table v-if="notifications.length > 0" :data="{labels : [t('COMPONENTS.TABLE.MESSAGE_TITLE', {}, {locale: lang}),
                                        t('COMPONENTS.TABLE.MESSAGE_BODY', {}, {locale: lang}),
                                        t('COMPONENTS.TABLE.DATE', {}, {locale: lang}),
                                        t('COMPONENTS.TABLE.STATUS', {}, {locale: lang})],
                                data : data}"
                       :options="{
                                    search:'false',
                                    pagination:'false'
                                }"/>

                <Alert v-else :text="t('COMPONENTS.TABLE.EMPTY', {}, {locale: lang})"
                       :className="alertTypes.light"/>


            </div>
        </div>
    </div>
</template>

<script>
import Table from "../../baseComponents/data/table/Table";
import preFormatNotifications from "../functions/functions";
import SingleButton from "../../baseComponents/data/table/SingleButton";
import * as alertTypes from "../../../../core/config/data/alert-types"
import {inject} from "vue";

export default {
    name: "Notifications",
    components: {SingleButton, Table},
    emits: ['goDashboard'],
    setup() {
        const t = inject('t')
        const lang = inject('lang')
        const router = inject('router')
        const route = inject('route')
        const store = inject('store')

        const notifications = store.state.notifications.notifications

        const data = preFormatNotifications(notifications)

        const goDashboard = () => {
            router.push({name: 'dashboard'})
        }

        return {
            t,
            lang,
            route,
            data,
            notifications,
            goDashboard,
            alertTypes
        }
    }
}
</script>
