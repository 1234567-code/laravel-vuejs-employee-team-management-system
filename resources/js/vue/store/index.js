import vuex from 'vuex';
//import vue from 'vue';
//vue.use(vuex);
import { createStore } from 'vuex';

const store =new vuex.Store({
    state: {
        userAccounts: [],
        createUserAccount: {},
        teams: [],
        createTeam: {},
        roles: [],
        employees: [],
    },

    actions: {
        getAccount({commit}) {
            commit('getUserAccounts');
        },
        createAccount({commit}) {
            commit('createUserAccount');
        },
        setCreateUserAccount({commit},createUserAccount){
            commit('setUserAccount', createUserAccount);
            //console.log(createUserAccount);
        },
        getTeams({commit}) {
            commit('getTeams');
        },
        createTeam({commit}) {
            commit('createTeam');
        },
        setCreateTeam({commit},createTeam){
            commit('setTeam', createTeam);
        },
        getRoles({commit}) {
            commit('getRoles');
        },
        createRole({commit}) {
            commit('createRole');
        },
        setCreateRole({commit},createRole){
            commit('setRole', createRole);
        },
        getEmployees({commit}) {
            commit('getEmployees');
        },
    },
    
    mutations: {
        async getUserAccounts(state) {
            await axios.get('http://localhost:8000/api/user-account/index').then((response) => {
                state.userAccounts = response.data;
            });
        },
        async createUserAccount(state) {
            await axios.get('http://localhost:8000/api/user-account/create').then((response) => {
                state.createUserAccount = response.data;
            });
        },
        setUserAccount(state, createUserAccount) {
            state.createUserAccount = createUserAccount;
        },
        async getTeams(state) {
            await axios.get('http://localhost:8000/api/team/index').then((response) => {
                state.teams = response.data;
            });
        },
        async createTeam(state) {
            await axios.get('http://localhost:8000/api/team/create').then((response) => {
                state.createTeam = response.data;
                console.log(state.createTeam);
            });
        },
        setTeam(state, createTeam) {
            state.createTeam = createTeam;
        },
        async getRoles(state) {
            await axios.get('http://localhost:8000/api/role/index').then((response) => {
                state.roles = response.data;
                //console.log(response.data);
            });
        },
        async createRole(state) {
            await axios.get('http://localhost:8000/api/role/create').then((response) => {
                state.createRole = response.data;
                //console.log(state.createTeam);
            });
        },
        setRole(state, createRole) {
            state.createRole = createRole;
        },
        async getEmployees(state) {
            await axios.get('http://localhost:8000/api/employee/index').then((response) => {
                state.employees = response.data;
                //console.log(response.data);
            });
        },

    },
})

export default store;