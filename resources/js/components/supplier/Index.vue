<template>
    <div>
        <h1>All Suppliers</h1>

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
                        <th>Shop Name</th> 
                        <th>photo</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr  v-for="supplier in searchFilter" :key="supplier.id"> 
                        <td>{{supplier.name}}</td>
                        <td>{{supplier.email}}</td>
                        <td>{{supplier.phone}}</td>
                        <td>{{supplier.address}}</td>
                        <td >{{supplier.shopname}}</td>
                        <!-- <th>{{supplier.photo}}</th>  -->
                        <td><img :src="supplier.photo" alt="" id="imgtab"></td> 
                          <td><router-link class="btn btn-sm btn-primary" :to="{ name: 'editsupplier', params: {id:supplier.id }} ">ُEdit</router-link>  -->
                          <a @click="deleteSupplier(supplier.id)" class="btn btn-sm btn-danger">Delete</a></td>
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
            suppliers:[],
            searchTerme:'',
        }
    },
    methods: {
        allSuppliers(){
            axios.get('/api/supplier/')
            .then(({data})=>(this.suppliers=data))
            .catch()
        },
        deleteSupplier(id){
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
                    axios.delete('/api/supplier/'+id)
                  .then(()=>{
                    this.suppliers= this.suppliers.filter(supplier=>{
                      return supplier.id!=id;
                    }); 
                  }).catch(()=>{
                    this.$router.push({name:'supplier'})
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
           return this.suppliers.filter(
             supplier=>{
               return (supplier.name.match(this.searchTerme)||supplier.phone.match(this.searchTerme))
             }
           )
         }
    },
    created(){
         this.allSuppliers();
    }
}
</script>
<style >
    #imgtab{
        height: 50px;
        width: 50px;
    }
</style>