import Home from './components/admin/Home.vue'
import CategoryList from './components/admin/category/list.vue'
import AddCategory from './components/admin/category/New.vue'
import EditCategory from './components/admin/category/Edit.vue'
import PostList from './components/admin/post/List.vue'
import AddPost from './components/admin/post/New.vue'
import EditPost from './components/admin/post/Edit.vue'
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
    path: '/add-category', 
    component: AddCategory
  },
  { 
    path: '/edit-category/:categoryid', 
    component: EditCategory
  },
  { 
    path: '/post-list', 
    component: PostList
  },
  { 
    path: '/add-post', 
    component: AddPost
  },
  { 
    path: '/edit-post', 
    component: EditPost
  },
]