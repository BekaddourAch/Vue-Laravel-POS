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
                        <h6 class="m-0 font-weight-bold text-primary">Stock Update</h6>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="stockUpdate">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp"   v-model="form.product_quantity"
                                            placeholder="Enter Full Name" />
                                        <!-- <small id="emailHelp" class="form-text text-muted">{{ errors.name[0]}}</small> -->
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
                // category_id: '',
                // product_name: '',
                // product_code: '',
                // root: '',
                // buying_price: '',
                // selling_price: '',
                // supplier_id: '',
                // buying_date: '',
                product_quantity: '',
                // image : ''
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
    
        
    },
    methods: {
       
        stockUpdate() {
            
            let id = this.$route.params.id
            axios.post('/api/stock/update/'+id, this.form)
              .then(() => {
                  this.$router.push({ name: 'stock' })
                   Notification.success()
              }).catch((err) => {
                  err => this.errors = err.response.data.errors
              });
               
        }
    }
} 
</script>
