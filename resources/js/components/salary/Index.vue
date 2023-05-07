<template>
    <div>
        <h1>All Salaries</h1>

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Simple Tables</h6>
                  <input type="text" class="form-control" v-model="searchTerme" placeholder="Search in table">
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Month Name</th>
                        <th>Details</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr  v-for="salary in searchFilter" :key="salary.id"> 
                        <td>{{salary.salary_month}}</td>
                          <td>
                            <router-link class="btn btn-sm btn-primary" :to="{ name: 'view-salary', params: {id:salary.salary_month }} ">View Salary</router-link>   
                            <!-- <a @click="deletesalary(salary.id)" class="btn btn-sm btn-danger">View Salary</a> -->
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
            salaries:[],
            searchTerme:'',
        }
    },
    methods: {
        allsalaries(){
            axios.get('/api/salary/')
            .then(({data})=>(this.salaries=data))
            .catch()
        },
        // deletesalary(id){
        //         Swal.fire({
        //           title: 'Are you sure?',
        //           text: "You won't be able to revert this!",
        //           icon: 'warning',
        //           showCancelButton: true,
        //           confirmButtonColor: '#3085d6',
        //           cancelButtonColor: '#d33',
        //           confirmButtonText: 'Yes, delete it!'
        //         }).then((result) => {
                  
        //           if (result.isConfirmed) {
        //             axios.delete('/api/salary/'+id)
        //           .then(()=>{
        //             this.salaries= this.salaries.filter(salary=>{
        //               return salary.id!=id;
        //             }); 
        //           }).catch(()=>{
        //             this.$router.push({name:'salary'})
        //           })
                  
        //           Swal.fire(
        //               'Deleted!',
        //               'Your file has been deleted.',
        //               'success'
        //             )
        //           }
        //         })
        // }
    },
    computed:{
         searchFilter(){
           return this.salaries.filter(
             salary=>{
               return (salary.salary_month.match(this.searchTerme))
             }
           )
         }
    },
    created(){
         this.allsalaries();
    }
}
</script>
<style >
    #imgtab{
        height: 50px;
        width: 50px;
    }
</style>