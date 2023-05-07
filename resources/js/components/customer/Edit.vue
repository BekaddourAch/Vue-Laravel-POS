<template>
    <div class="container">
        <router-link :to="{ name: 'allCustomers' }" class="btn btn-primary"> All Customers</router-link><br><br>
        <div class="row justify-content-md-center">
            <div class="col col-sm-1">
                1 of 2
            </div>
            <!-- Form Basic -->
            <div class="col-sm-10">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Edit customers</h6>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="customerUpdate" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="form.name" v-model="form.name"
                                            placeholder="Enter Full Name" />
                                        <!-- <small id="emailHelp" class="form-text text-muted">{{ errors.name[0]}}</small> -->
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="form.email" v-model="form.email"
                                            placeholder="Enter Email" />
                                        <!-- <small id="emailHelp" class="form-text text-muted">{{ errors.email[0]}}</small> -->
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="form.phone" v-model="form.phone"
                                            placeholder="Enter phone number" />
                                        <!-- <small id="emailHelp" class="form-text text-muted">{{ errors.phone[0]}}</small> -->
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="form.address" v-model="form.address"
                                            placeholder="Enter Address" />
                                        <!-- <small id="emailHelp" class="form-text text-muted">{{ errors.address[0]}}</small> -->
                                    </div>
                                </div>

                            </div> 
                            <div class="row">
                                <div class="col-sm-1">

                                </div>
                                <div class="col-sm-1">{{form.photo}}
                                    <img  :src="form.photo"  id="output" alt="" style="height:45px;width:45px;" srcset="">
                                     <img  :src="form.newphoto"  id="output" alt="" style="height:45px;width:45px;" srcset="">
                                </div>
                                <div class="col-sm-4">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile"
                                            @change="onFileSelected">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                        <!-- <small id="emailHelp" class="form-text text-muted">{{ errors.photo[0]}}</small> -->
                                    </div> 
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary">
                                Update
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
                name: '',
                email: '',
                phone: '',
                address: '', 
                photo: '',
                newphoto: ''
            }


        }
    },
    created() {
         let id = this.$route.params.id
         axios.get('/api/customer/'+id)
         .then(({data})=>(this.form=data))
         .catch()
    },
    methods: {
       
 onFileSelected(event){
     let file = event.target.files[0];
     if (file.size > 1048770) {
      Notification.image_validation()
     }else{
      let reader = new FileReader(); 
      reader.readAsDataURL(file);
      reader.onload = event =>{
        this.form.newphoto = event.target.result  
        console.log(event.target.result);
      };
     }

    },
        customerUpdate() {
            
            let id = this.$route.params.id
            axios.patch('/api/customer/'+id, this.form)
              .then(() => {
                  this.$router.push({ name: 'allCustomers' })
                   Notification.success()
              }).catch((err) => {
                  err => this.errors = err.response.data.errors
              });
               
        }
    }
} 
</script>
