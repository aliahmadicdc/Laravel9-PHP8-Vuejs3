import passwordResetModule from "./PasswordResetModule";

const routes = {
    path: 'passwordReset/:phone_number/:token',
    component: passwordResetModule,
    name: 'passwordReset',
}

export default routes
