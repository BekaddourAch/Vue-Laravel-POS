<template>
    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>

        <div class="row mb-3">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Today Sell Amount</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">${{ todaysell }}</div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                                    <span>Since last month</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-calendar fa-2x text-primary"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">Today Income</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">${{ income }}</div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <!-- <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                                    <span>Since last years</span> -->
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-shopping-cart fa-2x text-success"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">The Due</div>
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">${{ due }}</div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 20.4%</span>
                                    <span>Since last month</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-info"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">The Expense </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">${{ expense }}</div>
                                <div class="mt-2 mb-0 text-muted text-xs">
                                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 1.10%</span>
                                    <span>Since yesterday</span>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-warning"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!--Row-->
<header>PRODUCTS OUT OF STOCK</header>
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
                      </tr>
                    </thead>
                    <tbody>
                      <tr  v-for="product in products" :key="product.id"> 
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
                         
                      </tr> 
                    </tbody>
                  </table>
                </div>

        <!-- Modal Logout -->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
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
import axios from 'axios';

export default {
    data() {
        return {
            todaysell:'',
            income:'',
            due:'',
            expense:'',
            products:''
        }
    },
    mounted(){
        this.TodaySell();
        this.TodayIncome()
        this.TodayDue();
        this.TodayExpense()
        this.StockOut()
    },
    methods:{
        TodaySell(){
            axios.get('/api/today/sell')
            .then(({data})=>(this.todaysell=data))
            .catch()
        },
        TodayIncome(){
            axios.get('/api/today/income')
            .then(({data})=>(this.income=data))
            .catch()
        },
        TodayDue(){
            axios.get('/api/today/due')
            .then(({data})=>(this.due=data))
            .catch()
        },
        TodayExpense(){
            axios.get('/api/today/expense')
            .then(({data})=>(this.expense=data))
            .catch()
        },
        StockOut(){
            axios.get('/api/today/stockout')
            .then(({data})=>(this.products=data))
            .catch()
        },

    }
}
</script>