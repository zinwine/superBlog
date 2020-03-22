<template>
        <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-around">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form @submit.prevent="editCategory()" role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="edit">Add New Category</label>
                    <input type="text" class="form-control" id="edit" name="cat_name" placeholder="Category Name" v-model="form.cat_name" :class="{ 'is-invalid': form.errors.has('cat_name') }">
                    <has-error :form="form" field="cat_name"></has-error>
                  </div>                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <router-link to="/category-list" class="btn btn-default">Cancel</router-link>
                  <button type="submit" class="btn btn-info text-white float-right" style="background-color: #17a2b8">Update</button>
                </div>
              </form>
            </div>
        </div>
            <!-- /.card -->

        <!-- /.row -->
      </div><!-- /.container-fluid -->
      </div><!-- /.container-fluid -->
    </section>
</template>

<script>
export default {
    name: 'Edit',
    mounted(){
      axios.get('/edit-category/' + this.$route.params.categoryid)
      .then((response) => {
        // this.form.cat_name = res.data.cat_name;
        this.form.fill(response.data.category)
      })
    },
    data () {
      return {
        // Create a new form instance
        form: new Form({
          cat_name: ''
        })
    }
  },
  methods: {
    editCategory(){
      this.form.post(`/edit-category/${this.$route.params.categoryid}`)
        .then((res) => { 
          this.$router.push('/category-list'),
          
            Toast.fire({
              icon: 'success',
              title: 'Category Edited successfully'
            })
        })
        .catch(() => {

        })   
    }
  }
}
</script>

<style scoped>

</style>