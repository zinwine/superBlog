import Home from './components/admin/Home.vue'
import CategoryList from './components/admin/category/list.vue'
import Ex from './components/ExampleComponent.vue'

export const routes = [
  { 
    path: '/home', 
    component: Home 
  },
  { 
    path: '/category-list', 
    component: CategoryList
  },
  { 
    path: '/post', 
    component: Ex
  },
]