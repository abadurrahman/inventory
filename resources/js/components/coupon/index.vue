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
          <router-link to="/add-coupon" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Add Coupon</router-link>
          </h6>
           
           <br>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Coupon Code</th>
                  <th class="wd-15p">Discount</th>
                  <th class="wd-20p">Action</th>               
                </tr>
              </thead>
              <tbody>
               
                <tr v-for="(coupon,index) in filtersearch" :key="coupon.id">
                  <td>{{index+1}}</td>
                  <td>{{ coupon.coupon_name }}</td>
                  <td>{{ coupon.discount }}</td>
                  <td>
                    <router-link :to="{name: 'edit-coupon', params:{id: coupon.id} }" class="btn btn-sm btn-info">edit</router-link>
                    <a @click="deleteCoupon(coupon.id)" class="btn btn-sm btn-danger">Delete</a>
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
        this.allCoupon();
        },

        data(){
          return{
            coupons:[],
            searchTerm:'',         
          }
        },
       computed:{
         filtersearch(){
          return this.coupons.filter(coupon => {
             return coupon.coupon_name.match(this.searchTerm)
           })
         }
       },
        methods:{
          allCoupon(){
            axios.get('/api/all-coupon/')
            .then(({data}) => (this.coupons = data))
            .catch()
          },
          deleteCoupon(id){
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
              axios.get('/api/delete-coupon/'+id)
              .then(()=>{
                 this.coupons = this.coupons.filter(coupon =>{
                    return coupon.id !=id
                 })
              })
              .catch(()=>{
                 this.$router.push({name: 'all-coupon'})
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
