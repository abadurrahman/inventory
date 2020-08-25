 <template>
   <div>

     <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Starlight</a>
        <span class="breadcrumb-item active">Electronic Section</span>
      </nav>
      <div class="sl-pagebody">
           <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Add SubCategory
          <router-link to="/all-subcategory" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">All SubCategory</router-link>
          </h6>

       <form @submit.prevent="subcategoryInsert">      
         <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">SubCategory Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" v-model="form.subcategory_name">
                  <small class="text-danger" v-if="errors.subcategory_name">{{ errors.subcategory_name[0] }}</small>
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
              subcategory_name:''
            },
            errors:{},
          }
        },

      methods:{
        subcategoryInsert(){
          axios.post('/api/subcategory',this.form)
          .then(() => {
            this.$router.push({ name: 'all-subcategory' })
            Notification.success()
          })
          .catch(error => this.errors = error.response.data.errors)
        },
      }  
}
</script>

<style type="text/css">
  
</style>
