import {createStore} from "vuex"
import all from "./all/index"

const context = require.context('../../modules', true, /store\/*.*store_index.js/);

const store = createStore({});

store.registerModule('all', all)

context.keys().forEach((file) => {
    const fileName = (file.substring(file.lastIndexOf('/') + 1).split('.')[0]).split('_')[0];
    const storeConfig = context(file);
    const obj = storeConfig.default;

    store.registerModule(fileName, obj)
});

export default store
