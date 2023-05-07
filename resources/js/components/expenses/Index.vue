<template>
    <div>
        <h1>All Expenses</h1>

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Simple Tables</h6>
                  <input type="text" class="form-control" v-model="searchTerme" placeholder="Search in table">
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>detail</th> 
                        <th>amount</th> 
                        <th>expensedate</th> 
                      </tr>
                    </thead>
                    <tbody>
                      <tr  v-for="expenses in searchFilter" :key="expenses.id"> 
                        <td>{{expenses.detail}}</td> 
                        <td>{{expenses.amount}}</td> 
                        <td>{{expenses.expense_date}}</td> 
                        <!-- <th>{{expenses.photo}}</th>  -->
                        
                          <td><router-link class="btn btn-sm btn-primary" :to="{ name: 'editexpenses', params: {id:expenses.id }} ">ُEdit</router-link>  -->
                          <a @click="deleteexpenses(expenses.id)" class="btn btn-sm btn-danger">Delete</a></td>
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
            expenses:[],
            searchTerme:'',
        }
    },
    methods: {
        allexpenses(){
            axios.get('/api/expenses/')
            .then(({data})=>(this.expenses=data))
            .catch()
        },
        deleteexpenses(id){
                Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                  
                  if (result.isConfirmed) {
                    axios.delete('/api/expenses/'+id)
                  .then(()=>{
                    this.expenses= this.expenses.filter(expenses=>{
                      return expenses.id!=id;
                    }); 
                  }).catch(()=>{
                    this.$router.push({name:'expenses'})
                  })
                  
                  Swal.fire(
                      'Deleted!',
                      'Your file has been deleted.',
                      'success'
                    )
                  }
                })
        }
    },
    computed:{
         searchFilter(){
           return this.expenses.filter(
             expenses=>{
               return (expenses.amount.match(this.searchTerme))
             }
           )
         }
    },
    created(){
         this.allexpenses();
    }
}
</script>
<style >
    #imgtab{
        height: 50px;
        width: 50px;
    }
</style>