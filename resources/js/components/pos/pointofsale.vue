<template>
  <div>


    <!-- Container Fluid-->
    <div class="container-fluid" id="container-wrapper">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">POS Dashboard</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="./">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">Point Of Sale</li>
        </ol>
      </div>


      <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-5 col-lg-5">
          <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Expense Insert</h6>
                <a href="#" class="btn btn-success">Add Customer</a>
            </div>
            <div class="table-responsive" style="font-size:12px;max-height: 400px;">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Quantity</th>
                        <th>Unit</th>
                        <th>Total</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody ref="vuetable">
                      <tr  v-for="cart in carts" :key="cart.id">
                        <td><a href="#">{{ cart.pro_name }}</a></td>
                        <td><input type="text" :value="cart.pro_quantity" style="width:15px;margin-right: 5px;">
                        <button class="btn btn-sm btn-success"
                         @click.prevent="increment(cart.id)">+</button>
                        <button class="btn btn-sm btn-danger" @click.prevent="decrement(cart.id)"
                        v-if="cart.pro_quantity>=2">-</button>
                        <button class="btn btn-sm btn-danger" v-else desabled>-</button>
                      </td>
                        <td>{{ cart.product_price }}</td>
                        <td>{{ cart.sub_total }}</td>
                        <td><a @click="removeItem(cart.id)" class="btn btn-sm btn-danger" style="color:#fff">X</a></td>
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
                <div class="card-footer">
                  <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Total Quantity:
                      <strong>{{ qty }}</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Sub Total:
                      <strong>{{subtotal}} $</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Vat:
                      <strong>{{vats.vat}}%</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Total:
                      <strong>{{ subtotal*vats.vat/100+subtotal }} $</strong>
                    </li>
                  </ul>
                <br>
                  <form action="" @submit.prevent="orderdone">
                    <label for="">Customer Name</label>
                    <select name="customer_id" id="" class="form-control" v-model="customer_id">
                      <option :value="customer.id"  v-for="customer in customers" :key="customer.id">{{ customer.name }}</option>
                    </select>
                    <label for="pay">Pay</label>
                    <input name="pay" id="" class="form-control" v-model="pay">
                    <label for="">Due</label>
                    <input name="due" id="" class="form-control" v-model="due">

                    
                    <label for="">Pay By</label>
                    <select name="payby" id="" class="form-control" v-model="payby">
                      <option value="HandCash">Hand Cash</option>
                      <option value="Cheaque">Cheaque</option>
                      <option value="GiftCard">Gift Card</option>
                    </select>
                    <button type="submit" class="btn btn-success" >Submit</button>
                  </form>
                </div>
          </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-7 col-lg-7">
          <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h6 class="m-0 font-weight-bold text-primary">Products Liste</h6>

            </div>

            <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                  aria-selected="true">All Products</a>
              </li>
              <li class="nav-item" v-for="category in categories" :key="category.id">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                  aria-controls="profile" aria-selected="false" @click="subporduct(category.id)">{{ category.name }}</a>
              </li>
            </ul>

            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="card-body">
                  <input type="text" class="form-control" v-model="searchTerme" placeholder="Search in table">
                  <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-6" v-for="product in searchFilter" :key="product.id">
                      <button class="btn btn-sm" @click.prevent="AddToCart(product.id)" id="apro">
                        <div class="card" style="width: 8.5rem; margin-bottom: 5px;">
                          <img class="card-img-top" :src="product.image" id="imgtab">
                          <div class="card-body">
                            <h6 class="card-title">{{ product.product_name }}</h6>

                            <span class="badge badge-success" v-if="product.product_quantity >= 1">Avilable
                              :{{ product.product_quantity }}</span>

                            <span class="badge badge-danger" v-else>Stock Out</span>
                          </div>
                        </div>
                      </button>

                    </div>

                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card-body">
                  <input type="text" class="form-control" v-model="searchTermeByCat" placeholder="Search in table">
                  <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-6" v-for="product in searchFilterByCat" :key="product.id">
                      <button class="btn btn-sm" @click.prevent="AddToCart(product.id)" id="apro">
                        <div class="card" style="width: 8.5rem; margin-bottom: 5px;">
                          <img class="card-img-top" :src="product.image" id="imgtab">
                          <div class="card-body">
                            <h6 class="card-title">{{ product.product_name }}</h6>

                            <span class="badge badge-success" v-if="product.product_quantity >= 1">Avilable
                              :{{ product.product_quantity }}</span>

                            <span class="badge badge-danger" v-else>Stock Out</span>
                          </div>
                        </div>
                      </button>

                    </div>

                  </div>
                </div>
              </div>
            </div>




          </div>
        </div>

      </div>
      <!--Row-->
    </div>




    <!-- Modal Logout -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Are you sure you want to logout?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
            <a href="login.html" class="btn btn-primary">Logout</a>
          </div>
        </div>
      </div>
    </div>

  </div>

</template>
<script>
export default {
  data() {
    return {
      pro_nbr:0,
      products: [],
      categories: [],
      getproducts: [],
      searchTerme: '',
      searchTermeByCat: '',
      customers: '',
      vats:'',
      carts:[],
      customer_id:'',
      payby:'',
      due:'',
      payby:'',
      total:0

    }
  },
  methods: {
    /***********************CART METHODS HERE */
    AddToCart(id){
      axios.get('/api/addToCart/'+ id)
        .then(() => 
          {
    this.cartProduct();
           
            // this.$refs.vuetable.reload();
            // this.$parent.reload.$emit('AfterAdd');
            // window.location.reload();
            // location.reload().$emit('AfterAdd');
            // window.location.reload.$emit('AfterAdd');
            Notification.cart_success();
          })
        .catch()
    },
    cartProduct() {
      axios.get('/api/cart/product/')
        .then(({ data }) => (this.carts = data))
        .catch()
    },
    removeItem(id){
      axios.get('/api/remove/cart/'+ id)
        .then(() => 
          {
            this.cartProduct();
            Notification.cart_success();
          })
        .catch()
    },
    increment(id){
      axios.get('/api/increment/'+ id)
        .then(() => 
          {
            this.cartProduct();
          })
        .catch()
    },
    decrement(id){
      axios.get('/api/decrement/'+ id)
        .then(() => 
          {
            this.cartProduct();
          })
        .catch()
    },
    vat(){
      axios.get('/api/vats/')
      .then(({ data }) => (this.vats = data))
        .catch()
    },
    orderdone(){
      let totals=this.subtotal*this.vats.vat/100+this.subtotal;
      console.log(totals);
      var data={
        qty:this.qty,
        subtotal:this.subtotal,
        customer_id:this.customer_id,
        payby:this.payby,
        pay:this.pay,
        due:this.due,
        vat:this.vats.vat,
        total:totals
      }
      axios.post('/api/orderdone', data)
              .then(() => {
                   Notification.success()
                  this.$router.push({ name: 'home' })
              }).catch((err) => {
                  err => this.errors = err.response.data.errors
              });
    },
    /***********************END CART METHODS */
    allproducts() {
      axios.get('/api/product/')
        .then(({ data }) => (this.products = data))
        .catch()
    },
    allcategories() {
      axios.get('/api/catigorie/')
        .then(({ data }) => (this.categories = data))
        .catch()
    },
    allcustomers() {
      axios.get('/api/customer/')
        .then(({ data }) => (this.customers = data))
        .catch()
    },
    subporduct(id) {
      axios.get('/api/getting/product/' + id)
        .then(({ data }) => (this.getproducts = data))
        .catch()
    },

  },
  updated() {    console.log('updated!')  },
  computed: {
    searchFilter() {
      return this.products.filter(
        product => {
          return product.product_name.match(this.searchTerme)
        }
      )
    },
    searchFilterByCat() {
      return this.getproducts.filter(
        product => {
          return product.product_name.match(this.searchTermeByCat)
        }
      )
    },
    qty(){
      let sum=0;
      for(let i =0; i< this.carts.length; i++){
        sum+=(parseFloat(this.carts[i].pro_quantity))
      }
      return sum;
    },
    subtotal(){
      let sum=0;
      for(let i =0; i< this.carts.length; i++){
        sum+=(parseFloat(this.carts[i].pro_quantity))*parseFloat(this.carts[i].product_price);
      }
      return sum;
    }
  },
  created() {
    this.allproducts();
    this.allcategories();
    this.allcustomers();
    this.cartProduct();
    this.vat();
    // this.$parent.reload.$on('AfterAdd',()=>{
    //    this.cartProduct();
    //   })
    // window.location.reload.$on('AfterAdd',()=>{
    //    this.cartProduct();
    //   })
  }
  
}
</script>
<style scoped>
#imgtab {
  height: 100px;
  width: 135px;
}
#apro:hover{
  text-decoration: none;
}
.card .table td, .card .table th {
	padding-right: 10px; 
	 padding-left: 10px;
}
</style>