<template>
    <div>
        <h1>All Expenses</h1>

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Today Orders</h6>
                  <input type="text" class="form-control" v-model="searchTerme" placeholder="Search in table">
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th> 
                        <th>Total Amount</th> 
                        <th>Pay</th> 
                        <th>Due</th> 
                        <th>Pay By</th> 
                        <th>Action</th> 
                      </tr>
                    </thead>
                    <tbody>
                      <tr  v-for="orders in searchFilter" :key="orders.id"> 
                        <td>{{orders.name}}</td> 
                        <td>{{orders.total}}</td> 
                        <td>{{orders.pay}}</td> 
                        <td>{{orders.due}}</td> 
                        <td>{{orders.payby}}</td> 
                        
                          <td><router-link class="btn btn-sm btn-primary" :to="{ name: 'vieworder', params: {id:orders.id }} ">View</router-link></td>
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
            orders:[],
            searchTerme:'',
        }
    },
    methods: {
      allorders(){
            axios.get('/api/orders/')
            .then(({data})=>(this.orders=data))
            .catch()
        },
    },
    computed:{
         searchFilter(){
           return this.orders.filter(
            orders=>{
               return (orders.name.match(this.searchTerme))
             }
           )
         }
    },
    created(){
         this.allorders();
    }
}
</script>
<style >
    #imgtab{
        height: 50px;
        width: 50px;
    }
</style>