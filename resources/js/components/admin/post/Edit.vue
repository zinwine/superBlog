<template>
        <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row justify-content-around">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Edit Post</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" enctype="multipart/form-data" @submit.prevent="editPost()">
                <div class="card-body">
                  <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" v-model="form.title" :class="{ 'is-invalid': form.errors.has('title') }">
                    <has-error :form="form" field="title"></has-error>
                  </div>                 
                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="cat_id" v-model="form.cat_id" :class="{ 'is-invalid': form.errors.has('cat_id') }">
                      <option value="">Select One</option>
                      <option v-for="category in getAllCategory" :key="category.id" :value="category.id">{{category.cat_name}}</option>
                    </select>
                    <has-error :form="form" field="cat_id"></has-error>
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <!-- <markdown-editor height="100" toolbar="bold italic heading | image link | numlist bullist code quote | preview fullscreen | upload" v-model="form.description"></markdown-editor> -->
                    <textarea class="form-control" name="description" id="" cols="30" rows="5" v-model="form.description" :class="{ 'is-invalid': form.errors.has('description') }"></textarea>
                    <has-error :form="form" field="description"></has-error>
                  </div>
                  <div class="form-group">
                    <label for="photo">Photo</label><br>
                    <input type="file" class="" id="photo" name="photo" @change="changePhoto($event)">
                    <img :src="updateImage()" width="200" height="120" alt="">
                    <has-error :form="form" field="photo"></has-error>
                    <!-- ******************* File  -->
                      <!-- <label for="exampleInputFile">Photo</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="exampleInputFile" :class="{ 'is-invalid': form.errors.has('photo') }">
                          <has-error :form="form" field="photo"></has-error>
                          <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text" id="">Upload</span>
                        </div>
                      </div> -->
                  </div>
                </div>
                <div class="card-footer">
                  <router-link to="/post-list" class="btn btn-default">Cancel</router-link>
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
  data () {
      return {
        form: new Form({
          title: '',
          description: '',
          cat_id: '',
          photo: ''
        })
    }
  },
  mounted(){
      this.$store.dispatch("allCategory")
    },
    created(){
      // this.$store.dispatch("allCategory")
      axios.get('/edit-post/' + this.$route.params.postid)
      .then((response) => {
        // this.form.cat_name = res.data.cat_name;
        this.form.fill(response.data.post)
      })
    },
    computed: {
      getAllCategory(){
         return this.$store.getters.getCategory
      }
    },
    methods: {
        changePhoto(event){
          let file = event.target.files[0];

          if(file.size > 1048586){
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Somethin went wrong!',
                footer: 'Why not'
              })
          }else{

            let reader = new FileReader();

            reader.onload = event => {
                this.form.photo = event.target.result;
            }
            reader.readAsDataURL(file); 
          }
        },
         editPost(){
            this.form.post(`/edit-post/${this.$route.params.postid}`)
              .then((res) => { 
                this.$router.push('/post-list'),
                
                  Toast.fire({
                    icon: 'success',
                    title: 'Post Edited successfully'
                  })
              })
              .catch(() => {

              })   
          },
          updateImage(){
            let img = this.form.photo;
            if(img.length > 100){
              return img;
            }else{
              return 'uploads/' + img;
            }
          }
    }
}
</script>

<style scoped>

</style>