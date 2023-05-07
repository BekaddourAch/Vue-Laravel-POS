<template>
    <div class="container">
        <router-link :to="{ name: 'allsuppliers' }" class="btn btn-primary"> All Orders</router-link><br><br>
        <div class="row justify-content-md-center">

            <!-- Form Basic -->
            <div class="col-sm-10">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Orders Details</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 md-4">
                                <div class="card mb-4">
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Orders Details</h6>
                                    </div>
                                    <ul class="list-group">
                                        <li class="list-group-item"><b>Name : </b>{{ orders.name }}</li>
                                        <li class="list-group-item"><b>Phone : </b>{{ orders.phone }}</li>
                                        <li class="list-group-item"><b>Address : </b>{{ orders.address }}</li>
                                        <li class="list-group-item"><b>Date : </b>{{ orders.order_date }}</li>
                                        <li class="list-group-item"><b>Pay Through : </b>{{ orders.payby }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6 md-4">
                                <div class="card mb-4">
                                    <div
                                        class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <h6 class="m-0 font-weight-bold text-primary">Orders Details</h6>
                                    </div>
                                    <ul class="list-group">
                                        <li class="list-group-item"><b>Sub Total : </b>{{ orders.sub_total }}</li>
                                        <li class="list-group-item"><b>Vat : </b>{{ orders.vat }}</li>
                                        <li class="list-group-item"><b>Total : </b>{{ orders.total }}</li>
                                        <li class="list-group-item"><b>Pay Ammount : </b>{{ orders.pay }}</li>
                                        <li class="list-group-item"><b>Due Amount : </b>{{ orders.due }}</li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <br><br>
                        <!-- /************************************************* */         -->

                        <div class="card">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Orders Details</h6>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Product Code</th>
                                            <th>Image</th>
                                            <th>Qty</th>
                                            <th>Unit Price</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr  v-for="detail in details" :key="detail.id">
                                            <td>{{ detail.product_name }}</td>
                                            <td>{{ detail.product_code }}</td>
                                            <td><img :src="'/'+detail.image" alt=""> </td>
                                            <td>{{ detail.pro_quantity }}</td>
                                            <td>{{ detail.product_price }} $</td>
                                            <td>{{ detail.sub_total }} $</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer"></div>
                        </div>



                    </div>
                </div>
            </div>
            <div class="col col-sm-1">
                1 of 2
            </div>
        </div>
    </div>
</template>

<script>
import { XIcon } from "@heroicons/vue/outline";
// import CircleSvg from '../components/CircleSvg.vue';
// import Errors from '../components/Errors.vue';
export default {
    components: {
        XIcon,
        // CircleSvg,
        // Errors
    },
    data() {
        return {
            errors: {},
            orders: {},
            details: []
        }
    },
    created() {
        let id = this.$route.params.id
        axios.get('/api/order/details/' + id)
            .then(({ data }) => (this.orders = data))
            .catch();

        axios.get('/api/order/orderdetails/' + id)
            .then(({ data }) => (this.details = data))
            .catch();
    },
    methods: {


    }
} 
</script>
