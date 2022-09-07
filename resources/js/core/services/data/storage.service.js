const StorageService = {
    save(key, value) {
        window.localStorage.setItem(key, value)
    },
    get(key) {
        return window.localStorage.getItem(key)
    },
    destroy(key) {
        window.localStorage.removeItem(key)
    }
}

window.StorageService = StorageService

export default StorageService
