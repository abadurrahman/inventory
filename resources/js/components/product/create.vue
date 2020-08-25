<template>
<div>
  
<div class="sl-mainpanel">
      <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="#">Starlight</a>
        <span class="breadcrumb-item active">Product Section</span>
      </nav>
      <div class="sl-pagebody">
           <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">New Product Add <a href="#" class="btn btn-info btn-sm pull-right">All Product</a></h6>
          <p class="mg-b-20 mg-sm-b-30">New product add form</p>
          <form enctype="multipart/form-data">
           
           <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" v-model="form.product_name" >
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Code: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" v-model="form.product_code" >
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Quantity <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text"  v-model="form.product_quantity">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose Category" v-model="form.category_id">
                   
                    <option :value="category.id" v-for="category in categories">{{ category.category_name }}</option>
                    
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Sub Category: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" v-model="form.subcategory_id">
                    
                    <option :value="subcategory.id" v-for="subcategory in subcategories">{{ subcategory.subcategory_name }}</option>
                    
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                  <select class="form-control select2" data-placeholder="Choose country" v-model="form.brand_id">
                    <option label="Choose Brand"></option>
                    
                    <option :value="brand.id" v-for="brand in brands">{{ brand.brand_name }}</option>
                    
                  </select>
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Size: <span class="tx-danger">*</span></label><br>
                  <input class="form-control" type="text" id="size" data-role="tagsinput" v-model="form.product_size">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Product Color: <span class="tx-danger">*</span></label><br>
                  <input class="form-control lg-4" type="text" data-role="tagsinput" id="color" v-model="form.product_color">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Selling Price <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text"  placeholder="Selling Price" v-model="form.selling_price">
                </div>
              </div><!-- col-4 -->

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Product Details<span class="tx-danger">*</span></label>
                   <textarea class="form-control" id="summernote">
                    
                   </textarea>
                </div>  
              </div>
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label">Video Link<span class="tx-danger">*</span></label>
                   <input class="form-control" placeholder="video link" v-model="form.video_link">
                </div>  
              </div>

              <div class="col-lg-4">
                <label>Image One (Main Thumbnail One)<span class="tx-danger">*</span></label>
                <label class="custom-file">
                <input type="file" id="file" class="custom-file-input" required="" @change="onFileselectedone">
                <span class="custom-file-control"></span>
                <img :src="form.image_one" id="one" style="height:40px; width:40px," >
              </label>
              </div>
              <div class="col-lg-4">
                <label>Image One (Main Thumbnail Two)<span class="tx-danger">*</span></label>
                <label class="custom-file">
                <input type="file" id="file" class="custom-file-input" required="" @change="onFileselectedtwo">
                <span class="custom-file-control"></span>
                <img :src="form.image_one_1" id="one_1" style="height:40px; width:40px,">
              </label>
              </div>
              <div class="col-lg-4">
                <label>Image Two <span class="tx-danger">*</span></label>
                <label class="custom-file">
                <input type="file" id="file" class="custom-file-input" required="" @change="onFileselectedthree">
                <span class="custom-file-control"></span>
                <img :src="form.image_two" id="two" style="height:40px; width:40px,">
              </label>
              </div>
              <div class="col-lg-4">
                <label>Image Three <span class="tx-danger">*</span></label>
                <label class="custom-file">
                <input type="file" id="file" class="custom-file-input" required="" @change="onFileselectedfour">
                <span class="custom-file-control"></span>
                <img :src="form.image_three" id="three" style="height:40px; width:40px,">
              </label>
              </div>
              <div class="col-lg-4">
                <label>Image Four <span class="tx-danger">*</span></label>
                <label class="custom-file">
                <input type="file" id="file" class="custom-file-input" required="" @change="onFileselectedfive">
                <span class="custom-file-control"></span>
                <img :src="form.image_four" id="four" style="height:40px; width:40px,">
              </label>
              </div>
            </div><!-- row -->
            <br><hr>
            <div class="row">
              <div class="col-lg-4">
                <label class="ckbox">
            <input type="checkbox" v-model="form.newarrivals_one" value="1">
            <span>New Arrivals One</span>
          </label>
              </div>
              <div class="col-lg-4">
                <label class="ckbox">
            <input type="checkbox" v-model="form.newarrivals_two" value="1">
            <span>New Arrivals Two</span>
          </label>
              </div>
              <div class="col-lg-4">
                <label class="ckbox">
            <input type="checkbox" v-model="form.newarrivals_three" value="1">
            <span>New Arrivals Three</span>
          </label>
              </div>
              <div class="col-lg-4">
                <label class="ckbox">
            <input type="checkbox" v-model="form.newarrivals_four" value="1">
            <span>New Arrivals Four</span>
          </label>
              </div>
              <div class="col-lg-4">
                <label class="ckbox">
            <input type="checkbox" v-model="form.newarrivals_five" value="1">
            <span>New Arrivals Five</span>
          </label>
              </div>
              <div class="col-lg-4">
                <label class="ckbox">
            <input type="checkbox" v-model="form.latest_design" value="1">
            <span>Latest Design</span>
          </label>
              </div>
              <div class="col-lg-4">
                <label class="ckbox">
            <input type="checkbox" v-model="form.special_offer" value="1">
            <span>Special Offer</span>
          </label>
              </div>
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" v-model="form.collection" value="1">
                  <span>Collection</span>
                </label>
              </div>

            </div>

            <br><br><hr>
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
              product_name :'',
              product_code :'',
              product_quantity:'',
              category_id:'',
              subcategory_id :'',
              brand_id:'',
              product_size : '',
              product_color:'',
              selling_price:'',
              product_details:'',
              video_link:'',
              image_one:'',
              image_one_1:'',
              image_two:'',
              image_three:'',
              image_four:'',
              newarrivals_one:'',
              newarrivals_two:'',
              newarrivals_three:'',
              newarrivals_four:'',
              newarrivals_five:'',
              latest_design:'',
              special_offer:'',
              collection:'',
            },
            errors:{},
            categories:{},
            subcategories:{},
            brands:{},
          }
        },
        

        methods:{   
          onFileselectedone(event){
            let file=event.target.files[0];
            if (file.size > 1048770) {
              Notification.image_validation()
            }else{
              let reader = new FileReader();
              reader.onload = event => {
                this.form.image_one = event.target.result

                console.log(event.target.result);
              };
              reader.readAsDataURL(file);

            }
          },
          onFileselectedtwo(event){
            let file=event.target.files[0];
            if (file.size > 1048770) {
              Notification.image_validation()
            }else{
              let reader = new FileReader();
              reader.onload = event => {
                this.form.image_one_1 = event.target.result

                console.log(event.target.result);
              };
              reader.readAsDataURL(file);

            }
          },
          onFileselectedthree(event){
            let file=event.target.files[0];
            if (file.size > 1048770) {
              Notification.image_validation()
            }else{
              let reader = new FileReader();
              reader.onload = event => {
                this.form.image_two = event.target.result

                console.log(event.target.result);
              };
              reader.readAsDataURL(file);

            }
          },
          onFileselectedfour(event){
            let file=event.target.files[0];
            if (file.size > 1048770) {
              Notification.image_validation()
            }else{
              let reader = new FileReader();
              reader.onload = event => {
                this.form.image_three = event.target.result

                console.log(event.target.result);
              };
              reader.readAsDataURL(file);

            }
          },
          onFileselectedfive(event){
            let file=event.target.files[0];
            if (file.size > 1048770) {
              Notification.image_validation()
            }else{
              let reader = new FileReader();
              reader.onload = event => {
                this.form.image_four = event.target.result

                console.log(event.target.result);
              };
              reader.readAsDataURL(file);

            }
          },
          productInsert(){
            axios.post('/api/product/',this.form)
            .then(() => {
              this.$router.push({ name: 'all-product' })
              Notification.success()
            })
            .catch(error => this.errors = error.response.data.errors)
          },

        },

          created(){
          axios.get('/api/all-category')
          .then(({data}) => (this.categories = data))

          axios.get('/api/all-subcategory/')
          .then(({data}) => (this.subcategories = data))

          axios.get('/api/all-brand/')
          .then(({data}) => (this.brands = data))
        },
           
      }
     
</script>

<style>
	
</style>