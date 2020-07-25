import VueRouter from 'vue-router'
import Children from '../Pages/Children/View.vue'
let pathInit = "/admin/"
const routes = [{
    path: `${pathInit}children`,
    name: 'children',
    component: Children,
    
},]


const router = new VueRouter({
    history: true,
    mode: 'history',
    routes,
})



export default router;