<template>


                <!-- TopBar -->
                <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
                <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search fa-fw"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                        aria-labelledby="searchDropdown">
                        <form class="navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"
                            aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                            <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                            </div>
                        </div>
                        </form>
                    </div>
                    </li>
 
                    <li class="nav-item dropdown no-arrow">
                         <router-link active-class="font-semibold text-gray-900" v-if="user" class="px-6 text-gray-500 hover:text-gray-900 nav-link " :to="{ name: 'welcome' }">
                              welcome
                              <i class="fas fa-hand fa-fw"></i>
                         </router-link>
                    </li>
                    <li  class="nav-item dropdown no-arrow">
                         <router-link active-class="font-semibold text-gray-900" v-if="user" class="px-6 text-gray-500 hover:text-gray-900 nav-link " :to="{ name: 'home' }">
                              Home
                         </router-link>
                    </li>
                    <div class="topbar-divider d-none d-sm-block"></div>
                    <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <img class="img-profile rounded-circle" src="{{asset('backend/img/boy.png')}}" style="max-width: 60px">
                        <span class="ml-2 d-none d-lg-inline text-white small">
                           {{user.name}} 
                            </span>
                    </a>
                    <div v-if="user"  class="dropdown-menu dropdown-menu-right shadow animated--grow-in relative" aria-labelledby="userDropdown">
                         
                        
                        
                            <router-link class="dropdown-item" :to="{ name: 'settings' }">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                            </router-link>
                           <router-link class="dropdown-item" :to="{ name: 'profile' }">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    profile
                            </router-link>
                            
                         
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.html" @click="logout">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                        </a>
                    </div>
                    <div v-else   class="dropdown-menu dropdown-menu-right shadow animated--grow-in relative" aria-labelledby="userDropdown">
                        <router-link class="dropdown-item"  :to="{ name: 'login' }">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Login
                        </router-link>
                        <router-link class="dropdown-item"     :to="{ name: 'register' }">
                            <i class="fas fa-id-card fa-sm fa-fw mr-2 text-gray-400"></i>
                                Register
                        </router-link>  
                    </div>
                    </li>
                </ul>
                </nav>
                  
</template>
<script>

export default {
 

      created: function() {
        if(this.$store.getters.user) {
            let self = this ;   
            window.addEventListener('click', function(e){
                if ( self.$refs.dropMenu && !self.$refs.dropMenu.contains(e.target) ){
                    self.drop = false
                } 
            })
        }
    },

    
    data() {
        return {
            drop : false ,
        }
    },
    computed : {
        user() {
            return this.$store.getters.user ;
        }
    },
    methods : {
        async logout() {
            await this.$store.dispatch('logout');
            this.$router.push({name : 'login'});
        }
    }
}
</script>
