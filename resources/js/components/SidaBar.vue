
<template> 
<div id="sidebar" v-show="$route.path === '/' || $route.path === '/register' || $route.path === '/login' || $route.path==='/forgot-password' ? false : true " style="display:  none;">
    <ul  class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                <img src="{{asset('backend/img/logo/logo2.png')}}">
                </div>
                <div class="sidebar-brand-text mx-3">RuangAdmin</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <router-link class="nav-link" :to="{ name: 'home' }">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
                </router-link> 
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item active">
                <router-link class="nav-link" :to="{ name: 'pos' }">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>POS</span>
                </router-link> 
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Features
            </div>
            <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   EMPLOYEE -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseEmployees"
                aria-expanded="true" aria-controls="collapseEmployees">
                <i class="far fa-fw fa-window-maximize"></i>
                <span>Employees</span>
                </a>
                <div id="collapseEmployees" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Employees</h6>
                    <router-link class="collapse-item" to="/storemployee">Add employee</router-link>
                    <router-link class="collapse-item" :to="{ name: 'allemployee' }">All Employee</router-link> 
                </div>
                </div>
            </li>
            <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   SUPPLIERS -->
            <li class="nav-item">
                <router-link class="nav-link collapsed" to="#" data-toggle="collapse" data-target="#collapseSuppliers"
                aria-expanded="true" aria-controls="collapseSuppliers">
                <i class="far fa-fw fa-window-maximize"></i>
                <span>Suppliers</span>
                </router-link>
                <div id="collapseSuppliers" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Suppliers</h6>
                    <router-link class="collapse-item" to="/storsupplier">Add Suppliers</router-link>
                    <router-link class="collapse-item" :to="{ name: 'allsuppliers' }">All Suppliers</router-link> 
                </div>
                </div>
            </li>
            <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   SUPPLIERS -->
            <li class="nav-item">
                <router-link class="nav-link collapsed" to="#" data-toggle="collapse" data-target="#collapseatigories"
                aria-expanded="true" aria-controls="collapseatigories">
                <i class="far fa-fw fa-window-maximize"></i>
                <span>Catigories</span>
                </router-link>
                <div id="collapseatigories" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Catigories</h6>
                    <router-link class="collapse-item" to="/storecatigorie">Add Catigories</router-link>
                    <router-link class="collapse-item" :to="{ name: 'allcatigories' }">All Catigories</router-link> 
                </div>
                </div>
            </li>
            <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   PRODUCTS -->
            <li class="nav-item">
                <router-link class="nav-link collapsed" to="#" data-toggle="collapse" data-target="#collapseproducts"
                aria-expanded="true" aria-controls="collapseproducts">
                <i class="far fa-fw fa-window-maximize"></i>
                <span>Products</span>
                </router-link>
                <div id="collapseproducts" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Products</h6>
                    <router-link class="collapse-item" to="/storeproduct">Add Products</router-link>
                    <router-link class="collapse-item" :to="{ name: 'allproducts' }">All Products</router-link> 
                </div>
                </div>
            </li>
            <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   Expenses -->
            <li class="nav-item">
                <router-link class="nav-link collapsed" to="#" data-toggle="collapse" data-target="#collapseexpenses"
                aria-expanded="true" aria-controls="collapseexpenses">
                <i class="far fa-fw fa-window-maximize"></i>
                <span>Expenses</span>
                </router-link>
                <div id="collapseexpenses" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Expenses</h6>
                    <router-link class="collapse-item" to="/storeexpenses">Add Expenses</router-link>
                    <router-link class="collapse-item" :to="{ name: 'allexpenses' }">All Expenses</router-link> 
                </div>
                </div>
            </li>
            <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   Salary -->
            <li class="nav-item">
                <router-link class="nav-link collapsed" to="#" data-toggle="collapse" data-target="#collapsSalary"
                aria-expanded="true" aria-controls="collapsSalary">
                <i class="far fa-fw fa-window-maximize"></i>
                <span>Salaries</span>
                </router-link>
                <div id="collapsSalary" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Salaries</h6>
                    <router-link class="collapse-item" to="/given-salary">Add Salary</router-link>
                    <router-link class="collapse-item" to="/salary">All Salaries</router-link>
                    <!-- <router-link class="collapse-item" :to="{ name: 'salary' }">All Salaries</router-link> -->
                </div>
                </div>
            </li>
            
            <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   Stock -->
            <li class="nav-item">
                <router-link class="nav-link collapsed" to="#" data-toggle="collapse" data-target="#collapsStock"
                aria-expanded="true" aria-controls="collapsStock">
                <i class="far fa-fw fa-window-maximize"></i>
                <span>Stock</span>
                </router-link>
                <div id="collapsStock" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Stock</h6>
                    <router-link class="collapse-item" to="/stock">Add Stock</router-link>
                    <!-- <router-link class="collapse-item" to="/salary">All Salaries</router-link> -->
                    <!-- <router-link class="collapse-item" :to="{ name: 'salary' }">All Salaries</router-link> -->
                </div>
                </div>
            </li>
            <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   Customer -->
            <li class="nav-item">
                <router-link class="nav-link collapsed" to="#" data-toggle="collapse" data-target="#collapsCustomer"
                aria-expanded="true" aria-controls="collapsCustomer">
                <i class="far fa-fw fa-window-maximize"></i>
                <span>Customers</span>
                </router-link>
                <div id="collapsCustomer" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Salaries</h6>
                    <router-link class="collapse-item" to="/storCustomer">Add Customer</router-link>
                    <router-link class="collapse-item" to="/AllCustomers">All Customers</router-link>
                    <!-- <router-link class="collapse-item" :to="{ name: 'salary' }">All Salaries</router-link> -->
                </div>
                </div>
            </li>
            <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   Orders -->
            <li class="nav-item">
                <router-link class="nav-link collapsed" to="#" data-toggle="collapse" data-target="#collapsOrder"
                aria-expanded="true" aria-controls="collapsOrder">
                <i class="far fa-fw fa-window-maximize"></i>
                <span>Orders</span>
                </router-link>
                <div id="collapsOrder" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Salaries</h6>
                    <router-link class="collapse-item" to="/order">Today Orders</router-link>
                    <router-link class="collapse-item" to="/searchorder">Search</router-link>
                    <!-- <router-link class="collapse-item" :to="{ name: 'salary' }">All Salaries</router-link> -->
                </div>
                </div>
            </li>
            <!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////   Reports -->
            <li class="nav-item">
                <router-link class="nav-link collapsed" to="#" data-toggle="collapse" data-target="#collapsReports"
                aria-expanded="true" aria-controls="collapsReports">
                <i class="far fa-fw fa-window-maximize"></i>
                <span>Reports</span>
                </router-link>
                <div id="collapsReports" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Salaries</h6>
                    <router-link class="collapse-item" to="/store-customer">Report one</router-link>
                    <router-link class="collapse-item" to="/customers">Report two</router-link>
                    <!-- <router-link class="collapse-item" :to="{ name: 'salary' }">All Salaries</router-link> -->
                </div>
                </div>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="forms.html">
                <i class="fab fa-fw fa-wpforms"></i>
                <span>Forms</span>
                </a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
                aria-controls="collapseTable">
                <i class="fas fa-fw fa-table"></i>
                <span>Tables</span>
                </a>
                <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Tables</h6>
                    <a class="collapse-item" href="simple-tables.html">Simple Tables</a>
                    <a class="collapse-item" href="datatables.html">DataTables</a>
                </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ui-colors.html">
                <i class="fas fa-fw fa-palette"></i>
                <span>UI Colors</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Examples
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
                aria-controls="collapsePage">
                <i class="fas fa-fw fa-columns"></i>
                <span>Pages</span>
                </a>
                <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Example Pages</h6>
                    <a class="collapse-item" href="login.html">Login</a>
                    <a class="collapse-item" href="register.html">Register</a>
                    <a class="collapse-item" href="404.html">404 Page</a>
                    <a class="collapse-item" href="blank.html">Blank Page</a>
                </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Charts</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="version" id="version-ruangadmin"></div>
    </ul>
    </div>
</template>
<script>
export default {
  
}
</script>