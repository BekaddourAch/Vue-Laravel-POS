<template>
    <div class="container">
        <router-link :to="{ name: 'allsuppliers' }" class="btn btn-primary"> All Suppliers</router-link><br><br>
        <div class="row justify-content-md-center">
            <div class="col col-sm-1">
                1 of 2
            </div>
            <!-- Form Basic -->
            <div class="col-sm-10">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Suppliers</h6>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="supplierUpdate" enctype="multipart/form-data">
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
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="form.shopname" v-model="form.shopname"
                                            placeholder="Enter N-id" />
                                        <!-- <small id="emailHelp" class="form-text text-muted">{{ errors.shopname[0]}}</small> -->
                                    </div>

                                </div>
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


                            <!-- <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                        <label class="custom-control-label" for="customControlAutosizing">Remember me</label>
                      </div>
                    </div> -->
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
                shopname: '', 
                newphoto: ''
            }


        }
    },
    created() {
         let id = this.$route.params.id
         axios.get('/api/supplier/'+id)
         .then(({data})=>(this.form=data))
         .catch()
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
        supplierUpdate() {
            
            let id = this.$route.params.id
            console.log(this.form.name);
            console.log(this.form.photo);
            console.log(this.form.newphoto);
            axios.patch('/api/supplier/'+id, this.form)
              .then(() => {
                  this.$router.push({ name: 'allsuppliers' })
                   Notification.success()
              }).catch((err) => {
                  err => this.errors = err.response.data.errors
              });
               
        }
    }
} 
</script>
