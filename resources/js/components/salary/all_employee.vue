<template>
  <div>
      <h1>All imployees</h1>

              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Simple Tables</h6>
                <input type="text" class="form-control" v-model="searchTerme" placeholder="Search in table">
              </div>
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th>name</th>
                      <th>email</th>
                      <th>phone</th>
                      <th>address</th> 
                      <th>salary</th>
                      <th>photo</th>  
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr  v-for="employee in searchFilter" :key="employee.id"> 
                      <td>{{employee.name}}</td>
                      <td>{{employee.email}}</td>
                      <td>{{employee.phone}}</td>
                      <td>{{employee.address}}</td>
                      <td style="display:none;">{{employee.sallery}}</td>
                      <!-- <th>{{employee.photo}}</th>  -->
                      <td><img :src="employee.photo" alt="" id="imgtab"></td> 
                        <td><router-link class="btn btn-sm btn-primary" :to="{ name: 'pay-salary', params: {id:employee.id }} ">Pay Salary</router-link>  -->
                         </td>
                    </tr>
                     
                  </tbody>
                </table>
              </div>
              <div class="card-footer"></div>
            
  </div>
</template>
<script>
export default {
  data(){
      return{
          employees:[],
          searchTerme:'',
      }
  },
  methods: {
      allEmployees(){
          axios.get('/api/employee/')
          .then(({data})=>(this.employees=data))
          .catch()
      },
 
  },
  computed:{
       searchFilter(){
         return this.employees.filter(
           employee=>{
             return employee.name.match(this.searchTerme)
           }
         )
       }
  },
  created(){
       this.allEmployees();
  }
}
</script>
<style >
  #imgtab{
      height: 50px;
      width: 50px;
  }
</style>