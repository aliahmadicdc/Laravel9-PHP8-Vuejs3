const StoreService = {
    commit(module = '', key, value = null) {
        value ?
            window.store.commit(module !== '' ? `${module}/${key}` : key, value) :
            window.store.commit(module !== '' ? `${module}/${key}` : key)
    }
}

window.StoreService = StoreService

export default StoreService
