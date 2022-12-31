<template>
    <div class="lower-box">
            <span class="all">All</span>
            <div class="line-break"></div>
            <form class="d-flex search-form" role="search">
                <input @change="Search()" class="form-control me-2 search-emp" type="search" placeholder="Search userAccounts" aria-label="Search">
                <button class="btn btn-outline-primary search-emp">Search</button>
            </form>
            <button @click="Search()">click</button>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Create At</th>
                    </tr>
                </thead>
                <tbody v-if="userAccounts && userAccounts !== null">
                    <tr v-for="userAccount in userAccounts" :key="userAccount.id">
                        <th>{{userAccount.id}}</th>
                        <td>{{userAccount.username}}</td>
                        <td>{{userAccount.first_name}}</td>
                        <td>{{userAccount.created_at}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
</template>
<script>
export default{
    data(){
        return {
            searchWord: null,

        }
    },
    mounted() {
        this.getAccounts();
    },
    created() {
    },
    computed: {
        userAccounts() {
            return this.$store.state.userAccounts;
        }
    },
    methods: {
        getAccounts() {
            this.$store.dispatch('getAccount');
        },
        Search() {
            console.log("filtered values");
        }
    }

}
</script>