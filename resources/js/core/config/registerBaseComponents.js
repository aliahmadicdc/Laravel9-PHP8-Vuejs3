import BaseSubmitButton from "./../../base/components/BaseSubmitButton"
import BaseLoading from "./../../base/components/BaseLoading"
import BaseMessages from "./../../base/components/BaseMessages"
import BaseInputError from "./../../base/components/BaseInputError"
import BaseLogoutButton from "./../../base/components/BaseLogoutButton"

const registerComponents = (app) => {
    app.component('BaseSubmitButton', BaseSubmitButton)
    app.component('BaseLoading', BaseLoading)
    app.component('BaseMessages', BaseMessages)
    app.component('BaseInputError', BaseInputError)
    app.component('BaseLogoutButton', BaseLogoutButton)
}

export default registerComponents
