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
                <h3 class="card-title">Add Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form @submit.prevent="addCategory()" role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="new">Add New Category</label>
                    <input type="text" class="form-control" id="new" name="cat_name" placeholder="Enter New Category" v-model="form.cat_name" :class="{ 'is-invalid': form.errors.has('cat_name') }">
                    <has-error :form="form" field="cat_name"></has-error>
                  </div>                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <router-link to="/category-list" class="btn btn-default">Cancel</router-link>
                  <button type="submit" class="btn btn-info text-white float-right" style="background-color: #17a2b8">Save</button>
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
    name: 'New',
    data () {
      return {
        // Create a new form instance
        form: new Form({
          cat_name: ''
        })
    }
  },
  methods: {
    addCategory(){
      this.form.post('/add-category')
        .then((res) => { 
          this.$router.push('/category-list'),
          
            Toast.fire({
              icon: 'success',
              title: 'Category Added successfully'
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