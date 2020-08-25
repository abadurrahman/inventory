 <template>
    <div>

  <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Coupon Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Coupon List
          <router-link to="/add-brand" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Add New</router-link>
          </h6>
           
           <br>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Brand Name</th>
                  <th class="wd-15p">Logo</th>
                  <th class="wd-20p">Action</th>               
                </tr>
              </thead>
              <tbody>
               
                <tr v-for="(brand,index) in filtersearch" :key="brand.id">
                  <td>{{index+1}}</td>
                  <td>{{ brand.brand_name }}</td>
                  <td><img :src="brand.photo" id="em_photo"></td>
                  <td>
                    <router-link :to="{name: 'edit-brand', params:{id: brand.id} }" class="btn btn-sm btn-info">Edit</router-link>
                    <a @click="deleteBrand(brand.id)" class="btn btn-sm btn-danger">Delete</a>
                  </td>               
                </tr>   
               
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->    
     </div>  
   </div>
 </div>
   

</template>


<script>

    export default {
      mounted(){
            if (!User.loggedIn()) {
               this.$router.push({ name:'admin' })
            } 
        },

        created(){
        this.allBrand();
        },

        data(){
          return{
            brands:[],
            searchTerm:''        
          }
        },
       computed:{
         filtersearch(){
          return this.brands.filter(brand => {
             return brand.brand_name.match(this.searchTerm)
           })
         }
       },
        methods:{
          allBrand(){
            axios.get('/api/all-brand/')
            .then(({data}) => (this.brands = data))
            .catch()
          },
          
        deleteBrand(id){
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.value) {
              axios.get('/api/delete-brand/'+id)
              .then(()=>{
                 this.brands = this.brands.filter(brand =>{
                    return brand.id !=id
                 })
              })
              .catch(()=>{
                 this.$router.push({name: 'all-brand'})
              })
              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
            }
           })
          }
        },
      
    }
      
</script>

<style>
  #em_photo{
  height: 45px;
  width: 50px;
}
</style>
