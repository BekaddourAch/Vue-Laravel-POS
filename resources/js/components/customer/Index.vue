<template>
    <div>
        <h1>All customers</h1>

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
                        <th>photo</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr  v-for="customer in searchFilter" :key="customer.id"> 
                        <td>{{customer.name}}</td>
                        <td>{{customer.email}}</td>
                        <td>{{customer.phone}}</td>
                        <td>{{customer.address}}</td>
                        <th>{{customer.photo}}</th> 
                        <td><img :src="customer.photo" alt="" id="imgtab"></td> 
                          <td><router-link class="btn btn-sm btn-primary" :to="{ name: 'editCustomer', params: {id:customer.id }} ">ُEdit</router-link>  -->
                          <a @click="deletecustomer(customer.id)" class="btn btn-sm btn-danger">Delete</a></td>
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
            customers:[],
            searchTerme:'',
        }
    },
    methods: {
        allcustomers(){
            axios.get('/api/customer/')
            .then(({data})=>(this.customers=data))
            .catch()
        },
        deletecustomer(id){
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
                    axios.delete('/api/customer/'+id)
                  .then(()=>{
                    this.customers= this.customers.filter(customer=>{
                      return customer.id!=id;
                    }); 
                  }).catch(()=>{
                    this.$router.push({name:'customer'})
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
           return this.customers.filter(
             customer=>{
               return (customer.name.match(this.searchTerme)||customer.phone.match(this.searchTerme))
             }
           )
         }
    },
    created(){
         this.allcustomers();
    }
}
</script>
<style >
    #imgtab{
        height: 50px;
        width: 50px;
    }
</style>