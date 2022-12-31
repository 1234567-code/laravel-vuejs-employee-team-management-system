<template>
    <div class="lower-box">
            <span class="all">All</span>
            <div class="line-break"></div>
            <form class="d-flex search-form" role="search">
                <input class="form-control me-2 search-emp" type="search" placeholder="Search userAccounts" aria-label="Search">
                    <button class="btn btn-outline-primary search-emp" type="submit">Search</button>
            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Team Name</th>
                        <th scope="col">Create At</th>
                    </tr>
                </thead>
                <tbody v-if="teams && teams !== null">
                    <tr v-for="team in teams" :key="team.id">
                        <th>{{team.id}}</th>
                        <td>{{team.team_name}}</td>
                        <td>{{team.created_at}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
</template>
<script>
export default {
    data(){
        return {

        }
    },
    mounted() {
        this.getTeams();
        this.createTeams();
    },
    created() {
    },
    beforeUnmount(){
        console.log("before unmounted");

    },
    unmounted() {
        console.log("unmounted");

    },
    computed: {
        teams() {
            return this.$store.state.teams;
        }
    },
    methods: {
        getTeams() {
            this.$store.dispatch('getTeams');
        },
        createTeams() {
            this.$store.dispatch('createTeam');
        },
    }
    
    
}
</script>