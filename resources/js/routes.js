
let login = require('./components/auth/login.vue').default;
let register = require('./components/auth/register.vue').default;
let forget = require('./components/auth/forget.vue').default;
let logout = require('./components/auth/logout.vue').default;
///end authentication------
let home = require('./components/home.vue').default;
 //category
let allcategory = require('./components/category/index.vue').default;
let addcategory = require('./components/category/create.vue').default;
let editcategory = require('./components/category/edit.vue').default;
 //coupon
let allcoupon = require('./components/coupon/index.vue').default;
let addcoupon = require('./components/coupon/create.vue').default;
let editcoupon = require('./components/coupon/edit.vue').default;
 //subcategory
let allsubcategory = require('./components/subcategory/index.vue').default;
let addsubcategory = require('./components/subcategory/create.vue').default;
let editsubcategory = require('./components/subcategory/edit.vue').default;
//brand
let addbrand = require('./components/brand/create.vue').default;
let allbrand = require('./components/brand/index.vue').default;
let editbrand = require('./components/brand/edit.vue').default;
//product
let addproduct = require('./components/product/create.vue').default;
let allproduct = require('./components/product/index.vue').default;
let editproduct = require('./components/product/edit.vue').default;
let product = require('./components/uroduct/product.vue').default;



export const routes = [
  { path: '/admin', component: login, name:'admin' },
  { path: '/register', component: register , name:'register' },
  { path: '/forget', component: forget , name:'forget' },
  { path: '/logout', component: logout , name:'logout' },
  { path: '/home', component: home , name:'home' },
  //category
  { path: '/all-category', component: allcategory , name:'all-category' },
  { path: '/add-category', component: addcategory , name:'add-category' },
  { path: '/edit-category', component: editcategory , name:'edit-category' },
    //coupon
  { path: '/all-coupon', component: allcoupon , name:'all-coupon' },
  { path: '/add-coupon', component: addcoupon , name:'add-coupon' },
  { path: '/edit-coupon', component: editcoupon , name:'edit-coupon' },
   //subcategory
  { path: '/all-subcategory', component: allsubcategory , name:'all-subcategory' },
  { path: '/add-subcategory', component: addsubcategory , name:'add-subcategory' },
  { path: '/edit-subcategory', component: editsubcategory , name:'edit-subcategory' },
  //brand
  { path: '/add-brand', component: addbrand , name:'add-brand' },
  { path: '/all-brand', component: allbrand , name:'all-brand' },
  { path: '/edit-brand', component: editbrand , name:'edit-brand' },
    //brand
  { path: '/add-product', component: addproduct , name:'add-product' },
  { path: '/all-product', component: allproduct , name:'all-product' },
  { path: '/edit-product', component: editproduct , name:'edit-product' },
  { path: '/product', component: product , name:'product' },
]