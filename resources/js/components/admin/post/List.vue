<template>
    <!-- <div> -->
        <!-- <h2>Category List</h2> -->
         <!-- Main content -->
    <section class="content">
      <div class="row justify-content-around">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Post List</h3>
              <div class="card-tools">
                  <button class="btn btn-primary">
                    <router-link to="/add-post" class="text-white">Add New Post</router-link>
                    </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Author</th>
                        <th>Category</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(post, index) in getAllPost" :key="post.id">
                        <td>{{ index + 1 }}</td>
                        <td v-if="post.user">{{ post.user.name }}</td>
                        <td v-else>Unknown User</td>
                        <td v-if="post.category">{{ post.category.cat_name }}</td>
                        <td v-else>Unknown Category</td>
                        <td v-if="(post.title).length > 15">{{ post.title | sortlength(20, " ----") }}</td>
                        <td v-else>{{ post.title }}</td>
                        <td>{{ post.description | sortlength(40, " .....")}}</td>
                        <td><img :src="post.photo" alt="" width="80" height="50"></td>
                        <td>
                            <a href="#ß" class="btn btn-warning" style="color: #108c2b">Edit</a>
                            <a href="#" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
    
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- </div> -->
</template>

<script>
export default {
    name: 'List',
    mounted(){
      this.$store.dispatch("allPost")
    },
    computed: {
      getAllPost(){
         return this.$store.getters.getPost
      }
    },
    methods: {
    }
}
</script>

<style scoped>

</style>