<template>
    <div class="lower-box">
    <div>
      <div class="row mb-3">
        <label for="inputTeamName3" class="col-sm-2 col-form-label">Role Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputTeamName3" v-model="createRole.role_name">
        </div>
      </div>
      <!-- <router-link to="/create"> -->
        <button @click="create()" class="btn btn-primary">Save Role</button>
      <!-- </router-link> -->
      <router-link to="/role">
        <button class="btn btn-primary">Back to Roles</button>
      </router-link>
    </div>
    </div>
    </template>
    <script>
    export default {
        data() {
        return {
            response:[
                {"success" : null},
                {"error" : null},
            ]
        }
    },
    created() {
        //console.log(this.createTeam.team_name);
    
    },
    mounted() {
    
    },
    computed: {
    createRole: {
    get: function() {
      return this.$store.state.createRole;
    },
  },
  
},
    methods: {
        async create(createRole) {
            console.log(this.createRole);
        await axios.post('http://127.0.0.1:8000/api/role/store', this.createRole).then((res) => {
            this.response.success = res.data;
            console.log(res);
        }).catch((error) => {
            this.response.error = error.response.data.message;
            console.log(error);
        })
    },
    },
    }
        
    </script> 
    