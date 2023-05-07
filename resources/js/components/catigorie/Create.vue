<template>
    <div class="container">
        <router-link :to="{ name: 'allsuppliers' }" class="btn btn-primary"> All catigories</router-link><br><br>
        <div class="row justify-content-md-center">
            <div class="col col-sm-1">
                1 of 2
            </div>
            <!-- Form Basic -->
            <div class="col-sm-10">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Form Basic</h6>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="register" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="form.name" v-model="form.name"
                                            placeholder="Enter Full Name" />
                                        <!-- <small id="emailHelp" class="form-text text-muted">{{ errors.name[0]}}</small> -->
                                    </div>
                                </div>
                                
                            </div>
 
 
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col col-sm-1">
                1 of 2
            </div>
        </div>
    </div>
</template>

<script>
import { XIcon } from "@heroicons/vue/outline";
// import CircleSvg from '../components/CircleSvg.vue';
// import Errors from '../components/Errors.vue';
export default {
    components: {
        XIcon,
        // CircleSvg,
        // Errors
    },
    data() {
        return {
            form: {
                name: null, 
            }


        }
    },

    methods: {
        // onFileSelected(event) {
        //     //  var path = (window.URL || window.webkitURL).createObjectURL(file);
        //     //  console.log('path', path);
        //     var image = document.getElementById('output');
        //     image.src = URL.createObjectURL(event.target.files[0]);
        //     console.log(URL.createObjectURL(event.target.files[0]))
        //     let file = event.target.files[0];
        //     console.log(event.target.value)
        //     if (file.size > 1048770) {
        //         Notification.image_validation()
        //     } else {
        //         let reader = new FileReader();
        //         reader.onload = event => {
        //             console.log(file.type)
        //             this.form.photo = image.src;
        //         };
        //         reader.readAsDataURL(file);
        //     }
        // },
//  onFileSelected(event){
//      let file = event.target.files[0];
//      if (file.size > 1048770) {
//       Notification.image_validation()
//      }else{
//       let reader = new FileReader(); 
//       reader.readAsDataURL(file);
//       reader.onload = event =>{
//         this.form.photo = event.target.result
//         console.log(event.target.result);
//       };
//      }

//     },
        register() {
            console.log(this.form.name);
            axios.post('/api/catigorie', this.form)
              .then(() => {
                  this.$router.push({ name: 'allcatigories' })
                   Notification.success()
              }).catch((err) => {
                  err => this.errors = err.response.data.errors
              });
               
        }
    }
} 
</script>
