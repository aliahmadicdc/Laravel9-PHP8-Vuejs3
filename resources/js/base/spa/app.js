import {createApp} from "vue"
import App from "../../App"
import storageService from "../../core/services/data/storage.service"
import storeService from "../../core/services/data/store.service"
import messageHandler from "../../core/services/api/error.service"
import axios from "../../core/services/api/api.service"
import store from "./../../core/store/index.store"
import i18n from "./../../core/plugins/lang/i18n"
import router from "../../core/router/router"
import registerComponents from "../../core/config/components/registerBaseComponents"

const app = createApp(App)
app.use(store)
app.use(i18n)
app.use(router)

registerComponents(app)

app.mount('#app')
