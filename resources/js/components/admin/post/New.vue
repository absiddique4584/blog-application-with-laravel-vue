<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add New Post</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" enctype="multipart/form-data" @submit.prevent="addnewPost()" >
                            <div class="card-body">


                                <div class="form-group">
                                    <label for="postId">Title</label>
                                    <input type="text" class="form-control" id="postId" placeholder="Add New Title"
                                           v-model="form.title" name="title" :class="{ 'is-invalid': form.errors.has('title') }">
                                    <has-error :form="form" field="title"></has-error>
                                </div>


                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" placeholder="Description"
                                           v-model="form.description" name="description" :class="{ 'is-invalid': form.errors.has('description') }">
                                    </textarea>
                                  <!--<v-md-editor v-model="form.description" height="200px"></v-md-editor>-->
                                    <has-error :form="form" field="description"></has-error>
                                </div>


                                <div class="form-group">
                                    <label >Select Category</label>
                                    <select   class="form-control" v-model="form.cat_id" :class="{ 'is-invalid': form.errors.has('cat_id') }"  >
                                        <option value="" disabled>Select One</option>
                                        <option :value="category.id" v-for="category in getallCategory">{{ category.cat_name }}</option>
                                    </select>
                                    <has-error :form="form" field="cat_id"></has-error>
                                </div>



                                <div class="form-group">
                                    <label >Photo</label>
                                    <input @change="changePhoto($event)" type="file" name="photo" :class="{ 'is-invalid': form.errors.has('photo') }" >
                                    <img width="80" height="80"  :src="form.photo" alt="" >
                                    <has-error :form="form" field="photo"></has-error>
                                </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save Post</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</template>

<script>
    export default {
        name: "New",
        data(){
            return {
                form: new Form({
                    title:'',
                    description:'',
                    cat_id:'',
                    photo:'',
                })
            }
        },
        mounted() {
            this.$store.dispatch('allCategory');
        },
        computed:{
            getallCategory(){
                return this.$store.getters.getCategory
            }
        },
        methods:{
            changePhoto(event){
                let file = event.target.files[0];
                if (file.size>1048576){

                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>This File Is Too Much Big</a>'
                    })

                }else{
                    let reader = new FileReader();
                    reader.onload = event => {
                        this.form.photo = event.target.result
                    };

                    reader.readAsDataURL(file);
                }

            },
            addnewPost(){
               this.form.post('/savepost')
                   .then((response)=>{
                       this.$router.push('/post-list')
                       toast.fire({
                           icon: 'success',
                           title: 'Post added successfully'
                       })
                   })
                .catch(()=>{

                })
            }

        }
    }
</script>

<style scoped>

</style>
