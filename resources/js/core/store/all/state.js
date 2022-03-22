import i18nService from "../../services/i18n.service"
import { IS_AUTH } from "../../services/session-types"

export const state = {
    isLoading: false,
    lang: i18nService.getActiveLanguage(),
    messages: [],
    messageMode: '',
    user: null,
    isAuth: SessionService.get(IS_AUTH) ?? false,
}
