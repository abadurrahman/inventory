 <template>
    <div>

     <div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Starlight</a>
        <span class="breadcrumb-item active">Electronic Section</span>
      </nav>
      <div class="sl-pagebody">
           <div class="card pd-20 pd-sm-40">
        <h6 class="card-body-title">Add Brand
          <router-link to="/all-brand" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">All Brand</router-link>
          </h6>

       <form @submit.prevent="brandInsert">      
         <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Brand Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" v-model="form.brand_name"> 
                  <small class="text-danger" v-if="errors.brand_name">{{ errors.brand_name[0] }}</small>                 
                </div>
             </div>

             <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Brand Logo: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="file" @change="onFileselected">
                  <small class="text-danger" v-if="errors.photo">{{ errors.photo[0] }}</small>
              </div>
             </div>
             <br>
             <div class="col-md-6">
        	   <img :src="form.photo" style="height:40px; width: 40px; margin-top:25px;">
        	  </div>

            </div>
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Submit </button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
          </form>
        </div><!-- card -->
       
      </div><!-- sl-pagebody --> 
    </div><!-- sl-mainpanel -->
   </div>
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
              brand_name :'',
              photo:''

            },
            errors:{},
          }
        },
        

        methods:{   
          onFileselected(event){
            let file=event.target.files[0];
            if (file.size > 1048770) {
              Notification.image_validation()
            }else{
              let reader = new FileReader();
              reader.onload = event => {
                this.form.photo = event.target.result

                console.log(event.target.result);
              };
              reader.readAsDataURL(file);

            }
          },
          brandInsert(){
            axios.post('/api/brand/',this.form)
            .then(() => {
              this.$router.push({ name: 'all-brand' })
              Notification.success()
            })
            .catch(error => this.errors = error.response.data.errors)
          },
          
        }

      
    }
  
</script>

<style>
	
#add_new{
	float: right;
}

</style>
