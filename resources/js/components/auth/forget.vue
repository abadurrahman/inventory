<template>

<div>
	
    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">starlight <span class="tx-info tx-normal">admin</span></div>
        <div class="tx-center mg-b-60">Professional Admin Template Design</div>

        
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Existing Email Address" v-model="form.email">
        </div><!-- form-group -->
        <button type="submit" class="btn btn-info btn-block">Forget Password</button>

        <div class="mg-t-20 tx-center">
          <router-link to="admin" class="tx-info">Back to LogIn</router-link></div>
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->
</div>

</template>

<script type="text/javascript">
 export default { 
  created(){
    if (User.loggedIn()) {
      this.$router.push({name : 'home'})
    }
  },
  data(){
    return {
      form:{
        email: null
      },
      errors:{},
    }
  },
}
</script>

<style type="text/css">
	
</style>

