import {createApp} from "vue"
import RegisterModule from "./../../../modules/auth/register/RegisterModule"
import sessionService from "../../../core/services/session.service"
import storeService from "../../../core/services/store.service"
import messageHandler from "../../../core/services/error.service"
import axios from "./../../../core/services/api.service"
import store from "./../../../core/store/index.store"
import i18n from "./../../../core/plugins/i18n"
import registerComponents from "../../../core/config/registerBaseComponents"

const app = createApp(RegisterModule)
app.use(store)
app.use(i18n)

registerComponents(app)

app.mount('#app')
