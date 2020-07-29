<template>

<div>
	<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-md-100v">

      <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">starlight <span class="tx-info tx-normal">admin</span></div>
        <div class="tx-center mg-b-60">Professional Admin Template Design</div>

       <form @submit.prevent="signup">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Fullname" v-model="form.name">
          <small class="text-danger" v-if="errors.name" style="color: red;"> {{ errors.name[0] }} </small>
        </div><!-- form-group -->
        <div class="form-group">
          <input type="email" class="form-control" placeholder="Email address" v-model="form.email">
          <small class="text-danger" v-if="errors.email" style="color: red;"> {{ errors.email[0] }} </small>
        </div><!-- form-group -->
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Password" v-model="form.password">
          <small class="text-danger" v-if="errors.password" style="color: red;"> {{ errors.password[0] }} </small>
        </div><!-- form-group -->
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Conferm password" v-model="form.password_confirmation">
        </div><!-- form-group -->
       <br>
        <button type="submit" class="btn btn-info btn-block">Register</button>
      </form>


        <div class="mg-t-40 tx-center">Already have an account?
        <router-link to="/" class="tx-info">Log In</router-link></div>
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
        name: null,
        email: null,
        password: null,
        confirm_password: null
      },
      errors:{},
    }
  },
  methods:{
    signup(){
      axios.post('/api/auth/signup',this.form)
      .then(res => { 
        User.responseAfterLogin(res)
        Toast.fire({
          type: 'success',
          title: 'Signed in successfully'
        })
        this.$router.push({ name : 'home'})
      })
      .catch(error => this.errors = error.response.data.errors)
    }
  }

}
</script>


<style type="text/css">
	
</style>