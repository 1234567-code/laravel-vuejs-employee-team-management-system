<template>
    <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse project-nav" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">userAccounts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Team Members</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Teams</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Roles</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="main">
    <div class="main-content">
        <div class="upper-box">
            <div>
                <span class="page">User Account</span>
            </div>
            <div>
                <router-link to="/user-account">
                    <button type="button" class="btn btn-primary">Back</button>
                </router-link>
            </div>
        </div>
        <div>{{ userAccountDataFormats }}</div>
        <div class="from">
            <form>
                <div>
                    <label>Username</label>
                    <input placeholder="Username"/>
                    <label>Email</label>
                    <input type="email" name="email" placeholder="Email"/>
                    <label>Password</label>
                    <input type="password" name="password" placeholder="Password"/>
                    <label>First Name</label>
                    <input type="text" name="fname" placeholder="First Name"/>
                    <label>Last Name</label>
                    <input type="text" name="lname" placeholder="Last Name"/>
                    <label>is_project_manager</label>
                    <input type="checkbox" name="is_project_manager" placeholder="is project manager"/>
                    
                </div>

            </form>

        </div>
        <!-- <div class="lower-box">
            <div class="show-all">
                <span class="all">All</span>
            </div>
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
                        <th scope="col">Username</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Create At</th>
                    </tr>
                </thead>
                <tbody v-if="this.userAccounts && userAccounts !== null">
                    <tr v-for="userAccount in userAccounts" :key="userAccount.id">
                        <th>{{userAccount.id}}</th>
                        <td>{{userAccount.username}}</td>
                        <td>{{userAccount.first_name}}</td>
                        <td>{{userAccount.created_at}}</td>
                    </tr>
                </tbody>
            </table>
        </div> -->
    </div>
</div>
<footer>
    <div class="container-footer">
        <div class="links">
            <ul class="list">
                <li class="list-item">userAccounts</li>
                <li class="list-item">Team Members</li>
                <li class="list-item">Teams</li>
            </ul>
            <ul class="list">
                <li class="list-item">Roles</li>
                <li class="list-item">About</li>
            </ul>
        </div>
        <div class="media-icons">
            <div>
                <h3 class="">Social Media Links</h3>
            </div>
            <div class="icons">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                </svg>
                <i class="bi bi-facebook icon"></i>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                </svg>
                <i class="bi bi-twitter icon"></i>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z"/>
                </svg>
                <i class="bi bi-linkedin icon"></i>
            </div> 
        </div>
    </div>
</footer>
</template>
<script>
import { computed } from '@vue/reactivity';


export default {
    data() {
        return {
            userAccountDataFormats: {},
        }
    },
    mounted() {
        console.log("create account page");
        console.log(this.$route.params.data);
        
    },
    created() {
        this.userAccountDataFormats=this.$route.params.data;
    },
    //userAccountDataFormats: computed(() => this.routerLink.data),
    methods: {
        // async getUserAccounts() {
        //     await axios.get('http://127.0.0.1:8000/api/user-account/index').then((response) => {
        //         this.userAccounts = response.data;
                
        //     });
        // }
    },

    
}
</script> 
