import {USER_LANGUAGE} from "./session-types"

const i18nService = {
    defaultLanguage: "fa",

    languages: [
        {
            lang: "en",
            name: "English",
            flag: process.env.BASE_URL + "assets/back/media/svg/flags/226-united-states.svg"
        },
        {
            lang: "fa",
            name: "فارسی",
            flag: process.env.BASE_URL + "assets/back/media/svg/flags/136-iran.svg"
        }
    ],
    setActiveLanguage(lang) {
        SessionService.save(USER_LANGUAGE, lang)
    },
    getActiveLanguage() {
        return SessionService.get(USER_LANGUAGE) ? SessionService.get(USER_LANGUAGE) : this.defaultLanguage
    }
};

export default i18nService
