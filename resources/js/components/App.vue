<template>
  <div id="wrapper">
    <!-- <div v-if="renderComponent">
       <div v-if="user"> 
          <SidaBar  /> 
        </div>
     </div> -->
    <SidaBar />

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <NavaBar />

        <div>
          <!-- <nav-bar v-if="this.$route.name !== 'welcome'"> 
                         </nav-bar> -->
          <!-- <div class="notifyjs-corner" style="top: 0px; right: 0px;"></div>
          <div class="errNoty" style="height: 100px;"></div> -->
        </div>


        <!-- <VerifyNotice :id="id" v-if="(this.$route.name !== 'welcome') && id && !verified" /> -->
        <div class="container-fluid" id="container-wrapper">
          
          <router-view></router-view>
        </div>
      </div>
    </div>

    <div>

      <!-- <router-view class="p-6 " v-slot="{ Component }">
            <transition name="fade" mode="out-in" >
              <component :is="Component" />
            </transition>
          </router-view> -->
    </div>
  </div>
</template>

<script>
// import NavBar from './NavBar.vue'
import NavaBar from './NavaBar.vue'
import SidaBar from './SidaBar.vue'
import VerifyNotice from './VerifyNotice.vue'



export default {
  data() {
    return {

      user: this.$store.getters.user,
    }
  },
  computed: {
    id() {
      return this.$store.getters.id
    },
    verified() {
      return this.$store.getters.verified
    }

  },
  methods: {
    forceRerender() {
      // Removing my-component from the DOM
      this.renderComponent = false;

      this.$nextTick(() => {
        // Adding the component back in
        this.renderComponent = true;
      });
    }
  }, mounted() {

  },


  components: {
    // NavBar,
    NavaBar,
    SidaBar, VerifyNotice
  },

}

</script>


<style>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}

.noty_bar {
  height: 120px;
  width: 300px;
}
.noty_layout{ 
	position: absolute;
	top: 10px;
	right: 10px;
	z-index: 2; 
}
</style>
 