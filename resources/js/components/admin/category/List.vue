<template>
    <!-- <div> -->
        <!-- <h2>Category List</h2> -->
         <!-- Main content -->
    <section class="content">
      <div class="row justify-content-around">
        <div class="col-8">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Category List</h3>
              <div class="card-tools">
                  <button class="btn btn-primary">
                    <router-link to="/add-category" class="text-white">Add New Category</router-link>
                    </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(category, index) in getAllCategory" :key="category.id">
                        <td>{{ index + 1 }}</td>
                        <td>{{ category.cat_name }}</td>
                        <td>{{ category.created_at | timeformat}}</td>
                        <td>
                            <router-link :to="`/edit-category/${category.id}`" class="btn btn-warning" style="color: #108c2b">Edit</router-link>
                            <!-- <a href="#" class="btn btn-warning" style="color: #108c2b"  @click.prevent="editCategory(category.id)">Edit</a> -->
                            <a href="#" class="btn btn-danger" @click.prevent="deleteCategory(category.id)">Delete</a>
                        </td>
                    </tr>
                    <!-- <tr v-for="category in categories" v-bind:key="category.id">
                        <td>{{category.id}}</td>
                        <td>{{category.cat_name}}</td>
                        <td>
                            <a href="#" class="btn btn-warning" style="color: #108c2b">Edit</a>
                            <a href="#" class="btn btn-danger">Delete</a>
                        </td>
                    </tr> -->
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
      this.$store.dispatch("allCategory")
    },
    computed: {
      getAllCategory(){
         return this.$store.getters.getCategory
      }
    },
    methods: {
      deleteCategory(id){
          axios.get('/category/' + id)
          .then(() => {
            this.$store.dispatch("allCategory")
            Toast.fire({
              icon: 'success',
              title: 'Category Deleted successfully'
            })
          })
      }
    }
    // data(){
    //     return{
    //         categories: [],
    //         category: {
    //             id: '',
    //             cat_name: ''
    //         },
    //     }
    // },
    // created(){
    //     this.getCategory();
    // },
    // methods: {
    //     getCategory(){
    //       axios.get('/category-list')
    //         .then((response) => {
    //           this.categories = response.data;
    //         })
    //         .catch(function (error) {
    //           console.log(error);
    //         })
    //     },
    // }
}
</script>

<style scoped>

</style>