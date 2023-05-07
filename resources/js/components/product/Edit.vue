<template>
    <div class="container">
        <router-link :to="{ name: 'allemployee' }" class="btn btn-primary"> All Employees</router-link><br><br>
        <div class="row justify-content-md-center">
            <div class="col col-sm-1">
                1 of 2
            </div>
            <!-- Form Basic -->
            <div class="col-sm-10">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Edit Employees</h6>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="employeeUpdate" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp"   v-model="form.product_name"
                                            placeholder="Enter Full Name" />
                                        <!-- <small id="emailHelp" class="form-text text-muted">{{ errors.name[0]}}</small> -->
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp"   v-model="form.product_code"
                                            placeholder="Enter product code" />
                                        <!-- <small id="emailHelp" class="form-text text-muted">{{ errors.email[0]}}</small> -->
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6"> 
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Select Categorie</label>
                                        <select class="form-control" id="exampleFormControlSelect1"    v-model="form.category_id">
                                            <option :value="category.id" v-for="category in Categories" :key="category.id">{{category.name}}</option> 
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Select Supplier</label>
                                        <select class="form-control" id="exampleFormControlSelect1"   v-model="form.supplier_id">
                                            <option :value="supplier.id"  v-for="supplier in Suppliers" :key="supplier.id">{{supplier.name}} </option> 
            
                                        </select> 
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp"  v-model="form.root"
                                            placeholder="Product Root" />
                                        <!-- <small id="emailHelp" class="form-text text-muted">{{ errors.sallary[0]}}</small> -->
                                    </div>

                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp"   v-model="form.buying_price"
                                            placeholder="Buying Price" />
                                        <!-- <small id="emailHelp" class="form-text text-muted">{{ errors.sallary[0]}}</small> -->
                                    </div>

                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp"   v-model="form.selling_price"
                                            placeholder="Selling Price" />
                                        <!-- <small id="emailHelp" class="form-text text-muted">{{ errors.join[0]}}</small> -->
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                 <div class="col-sm-4">

                                    <div class="form-group">
                                        <input type="date" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp"   v-model="form.buying_date"
                                            placeholder="Buying Date" />
                                        <!-- <small id="emailHelp" class="form-text text-muted">{{ errors.nid[0]}}</small> -->
                                    </div>

                                </div>
                                <div class="col-sm-4">

                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp"   v-model="form.product_quantity"
                                            placeholder="Product Quantity" />
                                        <!-- <small id="emailHelp" class="form-text text-muted">{{ errors.nid[0]}}</small> -->
                                    </div>

                                </div>
                                 <div class="col-sm-1">{{form.image}}
                                    <img  :src="form.image"  id="output" alt="" style="height:45px;width:45px;" srcset="">
                                     <img  :src="form.newimage"  id="output" alt="" style="height:45px;width:45px;" srcset="">
                                </div>
                                <!-- <div class="col-sm-1">
                                    <img  :src="form.image"  id="output" alt="" style="height:45px;width:45px;" srcset="">
                                </div> -->
                                <div class="col-sm-3">
                                    <div class="custom-file">
                                        <input type="file"   class="custom-file-input" id="customFile"
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
                category_id: '',
                product_name: '',
                product_code: '',
                root: '',
                buying_price: '',
                selling_price: '',
                supplier_id: '',
                buying_date: '',
                product_quantity: '',
                image : ''
            },
            Categories:{},
            Suppliers:{}

        }
    },
    created() {
         let id = this.$route.params.id
         axios.get('/api/product/'+id)
         .then(({data})=>(this.form=data))
         .catch()
    
         axios.get('/api/catigorie')
              .then(({data}) => {
                  this.Categories=data
              }),
             axios.get('/api/supplier')
              .then(({data}) => {
                  this.Suppliers=data
              })
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
        this.form.newimage = event.target.result  
        console.log(event.target.result);
      };
     }

    },
        employeeUpdate() {
            
            let id = this.$route.params.id
            console.log(this.form.name);
            console.log(this.form.image);
            console.log(this.form.newimage);
            axios.patch('/api/product/'+id, this.form)
              .then(() => {
                  this.$router.push({ name: 'allproducts' })
                   Notification.success()
              }).catch((err) => {
                  err => this.errors = err.response.data.errors
              });
               
        }
    }
} 
</script>
