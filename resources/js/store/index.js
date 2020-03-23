import axios from "axios"

export default {
    state: {
        category: [],
        post: [],
        blogPost: [],
        detailBlogPost: [],
        categories: [],
        latestPost: []
        // categorPosts: []
    },
    getters: {
        getCategory(state){
           return state.category
       },
        getPost(state){
           return state.post
       },
        getBlogPost(state){
           return state.blogPost
       },
       getDetailBlogPost(state){
           return state.detailBlogPost
       },
       getCategories(state){
           return state.categories
       },
       getLatestPost(state){
           return state.latestPost
       }
    //    gatAllCategoryPost(state){
    //        return state.categorPosts
    //    }
    },
    actions: {
        allCategory(context){
            axios.get('/category')
            .then((response) => {
                context.commit('category', response.data.categories)
            })
        },
        allPost(context){
            axios.get('/post')
            .then((response) => {
                context.commit('post', response.data.posts)
                // console.log(response.data)
            })
        },
        allBlogPost(context){
            axios.get('/blog-post')
            .then((response) => {
                context.commit('blogPost', response.data.blogPosts)
                // console.log(response.data)
            })
        },
        detailBlogPost(context, id){
            axios.get('/blog-post/' + id)
            .then((response) => {
                context.commit('detailBlogPost', response.data.detailBlogPost)
                // console.log(response.data)
            })
        },
        allCategories(context){
            axios.get('/categories')
            .then((response) => {
                context.commit('categories', response.data.categories)
                // console.log(response.data)
            })
        },
        allPostByCategory(context, id){
            axios.get('/category-post/' + id)
            .then((response) => {
                context.commit('categorPosts', response.data.categorPosts)
                // console.log(response.data)
            })
        },
        searchPost(context, payload){
            axios.get('/search?s=' + payload)
            .then((response) => {
                context.commit('getSearchPost', response.data.searchPosts)
                console.log(response.data)
            })
        },
        latestPost(context){
            axios.get('/latestPost')
            .then((response) => {
                context.commit('latestPost', response.data.latestPost)
                console.log(response.data)
            })
        }

    },
    mutations: {
        category(state, data){
            return state.category = data
        },
        post(state, data){
            return state.post = data
        },
        blogPost(state, data){
            return state.blogPost = data
        },
        detailBlogPost(state, data){
            return state.detailBlogPost = data
        },
        categories(state, data){
            return state.categories = data
        },
        categorPosts(state, data){
            state.blogPost = data
        },
        getSearchPost(state, data){
            state.blogPost = data
        },
        latestPost(state, data){
            state.latestPost = data
        }
        // categorPosts(state, data){
        //     return state.categorPosts = data
        // }
    }
}