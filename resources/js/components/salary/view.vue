<template>
  <div>
      <h1>Employee Salary Details</h1>

              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Simple Tables</h6>
                <input type="text" class="form-control" v-model="searchTerme" placeholder="Search in table">
              </div>
              <div class="table-responsive">
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th>Name</th>
                      <th>Month</th>
                      <th>Amount</th>
                      <th>Date</th> 
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr  v-for="salary in searchFilter" :key="salary.id"> 
                      <td>{{salary.name}}</td>
                      <td>{{salary.salary_month}}</td>
                      <td>{{salary.amount}}</td>
                      <td>{{salary.salary_date}}</td>  
                        <td>
                          <router-link class="btn btn-sm btn-primary"
                           :to="{ name: 'edit-salary', params: {id:salary.id }} ">
                           Edit Salary</router-link>
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
        ddddd:[],
          searchTerme:'',
      }
  },
  methods: {
      viewSalary(){
        let id = this.$route.params.id 
            axios.get('/api/salary/view/'+id)
              
         .then(({data})=>(this.ddddd=data))
         .catch((err) => {
                  err => this.errors = err.response.data.errors
              });
      },
 
  },
  computed:{
       searchFilter(){
        return this.ddddd.filter(
             salary=>{
               return (salary.salary_month.match(this.searchTerme))
             }
           );
       }
  },
  created(){
       this.viewSalary();
  }
}
</script>
<style >
  #imgtab{
      height: 50px;
      width: 50px;
  }
</style>