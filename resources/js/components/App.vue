<template>
  <div>
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
      <div class="container">
        <router-link :to="{name: 'home'}" class="navbar-brand">JamboStore</router-link>
        <router-link :to="{name: 'orders'}" class="navbar-brand">All Orders</router-link>
        <router-link :to="{name: 'SupplierList'}" class="navbar-brand">Suppliers</router-link>
        <router-link :to="{name: 'ProductList'}" class="navbar-brand">Products</router-link>



        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto"></ul>
          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <router-link :to="{ name: 'login' }" class="" v-if="!isLoggedIn" style="text-decoration:none;margin-right:5px;">Login</router-link>
            
            <router-link :to="{ name: 'register' }" class="" v-if="!isLoggedIn" style="text-decoration:none;">Register</router-link>
            <span v-if="isLoggedIn">
              <p
                :to="{ name: 'userboard' }"
                class="nav-link"
              >Hi, {{name}}</p>
            </span>
            <li class="nav-link" v-if="isLoggedIn" @click="logout">Logout</li>
          </ul>
        </div>
      </div>
    </nav>
    <main class="py-4">
      <router-view @loggedIn="change"></router-view>
    </main>
  </div>
</template>

 <script>
    export default {
        data() {
            return {
                name: null,
                user_type: 0,
                isLoggedIn: localStorage.getItem('code_challenge.jwt') != null
            }
        },
        mounted() {
            this.setDefaults()
        },
        methods : {
            setDefaults() {
                if (this.isLoggedIn) {
                    let user = JSON.parse(localStorage.getItem('code_challenge.user'))
                    this.name = user.name
                    this.user_type = user.is_admin
                }
            },
            change() {
                this.isLoggedIn = localStorage.getItem('code_challenge.jwt') != null
                this.setDefaults()
            },
            logout(){
                localStorage.removeItem('code_challenge.jwt')
                localStorage.removeItem('code_challenge.user')
                this.change()
                this.$router.push('/')
            }
        }
    }
    </script>