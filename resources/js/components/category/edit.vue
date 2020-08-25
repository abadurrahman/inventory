 <template>
   <div>

     <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Starlight</a>
        <span class="breadcrumb-item active">Electronic Section</span>
      </nav>
      <div class="sl-pagebody">
           <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Add Category
          <router-link to="/all-category" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">All Category</router-link>
          </h6>

       <form @submit.prevent="categoryUpdate">      
         <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Category Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" v-model="form.category_name">
                  <small class="text-danger" v-if="errors.category_name">{{ errors.category_name[0] }}</small>
                </div>

             </div>

            </div>
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Submit </button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
          </form>
        </div><!-- card -->
       
      </div><!-- sl-pagebody --> 
    </div><!-- sl-mainpanel --> </div>
   

</template>


<script>

    export default {
      mounted(){
            if (!User.loggedIn()) {
               this.$router.push({ name:'admin' })
            } 
        },
        data(){
          return{
            form:{
              category_name :''
            
            },
            errors:{},
          }
        },
        created(){
          let id = this.$route.params.id
          axios.get('/api/show-category/'+id)
          .then(({data}) => (this.form = data))
          .catch()
        },
        methods:{   
          categoryUpdate(){
            let id = this.$route.params.id
            axios.post('/api/update-category/'+id,this.form)
            .then(() => {
              this.$router.push({ name: 'all-category' })
              Notification.success()
            })
            .catch(error => this.errors = error.response.data.errors)
          },
          
        }

    }



  
</script>

<style type="text/css">
  
</style>
