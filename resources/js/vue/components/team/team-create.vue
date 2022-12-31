<template>
    <div class="lower-box">
    <div>
      <div class="row mb-3">
        <label for="inputTeamName3" class="col-sm-2 col-form-label">Team Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputTeamName3" v-model="createTeam.team_name">
        </div>
      </div>
      <router-link to="/team/create-team-member">
        <button @click="save()" class="btn btn-primary">Save User</button>
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
        console.log(this.createTeam.team_name);
    
    },
    mounted() {
    
    },
    computed: {
    createTeam: {
    get: function() {
      return this.$store.state.createTeam;
    },
  },
  
},
    methods: {
        save(createTeam) {
        this.$store.dispatch('setCreateTeam', this.createTeam);
        },
    },
    }
        
    </script> 
    