import DashboardModule from "./DashboardModule"

const routes = {
    path: '', component: DashboardModule, name: 'panel_index',
    children: [
        {
            path: 'dashboard', component: DashboardModule, name: 'dashboard',
        }
    ]
}


export default routes
