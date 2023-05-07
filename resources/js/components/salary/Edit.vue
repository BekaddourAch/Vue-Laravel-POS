<template>
    <div class="container">
        <router-link :to="{ name: 'allemployee' }" class="btn btn-primary"> Pay Salary to Employies</router-link><br><br>
        <div class="row justify-content-md-center">
            <div class="col col-sm-1">
                1 of 2
            </div>
            <!-- Form Basic -->
            <div class="col-sm-10">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Update Salary</h6>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="salaryUpdate" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputSalary">Employee Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" name="form.name" v-model="form.name"
                                            placeholder="Enter Full Name" />
                                        <!-- <small id="emailHelp" class="form-text text-muted">{{ errors.name[0]}}</small> -->
                                    </div>
                                </div>
                                <div class="col-sm-6">

                                    <div class="form-group">
                                        <label for="exampleInputSalary">Employee Email</label>
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
                                        <label for="exampleFormControlSelect1">Select Supplier</label>
                                        <select class="form-control" id="exampleFormControlSelect1"   v-model="form.salary_month">
                                            <option value=''>--Select Month--</option>
                                            <option selected value='Janaury'>Janaury</option>
                                            <option value='February'>February</option>
                                            <option value='March'>March</option>
                                            <option value='April'>April</option>
                                            <option value='May'>May</option>
                                            <option value='June'>June</option>
                                            <option value='July'>July</option>
                                            <option value='August'>August</option>
                                            <option value='September'>September</option>
                                            <option value='October'>October</option>
                                            <option value='November'>November</option>
                                            <option value='December'>December</option>
                                        </select> 
                                    </div>
                                </div>
                                <input type="hidden" v-model="form.employee_id">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputSalary">Salary</label>
                                        <input type="text" class="form-control" id="exampleInputSalary"
                                            aria-describedby="emailHelp" name="form.amount" v-model="form.amount"
                                            placeholder="Enter salary" />
                                        <!-- <small id="emailHelp" class="form-text text-muted">{{ errors.address[0]}}</small> -->
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
                salary_month: '',
                amount: '', 
                employee_id:''
            }


        }
    },
    created() {
         let id = this.$route.params.id
         axios.get('/api/edit/salary/'+id)
         .then(({data})=>(this.form=data))
         .catch()
    },
    methods: {
  
        salaryUpdate() {
            
            let id = this.$route.params.id 
            axios.post('/api/salary/update/'+id, this.form)
              .then(() => {
                  this.$router.push({ name: 'salary' })
                   Notification.success()
              }).catch((err) => {
                  err => this.errors = err.response.data.errors
              });
               
        }
    }
} 
</script>
