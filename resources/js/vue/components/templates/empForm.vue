<template>
    <form>
        <div v-if="this.response.success != null">{{ this.response.success }}</div>
        <div v-else-if="this.response.error != null">{{ this.response.error }}</div>
        <div v-else class="row mb-3">
            <label for="inputEmployeeCode3" class="col-sm-2 col-form-label">Employee Code</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputEmployeeCode3" v-model="createUserAccount.employee.employee_code">
        </div>
      </div>  
      <!-- <router-link to="/user-account"> -->
        <button type="submit" @click="createEmpUserAccount(createUserAccount)" class="btn btn-primary">Save User Employee</button>
      <!-- </router-link>  -->
      <router-link to="/user-account">
        <button type="submit" class="btn btn-primary">Back to User Account</button>
      </router-link>   
      
    </form>
</template>
<script>
import axios from 'axios';

export default {
    data() {
        return {
            response:[
                {"success" : null},
                {"error" : null},
            ]
        }
    },

    computed: {
        // createAccount() {
        //     return this.$store.state.createUserAccount;
        // },

    createUserAccount: {
    get: function() {
      return this.$store.state.createUserAccount;
    },
  },
},
methods: {
    async createEmpUserAccount(createUserAccount) {
        await axios.post('http://127.0.0.1:8000/api/user-account/store', createUserAccount).then((res) => {
            //console.log(res);
            this.response.success = res.data;
            console.log(this.response);
        }).catch((error) => {
            this.response.error = error.response.data.message;
            console.log(this.error);
        })
        //console.log(createUserAccount);
    },
}

}
</script>