<template>
    <div class="lower-box">
    <div>
      <div class="row mb-3">
        <label for="inputRole3" class="col-sm-2 col-form-label">Select Role</label>
        <div class="col-sm-10">
            <select v-model="createTeam.team_member[index].roles_id" class="form-select" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option v-for="role in roles" :key="role.id" :value="role.id">{{ role.role_name }}</option>
            </select>
        </div>
      </div>
      <div class="row mb-3">
        <label for="inputRole3" class="col-sm-2 col-form-label">Assign Role </label>
        <div class="col-sm-10">
            <select @change="" v-model="createTeam.team_member[index].employees_id" class="form-select" aria-label="Default select example">
                <option selected>Open this select menu</option>
                <option v-for="employee in employees" :key="employee.id" :value="employee.id">{{ employee.employee_name }}</option>
            </select>
        </div>
      </div>
      <button @click="nextMember()" class="btn btn-primary">Next Member</button>
      <!-- <router-link to="/"> -->
        <button @click="create" class="btn btn-primary">Save User</button>
      <!-- </router-link> -->
      <router-link to="/team">
        <button class="btn btn-primary">Back to Teams</button>
      </router-link>
    </div>
    </div>
    </template>
    <script>
import { mapState } from 'vuex';

    export default {
        data() {
            return {
                index: 0,
                response:[
                {"success" : null},
                {"error" : null},
            ]

            }
        },
        created() {
            this.getRoles();
            this.getEmployees();
        },
        beforeUnmount(){
        this.createTeams();

    },
        
        computed: {
           // ...mapState({createTeam:this.$store.state.createTeam, this.$store.state.createTeam.team_member.push([1,2,3])})
            createTeam: {
                    get: function() {
                    return this.$store.state.createTeam;
                    },
            },
            roles: {
                    get: function() {
                    return this.$store.state.roles;
                    },
            },
            employees: {
                    get: function() {
                    return this.$store.state.employees;
                    },
            },
  
        },

        methods: {
        getRoles() {
            this.$store.dispatch('getRoles');
        },
        getEmployees() {
            this.$store.dispatch('getEmployees');
        },
        nextMember() {
            console.log(this.createTeam);
            this.index = this.index + 1;
            this.createTeam =this.createTeam.team_member.push({"teams_id" : null, "employees_id" : null, "roles_id" : null});
            this.$store.dispatch('setCreateTeam',this.createTeam);  
        },
        async create(createTeam) {
            console.log(this.createTeam);
        await axios.post('http://127.0.0.1:8000/api/team/store', this.createTeam).then((res) => {
            this.response.success = res.data;
            console.log(this.response.success);
        }).catch((error) => {
            this.response.error = error.response.data.message;
            console.log(this.response.error);
        })
    },
    createTeams() {
            this.$store.dispatch('createTeam');
        },
        
    },
    mutations: {
    }
    }
    </script> 
    