<template>
    <!-- <div> -->
        <!-- <h2>Category List</h2> -->
         <!-- Main content -->
    <section class="content">
      <div class="row justify-content-around">
        <div class="col-10">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Category List</h3>
              <div class="card-tools">
                  <button class="btn btn-primary">
                    <router-link to="/add-category" class="text-white"><i class="fa fa-plus"></i> Add New Category</router-link>
                    </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>
                          <button class="btn btn-danger btn-sm" @click="allSelect" v-if="selectAll == false">Select All</button>
                          <button class="btn btn-danger btn-sm" @click="allSelect" v-else>DeSelect</button>
                          <br>
                          <br>
                          <i v-if="categoryItem.length > 0 || selectAll == true" class="fa fa-trash text-danger" style="cursor: pointer;border: 1px solid gray;padding: 5px 7px;border-radius: 3px" @click="deleteSelected"> Delect</i>
                        </th>
                        <th>No.</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(category, index) in getAllCategory" :key="category.id">
                        <td><input type="checkbox" name="" id="" v-model="categoryItem" :value="category.id"></td>
                        <td>{{ index + 1 }}</td>
                        <td>{{ category.cat_name }}</td>
                        <td>{{ category.created_at | timeformat}}</td>
                        <td>
                            <router-link :to="`/edit-category/${category.id}`" class="btn btn-warning" style="color: #108c2b"><i class="fa fa-edit"></i></router-link>
                            <!-- <a href="#" class="btn btn-warning" style="color: #108c2b"  @click.prevent="editCategory(category.id)">Edit</a> -->
                            <a href="#" class="btn btn-danger" @click.prevent="deleteConfirmCategory(category.id)"><i class="fa fa-trash"></i></a>
                            <!-- <a href="#" class="btn btn-danger" @click.prevent="deleteCategory(category.id)">Delete</a> -->
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
    data(){
      return {
        categoryItem: [],
        selectAll: false

      }
    },
    mounted(){
      this.$store.dispatch("allCategory")
    },
    computed: {
      getAllCategory(){
         return this.$store.getters.getCategory
      }
    },
    methods: {
      deleteConfirmCategory(id){
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.value) {
          
            axios.get('/category/' + id)
            .then(() => {
              this.$store.dispatch("allCategory")
              // Toast.fire({
              //   icon: 'success',
              //   title: 'Category Deleted successfully'
              // })
                Swal.fire(
                'Category Deleted successfully!',
                'Your file has been deleted.',
                'success'
              )
      
            })
          }
        })
      },
        deleteSelected(id){
          if(this.categoryItem != ''){
            Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
              if (result.value) {
                axios.get('/category-delete/' + this.categoryItem)
                    .then(() => {
                      this.$store.dispatch("allCategory")
                      this.categoryItem = []
            Swal.fire(
                    'Category Deleted successfully!',
                    'Your file has been deleted.',
                    'success'
                  )
          
                })
              }else{
                if(this.selectAll == true){
                  this.selectAll = false;
                }
                this.categoryItem = []
              }
            })
          }else{
            alert("Please Select One for Delete")
          }
        },
        allSelect(){
            if(this.selectAll == false){
                this.selectAll = true;
                for(var cat_id in this.getAllCategory){
                  this.categoryItem.push(this.getAllCategory[cat_id].id)
                }
                // alert(this.categoryItem)
            }else{
              this.selectAll = false;
              this.categoryItem = []
            }
            
        }   
    } 
    //   deleteCategory(id){
          
    // }
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