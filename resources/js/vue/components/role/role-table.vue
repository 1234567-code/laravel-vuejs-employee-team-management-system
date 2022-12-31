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
                        <th scope="col">Role Name</th>
                        <th scope="col">Create At</th>
                    </tr>
                </thead>
                <tbody v-if="roles && roles !== null">
                    <tr v-for="role in roles" :key="role.id">
                        <th>{{role.id}}</th>
                        <td>{{role.role_name}}</td>
                        <td>{{role.created_at}}</td>
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
        this.getRoles();
        this.createRoles();
    },
    created() {
    },
    computed: {
        roles() {
            return this.$store.state.roles;
        }
    },
    methods: {
        getRoles() {
            this.$store.dispatch('getRoles');
        },
        createRoles() {
            this.$store.dispatch('createRole');
        },
    }
    
    
}
</script>