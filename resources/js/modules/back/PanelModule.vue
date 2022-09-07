<template>
    <MobileHeader v-if="isReady"/>

    <div class="d-flex flex-column flex-root" v-if="isReady">
        <div class="d-flex flex-row flex-column-fluid page">

            <RightMenu/>

            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

                <PanelHeader/>

                <div class="content d-flex flex-column flex-column-fluid"
                     id="kt_content">

                    <SubHeader/>

                    <div class="d-flex flex-column-fluid">
                        <div class="container">

                            <router-view/>

                        </div>
                    </div>
                </div>

                <PanelFooter/>

            </div>
        </div>
    </div>

    <UserPanel v-if="isReady"/>

    <BaseMessages/>
    <BaseLoading/>
</template>

<script>
import PanelFooter from "./baseComponents/theme/PanelFooter";
import PanelHeader from "./baseComponents/theme/PanelHeader";
import SubHeader from "./baseComponents/theme/SubHeader";
import QuickPanel from "./baseComponents/theme/QuickPanel";
import UserPanel from "./baseComponents/theme/UserPanel";
import RightMenu from "./baseComponents/theme/RightMenu";
import MobileHeader from "./baseComponents/theme/MobileHeader";

import {computed, inject, onMounted, onUpdated, watch} from "vue";
import dashboardApi from "./dashboard/api/dashboard.api";
import {SET_IS_READY} from "./dashboard/store/mutation-types";

export default {
    name: "PanelModule",
    components: {
        PanelFooter,
        PanelHeader,
        SubHeader,
        QuickPanel,
        UserPanel,
        RightMenu,
        MobileHeader,
    },
    setup() {
        const store = inject('store')

        StoreService.commit('dashboard', SET_IS_READY, false)
        const isReady = computed(() => store.state.dashboard.isReady)

        watch(() => store.state.dashboard.isReady, (first, second) => {
            if (isReady.value) {
                setTimeout(function () {
                    KTUtil.init(KTAppSettings)
                    initTheme()
                    KTApp.init(KTAppSettings)
                    KTWidgets.init()
                }, 1000)
            }
        });

        const getUserInfo = () => {
            dashboardApi.userInfo()
        };

        onMounted(() => {
            getUserInfo()
        });

        return {
            isReady,
        };
    },
}
</script>
