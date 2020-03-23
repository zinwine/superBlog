<template>
    <div>
         <div class="span4">
                    <aside class="right-sidebar">
                    <div class="widget">
                        <form class="form-search">
                        <input @keyup="realSearch" placeholder="Type something" v-model="keyword" type="text" class="input-medium search-query">
                        <button type="submit" @click.prevent="realSearch" class="btn btn-square btn-theme">Search</button>
                        </form>
                    </div>
                    <div class="widget">
                        <h5 class="widgetheading">Categories</h5>
                        <ul class="cat">
                        <li v-for="category in getCategories" :key="category.id"><i class="icon-angle-right"></i>
                        <router-link :to="`/category-post/${category.id}`">{{category.cat_name}}</router-link><span> (20)</span></li>
                        </ul>
                    </div>
                    <div class="widget">
                        <h5 class="widgetheading">Latest posts</h5>
                        <ul class="recent">
                            <li v-for="(blog_post, index) in getAllBlogPost" :key="blog_post.id" v-if="index < 5">
                                <img :src="`uploads/${blog_post.photo}`" class="pull-left" alt="" width="60" height="40">
                                <h6><router-link :to="`/single-blog/${blog_post.id}`" >{{blog_post.title}}</router-link></h6>
                                <p>{{blog_post.description | sortlength(40, " ....")}}</p>
                            </li>

                        </ul>
                    </div>
                    </aside>
                </div>
    </div>
</template>
<script>
import _ from 'lodash'
export default {
    name: 'BlogSidebar',
    data(){
        return {
            keyword: ''
        }
    },
    mounted(){
        this.$store.dispatch("allCategories");
        this.$store.dispatch("latestPost")
    },
    computed: {
        getCategories(){
         return this.$store.getters.getCategories
      },getAllBlogPost(){
         return this.$store.getters.getLatestPost
      }
    },
    methods: {
        realSearch:_.debounce(function(){
            this.$store.dispatch("searchPost", this.keyword)
        },1000)
        

    }
}
</script>