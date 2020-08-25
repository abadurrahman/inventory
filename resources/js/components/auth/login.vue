<template>

<div>
	
    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Smart <span class="tx-info tx-normal">Shop</span></div>
        <div class="tx-center mg-b-60">ecommerce project</div>

      <form @submit.prevent="login">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Enter your email" v-model="form.email">
          <small class="text-danger" v-if="errors.email" style="color: red;"> {{ errors.email[0] }} </small>
        </div><!-- form-group -->
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Enter your password" v-model="form.password">
          <small class="text-danger" v-if="errors.password"> {{ errors.password[0] }} </small>
          <router-link to="/forget" class="tx-info tx-12 d-block mg-t-10">Forgot password?</router-link>
        </div><!-- form-group -->
        <button type="submit" class="btn btn-info btn-block">Log In</button>
      </form>

        <div class="mg-t-60 tx-center">Not yet a member?
          <router-link to="/register" class="tx-info">Register</router-link></div>
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
        email: null,
        password: null
      },
      errors:{},
    }
  },
  methods:{
    login(){
      axios.post('/api/auth/login',this.form)
      .then(res => { 
        User.responseAfterLogin(res)
        Toast.fire({
          type: 'success',
          title: 'Signed in successfully'
        })
        this.$router.push({ name : 'home'})
      })
      .catch(error => this.errors = error.response.data.errors)
      .catch(
         Toast.fire({
          type: 'warning',
          title: 'Invalid Email Or Password !'
        })
      )
    }
  }

}
</script>




