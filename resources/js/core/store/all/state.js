import i18nService from "../../services/lang/i18n.service"
import {IS_AUTH} from "../../services/data/storage-types"

export const state = {
    isLoading: false,
    lang: i18nService.getActiveLanguage(),
    messages: [],
    messageMode: '',
    user: null,
    profileImage : null,
    options: null,
    isAuth: StorageService.get(IS_AUTH) ?? false,
    recaptchaResponse: null
}
