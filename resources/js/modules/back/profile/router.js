import ProfileModule from "./ProfileModule";
import PersonalInformation from "./components/PersonalInformation"
import AccountInformation from "./components/AccountInformation"
import ChangePassword from "./components/ChangePassword"
import Settings from "./components/Settings"

const routes = {
    path: 'profile/:phoneNumber',
    component: ProfileModule,
    name: 'profile',
    redirect: {name: 'profile_personalInformation'},
    children: [
        {path: 'personalInformation', component: PersonalInformation, name: 'profile_personalInformation'},
        {path: 'accountInformation', component: AccountInformation, name: 'profile_accountInformation'},
        {path: 'changePassword', component: ChangePassword, name: 'profile_changePassword'},
        {path: 'settings', component: Settings, name: 'profile_settings'}
    ]
}

export default routes
