<template>
    <div>
        <section id="inner-headline">
            <div class="container">
                <div class="row">
                <div class="span4">
                    <div class="inner-heading">
                    <h2>Blog Right sidebar  {{ this.$route.params.id}}</h2>
                    </div>
                </div>
                <div class="span8">
                    <ul class="breadcrumb">
                    <li><a href="#"><i class="icon-home"></i></a><i class="icon-angle-right"></i></li>
                    <li><a href="#">Blog</a><i class="icon-angle-right"></i></li>
                    <li class="active">Blog Posts View</li>
                    
                    </ul>
                </div>
                </div>
            </div>
        </section>
        <section id="content">
            <div class="container">
                <div class="row">
                <!-- <div v-if="this.$route.params.id" class="span8">
                    <article v-for="blog_post in getPostByCateId" :key="blog_post.id">
                        <div class="row">
                            <div class="span8">
                            <div class="post-image">
                                <div class="post-heading">
                                <h3><a href="#">{{ blog_post.title }}</a></h3>
                                </div>
                                <img :src="postPhoto(blog_post.photo)" alt="" width="300" style="height: 250px">
                            </div>
                            <p>{{ blog_post.description | sortlength(45, " ....")}}</p>
                            <div class="bottom-article">
                                <ul class="meta-post">
                                <li><i class="icon-calendar"></i><a href="#">{{ blog_post.created_at | timeformat}}</a></li>
                                <li v-if="blog_post.user"><i class="icon-user"></i><a href="#">{{ blog_post.user.name }}</a></li>
                                <li v-else><i class="icon-user"></i><a href="#">Unknown Author</a></li>
                                <li v-if="blog_post.category"><i class="icon-folder-open"></i><a href="#">{{ blog_post.category.cat_name }}</a></li>
                                 <li v-else><i class="icon-folder-open"></i><a href="#">Unknown Category</a></li>
                                <li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
                                </ul>
                                <router-link :to="`/single-blog/${blog_post.id}`" class="pull-right">Continue reading <i class="icon-angle-right"></i></router-link>
                            </div>
                            </div>
                        </div>
                    </article>
                    <div id="pagination">
                    <span class="all">Page 1 of 3</span>
                    <span class="current">1</span>
                    <a href="#" class="inactive">2</a>
                    <a href="#" class="inactive">3</a>
                    </div>
                </div> -->
                <div class="span8">
                    <article v-for="blog_post in getAllBlogPost" :key="blog_post.id">
                        <div class="row">
                            <div class="span8">
                            <div class="post-image">
                                <div class="post-heading">
                                <h3><a href="#">{{ blog_post.title }}</a></h3>
                                </div>
                                <img :src="postPhoto(blog_post.photo)" alt="" width="300" style="height: 250px">
                            </div>
                            <p>{{ blog_post.description | sortlength(45, " ....")}}</p>
                            <div class="bottom-article">
                                <ul class="meta-post">
                                <li><i class="icon-calendar"></i><a href="#">{{ blog_post.created_at | timeformat}}</a></li>
                                <li v-if="blog_post.user"><i class="icon-user"></i><a href="#">{{ blog_post.user.name }}</a></li>
                                <li v-else><i class="icon-user"></i><a href="#">Unknown Author</a></li>
                                <li v-if="blog_post.category"><i class="icon-folder-open"></i><a href="#">{{ blog_post.category.cat_name }}</a></li>
                                 <li v-else><i class="icon-folder-open"></i><a href="#">Unknown Category</a></li>
                                <li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
                                </ul>
                                <router-link :to="`/single-blog/${blog_post.id}`" class="pull-right">Continue reading <i class="icon-angle-right"></i></router-link>
                            </div>
                            </div>
                        </div>
                    </article>
                    <!-- <article>
                        <div class="row">
                            <div class="span8">
                            <div class="post-slider">
                                <div class="post-heading">
                                <h3><a href="#">This is an example of slider post format</a></h3>
                                </div>
                                <div class="flexslider">
                                <ul class="slides">
                                    <li class="" data-thumb-alt="" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;">
                                    <img src="assets/public/img/dummies/blog/img1.jpg" alt="" draggable="false">
                                    </li>
                                    <li data-thumb-alt="" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 1; display: block; z-index: 2;" class="flex-active-slide">
                                    <img src="assets/public/img/dummies/blog/img2.jpg" alt="" draggable="false">
                                    </li>
                                    <li data-thumb-alt="" style="width: 100%; float: left; margin-right: -100%; position: relative; opacity: 0; display: block; z-index: 1;" class="">
                                    <img src="assets/public/img/dummies/blog/img3.jpg" alt="" draggable="false">
                                    </li>
                                </ul>
                                <ol class="flex-control-nav flex-control-paging"><li><a href="#" class="">1</a></li><li><a href="#" class="flex-active">2</a></li><li><a href="#" class="">3</a></li></ol><ul class="flex-direction-nav"><li class="flex-nav-prev"><a class="flex-prev" href="#">Previous</a></li><li class="flex-nav-next"><a class="flex-next" href="#">Next</a></li></ul></div>
                            </div>
                            <p>
                                Qui ut ceteros comprehensam. Cu eos sale sanctus eligendi, id ius elitr saperet, ocurreret pertinacia pri an. No mei nibh consectetuer, semper laoreet perfecto ad qui, est rebum nulla argumentum ei. Fierent adipisci iracundia est ei, usu timeam persius
                                ea. Usu ea justo malis, pri quando everti electram ei, ex homero omittam salutatus sed.
                            </p>
                            <div class="bottom-article">
                                <ul class="meta-post">
                                <li><i class="icon-calendar"></i><a href="#"> Mar 23, 2013</a></li>
                                <li><i class="icon-user"></i><a href="#"> Admin</a></li>
                                <li><i class="icon-folder-open"></i><a href="#"> Blog</a></li>
                                <li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
                                </ul>
                                <a href="#" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
                            </div>
                            </div>
                        </div>
                    </article> -->
                    <!-- <article>
                        <div class="row">
                            <div class="span8">
                            <div class="post-quote">
                                <div class="post-heading">
                                <h3><a href="#">Nice example of quote post format below</a></h3>
                                </div>
                                <blockquote>
                                <i class="icon-quote-left"></i> Lorem ipsum dolor sit amet, ei quod constituto qui. Summo labores expetendis ad quo, lorem luptatum et vis. No qui vidisse signiferumque...
                                </blockquote>
                            </div>
                            <div class="bottom-article">
                                <ul class="meta-post">
                                <li><i class="icon-calendar"></i><a href="#"> Mar 23, 2013</a></li>
                                <li><i class="icon-user"></i><a href="#"> Admin</a></li>
                                <li><i class="icon-folder-open"></i><a href="#"> Blog</a></li>
                                <li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
                                </ul>
                                <a href="#" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
                            </div>
                            </div>
                        </div>
                    </article>
                    <article>
                        <div class="row">
                            <div class="span8">
                            <div class="post-video">
                                <div class="post-heading">
                                <h3><a href="#">Amazing video post format here</a></h3>
                                </div>
                                <div class="video-container">
                                <iframe src="http://player.vimeo.com/video/30585464?title=0&amp;byline=0">
                                            </iframe>
                                </div>
                            </div>
                            <p>
                                Qui ut ceteros comprehensam. Cu eos sale sanctus eligendi, id ius elitr saperet, ocurreret pertinacia pri an. No mei nibh consectetuer, semper laoreet perfecto ad qui, est rebum nulla argumentum ei. Fierent adipisci iracundia est ei, usu timeam persius
                                ea. Usu ea justo malis, pri quando everti electram ei.
                            </p>
                            <div class="bottom-article">
                                <ul class="meta-post">
                                <li><i class="icon-calendar"></i><a href="#"> Mar 23, 2013</a></li>
                                <li><i class="icon-user"></i><a href="#"> Admin</a></li>
                                <li><i class="icon-folder-open"></i><a href="#"> Blog</a></li>
                                <li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
                                </ul>
                                <a href="#" class="pull-right">Continue reading <i class="icon-angle-right"></i></a>
                            </div>
                            </div>
                        </div>
                    </article> -->
                    <div id="pagination">
                    <span class="all">Page 1 of 3</span>
                    <span class="current">1</span>
                    <a href="#" class="inactive">2</a>
                    <a href="#" class="inactive">3</a>
                    </div>
                </div>

               <!-- ******************* Right Sidebar *************************** -->

                    <BlogSidebar/>
                </div>
            </div> 
        </section>
    </div>
</template>
<script>
import BlogSidebar from './BlogSidebar.vue'
export default {
    name: 'BlogPost',
    components: {
        BlogSidebar
    },
    mounted(){
        this.$store.dispatch("allBlogPost")
    },
    computed: {
        getAllBlogPost(){
         return this.$store.getters.getBlogPost
      }
    //     getPostByCateId(){
    //      return this.$store.getters.gatAllCategoryPost
    //   }
    },
    methods: {
        postPhoto(img){
            return 'uploads/' + img;
      },
      gatAllCategoryPost(){
          if(this.$route.params.id != null){
              this.$store.dispatch("allPostByCategory", this.$route.params.id)
          }else{
              this.$store.dispatch("allBlogPost")
          }
      }
    },
    watch: {
        $route(to, from){
            this.gatAllCategoryPost();
        }
    }
}
</script>
<style scoped>

</style>