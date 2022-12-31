<template>
<div class="lower-box">
<div>
  <div class="row mb-3">
    <label for="inputUsername3" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputUsername3" v-model="createUserAccount.username">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" v-model="createUserAccount.password">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail3" v-model="createUserAccount.email">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputFirstName3" class="col-sm-2 col-form-label">First Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputFirstName3" v-model="createUserAccount.first_name">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputLastName3" class="col-sm-2 col-form-label">Last Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputLastName3" v-model="createUserAccount.last_name">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputIsProjectManager3" class="col-sm-2 col-form-label">Is Project Manager</label>
    <div class="col-sm-10">
      <input type="boolean" class="form-control" id="inputIsProjectManager3" v-model="createUserAccount.is_project_manager">
    </div>
  </div>
  <router-link to="/user-account/create-emp">
    <button @click="save(createUserAccount)" class="btn btn-primary">Save User</button>
  </router-link>
</div>
</div>
</template>
<script>

export default {
    data() {
        return {
        }
    },
    created() {
     
    },
    mounted() {
        this.createAccount();
    },
    computed: {
    createUserAccount: {
    get: function() {
      return this.$store.state.createUserAccount;
    },
  },
  
},
    methods: {
        createAccount() {
            this.$store.dispatch('createAccount');
        },
        save(createUserAccount) {
      //console.log(this.createUserAccount);
      this.$store.dispatch('setCreateUserAccount',createUserAccount);
    }
    },
    
}
</script> 
