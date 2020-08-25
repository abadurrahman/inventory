 <template>
    <div>

  <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Category Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Category List
          <router-link to="/add-category" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Add Category</router-link>
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
               
                <tr v-for="(category,index) in filtersearch" :key="category.id">
                  <td>{{index+1}}</td>
                  <td>{{ category.category_name }}</td>
                  <td>
                    <router-link :to="{name: 'edit-category', params:{id: category.id} }" class="btn btn-sm btn-info">edit</router-link>
                    <a @click="deleteCategory(category.id)" class="btn btn-sm btn-danger">Delete</a>
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
        this.allCategory();
        },

        data(){
          return{
            categories:[],
            searchTerm:'',         
          }
        },
       computed:{
         filtersearch(){
          return this.categories.filter(category => {
             return category.category_name.match(this.searchTerm)
           })
         }
       },
        methods:{
          allCategory(){
            axios.get('/api/all-category/')
            .then(({data}) => (this.categories = data))
            .catch()
          },
          deleteCategory(id){
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
              axios.get('/api/delete-category/'+id)
              .then(()=>{
                 this.categories = this.categories.filter(category =>{
                    return category.id !=id
                 })
              })
              .catch(()=>{
                 this.$router.push({name: 'all-category'})
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
