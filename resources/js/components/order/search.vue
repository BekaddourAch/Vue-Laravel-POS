<template>
    <div class="container">
        <router-link :to="{ name: 'order' }" class="btn btn-primary"> Today Order</router-link><br><br>
        <div class="row justify-content-md-center">
            <div class="col col-sm-1">
                1 of 2
            </div>
            <!-- Form Basic -->
            <div class="col-sm-10">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Search Order</h6>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="SearchDate" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Search By Date</label>
                                        <input type="date" class="form-control" id="exampleInputEmail1" name="form.name" v-model="date"
                                           required="" /> 
                                         </div>
                                </div>
                                
                            </div>
 
 
                            <button type="submit" class="btn btn-primary">
                                Search
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col col-sm-1">
                1 of 2
            </div>

            
            <div class="card">
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Orders Details</h6>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Qty</th>
                                            <th>Sub Total</th>
                                            <th>Vat</th>
                                            <th>Total</th>
                                            <th>Pay</th>
                                            <th>Due</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr  v-for="order in orders" :key="order.id">
                                            <td>{{ order.name }}</td>
                                            <td>{{ order.qty }}</td>
                                            <td>{{ order.subtotal }} $</td>
                                            <td>{{ order.vat }}</td>
                                            <td>{{ order.total }}</td>
                                            <td>{{ order.pay }} $</td>
                                            <td>{{ order.due }} $</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer"></div>
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
            date:'',
            orders:{}
        }
    },

    methods: {
        SearchDate() {
            var data={date:this.date}
            axios.post('/api/search/order/', data)
                .then(({ data }) => (this.orders = data)).
                catch();
               
        }
    }
} 
</script>
