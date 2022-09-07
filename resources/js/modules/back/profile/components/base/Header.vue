<template>
    <div class="card-header py-3">
        <div class="card-title align-items-start flex-column">
            <h3 class="card-label font-weight-bolder text-dark">{{ title }}</h3>
            <span class="text-muted font-weight-bold font-size-sm mt-1">{{ description }}</span>
        </div>
        <div class="card-toolbar">
            <button v-on:click="$emit(button.event)" v-for="(button,index) in buttons" type="button"
                    class="btn btn-success">{{ button.title }}
            </button>
            <button type="button" v-on:click="goToDashboard" class="btn btn-secondary ml-2"> {{
                    t('PAGES.BACK.CANCEL', {}, {locale: lang})
                }}
            </button>
        </div>
    </div>
</template>

<script>
import {inject} from "vue";

export default {
    name: "Header",
    props: ['title', 'description', 'buttons'],
    setup() {
        const t = inject('t')
        const lang = inject('lang')
        const router = inject('router')

        const goToDashboard = () => {
            router.push({name: 'dashboard'})
        }

        return {
            goToDashboard,
            t,
            lang
        }
    }
}
</script>
