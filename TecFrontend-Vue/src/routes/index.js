import * as vueRouter from 'vue-router'
import HomeComponent from '@/views/admin/home/HomeComponent'
import SettingsComponent from '@/views/admin/settings/SettingsComponent'
import NotFoundComponent from '@/views/admin/notfound/NotFoundComponent'
import HelloWorld from '@/components/HelloWorld.vue'

const routes =[
    {path:'/admin',name:'admin',component:HomeComponent},
    {path:'/admin/prueba',name:'prueba',component:HelloWorld},
    {path:'/admin/settings',name:'settings',component:SettingsComponent},
    {path:'/:pathMatch(.*)*',name:"notfound",component:NotFoundComponent}
    
    
]
const router =vueRouter.createRouter({
    history:vueRouter.createWebHistory(),
    routes
})
export default router