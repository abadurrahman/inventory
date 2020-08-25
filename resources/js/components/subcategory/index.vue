 <template>
    <div>

  <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>SubCategory Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">SubCategory List
          <router-link to="/add-subcategory" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Add SubCategory</router-link>
          </h6>
           
           <br>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Category Name</th>
                  <th class="wd-20p">Action</th>               
                </tr>
              </thead>
              <tbody>
               
                <tr v-for="(subcategory,index) in filtersearch" :key="subcategory.id">
                  <td>{{index+1}}</td>
                  <td>{{ subcategory.subcategory_name }}</td>
                  <td>
                    <router-link :to="{name: 'edit-subcategory', params:{id: subcategory.id} }" class="btn btn-sm btn-info">edit</router-link>
                    <a @click="deleteSubCategory(subcategory.id)" class="btn btn-sm btn-danger">Delete</a>
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
        this.allSubCategory();
        },

        data(){
          return{
            subcategories:[],
            searchTerm:'',         
          }
        },
       computed:{
         filtersearch(){
          return this.subcategories.filter(subcategory => {
             return subcategory.subcategory_name.match(this.searchTerm)
           })
         }
       },
        methods:{
          allSubCategory(){
            axios.get('/api/all-subcategory/')
            .then(({data}) => (this.subcategories = data))
            .catch()
          },
          deleteSubCategory(id){
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
              axios.get('/api/delete-subcategory/'+id)
              .then(()=>{
                 this.subcategories = this.subcategories.filter(subcategory =>{
                    return subcategory.id !=id
                 })
              })
              .catch(()=>{
                 this.$router.push({name: 'all-subcategory'})
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

<style type="text/css">
  
</style>
