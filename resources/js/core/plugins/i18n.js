import {createI18n} from 'vue-i18n'
import {locale as en} from "./../../core/config/i18n/en"
import {locale as fa} from "./../../core/config/i18n/fa"
import {USER_LANGUAGE} from "../services/session-types"

const messages = {
    'en': en,
    'fa': fa
}

const lang = SessionService.get(USER_LANGUAGE) || "fa"

const i18n = createI18n({
    legacy: false,
    locale: lang,
    fallbackLocale: 'en',
    messages,
})

export default i18n
