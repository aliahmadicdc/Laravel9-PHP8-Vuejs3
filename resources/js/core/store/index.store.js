import {createStore} from "vuex"

import all from "./all/index"
import dashboard from "./../../modules/back/dashboard/store/index"

const store = createStore({
    modules: {
        all,
        dashboard
    }
});

export default store
