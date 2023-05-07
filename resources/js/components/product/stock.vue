<template>
    <div>
        <h1>All imployees</h1>

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Stock</h6>
                  <input type="text" class="form-control" v-model="searchTerme" placeholder="Search in table">
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Product name</th>
                        <th>Product Code</th>
                        <th>Photo</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Quantity</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr  v-for="product in searchFilter" :key="product.id"> 
                        <td>{{product.product_name}}</td>
                        <td>{{product.product_code}}</td> 
                        <td><img :src="product.image" alt="" id="imgtab"></td>
                        <td>{{product.N1}}</td> 
                        <td>{{product.buying_price}}</td>
                        <td v-if="product.product_quantity >=1">
                          <span class="badge-success">Avilable</span></td>
                        <td v-else>
                          <span class="badge-danger">Stock Out</span></td>
                          <td>{{product.product_quantity}}</td> 
                          <td>
                            <router-link class="btn btn-sm btn-primary" 
                            :to="{ name: 'edit-stock', params: {id:product.id }} ">Edit</router-link>
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
            products:[],
            searchTerme:'',
        }
    },
    methods: {
        allproducts(){
            axios.get('/api/product/')
            .then(({data})=>(this.products=data))
            .catch()
        },
        deleteproduct(id){
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
                    axios.delete('/api/product/'+id)
                  .then(()=>{
                    this.products= this.products.filter(product=>{
                      return product.id!=id;
                    }); 
                  }).catch(()=>{
                    this.$router.push({name:'product'})
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
           return this.products.filter(
             product=>{
               return product.product_name.match(this.searchTerme)
             }
           )
         }
    },
    created(){
         this.allproducts();
    }
}
</script>
<style >
    #imgtab{
        height: 50px;
        width: 50px;
    }
</style>