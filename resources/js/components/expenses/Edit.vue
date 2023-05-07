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
                        <h6 class="m-0 font-weight-bold text-primary">Edit Expenses</h6>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="supplierUpdate" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="form.detail" v-model="form.detail"
                                            placeholder="Enter Full Name" />
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="form.amount" v-model="form.amount"
                                            placeholder="Enter Full Name" />
                                        <input type="date" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="form.expense_date" v-model="form.expense_date"
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
                name: '', 
                amount: '', 
                expense_date: '', 
                  
            }


        }
    },
    created() {
         let id = this.$route.params.id
         axios.get('/api/expenses/'+id)
         .then(({data})=>(this.form=data))
         .catch()
    },
    methods: {
 
        supplierUpdate() {
            
            let id = this.$route.params.id
            console.log(this.form.name); 
            axios.patch('/api/expenses/'+id, this.form)
              .then(() => {
                  this.$router.push({ name: 'allexpenses' })
                   Notification.success()
              }).catch((err) => {
                  err => this.errors = err.response.data.errors
              });
               
        }
    }
} 
</script>
