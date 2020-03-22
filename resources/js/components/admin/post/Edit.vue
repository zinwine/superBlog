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
                <h3 class="card-title">Edit Post</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Edit Post</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter New Post Title">
                  </div>                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <router-link to="/post-list" class="btn btn-default">Cancel</router-link>
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

}
</script>

<style scoped>

</style>