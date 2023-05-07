const Settings = () => import('../Views/Settings.vue');
const Profile = () => import('../Views/Profile.vue');
const Password = () => import('../Views/Password.vue');
const Login = () => import('../Views/Login.vue');
const ForgotPassword = () => import('../Views/ForgotPassword.vue');
const ResetPassword = () => import('../Views/ResetPassword.vue');
const VerifyEmail = () => import('../Views/VerifyEmail.vue');
const Register = () => import('../Views/Register.vue');
const Home = () => import('../Views/Home.vue');
const Welcome = () => import('../Views/Welcome.vue');
// ----------------------------------employee
const AllEmployee = () => import('../components/employee/Index.vue');
const StoreEmployee = () => import('../components/employee/Create.vue');
const EditEmployee = () => import('../components/employee/Edit.vue');
// ----------------------------------
const AllSuppliers = () => import('../components/supplier/Index.vue');
const StoreSupplier = () => import('../components/supplier/Create.vue');
const EditSupplier = () => import('../components/supplier/Edit.vue'); 
// ----------------------------------
const AllCatigories = () => import('../components/catigorie/Index.vue');
const StoreCatigorie = () => import('../components/catigorie/Create.vue');
const EditCatigorie = () => import('../components/catigorie/Edit.vue');
// ----------------------------------
const AllProducts = () => import('../components/product/Index.vue');
const StoreProduct = () => import('../components/product/Create.vue');
const EditProduct = () => import('../components/product/Edit.vue');
// ----------------------------------
const AllExpenses = () => import('../components/expenses/Index.vue');
const StoreExpenses = () => import('../components/expenses/Create.vue');
const EditExpenses = () => import('../components/expenses/Edit.vue');

// ----------------------------------
const AllCustomers = () => import('../components/customer/Index.vue');
const StoreCustomer = () => import('../components/customer/Create.vue');
const EditCustomer = () => import('../components/customer/Edit.vue'); 
// ----------------------------------
// const AllSalaries = () => import('../components/salary/Index.vue');
// const StoreSalaries = () => import('../components/salary/Create.vue');
// const EditSalaries = () => import('../components/salary/Edit.vue');
// ----------------------------------
const salary = () => import('../components/salary/all_employee.vue');
const paysalary = () => import('../components/salary/Create.vue');
const allsalary = () => import('../components/salary/Index.vue');
const viewsalary = () => import('../components/salary/view.vue');
const editsalary = () => import('../components/salary/Edit.vue');
const stock = () => import('../components/product/stock.vue');
const editstock = () => import('../components/product/edit-stock.vue');
const order = () => import('../components/order/order.vue');
const vieworder = () => import('../components/order/vieworder.vue');
const searchorder = () => import('../components/order/search.vue');


const pos = () => import('../components/pos/pointofsale.vue');
export default [{
        path: '/',
        component: Welcome,
        name: 'welcome',

    },
    {
        path: '/home',
        component: Home,
        name: 'home',
        meta: {
            guard: 'auth'
        }
    },
    {
        path: '/login',
        component: Login,
        name: 'login',
        meta : {
            guard : 'guest'
        }
    },
    {
        path: '/forgot-password',
        component: ForgotPassword,
        name: 'forgot-password',
        meta : {
            guard : 'guest'
        }
    },
    {
        path: '/reset-password/:token',
        props: route => ({
            token: route.params.token,
            email: route.query.email
        }),
        component: ResetPassword,
        name: 'reset-password',
        meta : {
            guard : 'guest'
        }
    },
    {
        path: '/register',
        component: Register,
        name: 'register',
        meta : {
            guard : 'guest'
        }
    },
    {
        path: '/verify-email/:id/:hash',
        props: route => ({
            id: route.params.id,
            hash: route.params.hash           
        }),
        component: VerifyEmail,
        name: 'verify-email',

    },
    // ------------------------------------- Employees
    {
        path: '/allemployee',
        component: AllEmployee,
        name: 'allemployee',
        meta: {
            guard: 'auth'
        }
    },
    {
        path: '/storemployee',
        component: StoreEmployee,
        name: 'storemployee',
        meta: {
            guard: 'auth'
        }
    },
    {
        path: '/editemployee/:id',
        component: EditEmployee,
        name: 'editemployee',
        meta: {
            guard: 'auth'
        }
    },
    // ------------------------------------- suppliers
    {
        path: '/allsuppliers',
        component: AllSuppliers,
        name: 'allsuppliers',
        meta: {
            guard: 'auth'
        }
    },
    {
        path: '/storsupplier',
        component: StoreSupplier,
        name: 'storsupplier',
        meta: {
            guard: 'auth'
        }
    },
    {
        path: '/editsupplier/:id',
        component: EditSupplier,
        name: 'editsupplier',
        meta: {
            guard: 'auth'
        }
    },
        // ------------------------------------- Catigories
    {
        path: '/AllCatigories',
        component: AllCatigories,
        name: 'allcatigories',
        meta: {
            guard: 'auth'
        }
    },
    {
        path: '/StoreCatigorie',
        component: StoreCatigorie,
        name: 'storecatigorie',
        meta: {
            guard: 'auth'
        }
    },
    {
        path: '/EditCatigorie/:id',
        component: EditCatigorie,
        name: 'editcatigorie',
        meta: {
            guard: 'auth'
        }
    },
        // ------------------------------------- Products
    {
        path: '/AllProducts',
        component: AllProducts,
        name: 'allproducts',
        meta: {
            guard: 'auth'
        }
    },
    {
        path: '/StoreProduct',
        component: StoreProduct,
        name: 'storeproduct',
        meta: {
            guard: 'auth'
        }
    },
    {
        path: '/EditProduct/:id',
        component: EditProduct,
        name: 'editproduct',
        meta: {
            guard: 'auth'
        }
    },
        // ------------------------------------- Expenses
    {
        path: '/AllExpenses',
        component: AllExpenses,
        name: 'allexpenses',
        meta: {
            guard: 'auth'
        }
    },
    {
        path: '/StoreExpenses',
        component: StoreExpenses,
        name: 'storeexpenses',
        meta: {
            guard: 'auth'
        }
    },
    {
        path: '/EditExpenses/:id',
        component: EditExpenses,
        name: 'editexpenses',
        meta: {
            guard: 'auth'
        }
    },
        // ------------------------------------- Salaries
    {
        path: '/given-salary',
        component: salary,
        name: 'given-salary',
        meta: {
            guard: 'auth'
        }
    },
    {
        path: '/pay-salary/:id',
        component: paysalary,
        name: 'pay-salary',
        meta: {
            guard: 'auth'
        }
    },
    {
        path: '/salary',
        component: allsalary,
        name: 'salary',
        meta: {
            guard: 'auth'
        }
    },
    {
        path: '/view-salary/:id',
        component: viewsalary,
        name: 'view-salary',
        meta: {
            guard: 'auth'
        }
    },
    {
        path: '/edit-salary/:id',
        component: editsalary,
        name: 'edit-salary',
        meta: {
            guard: 'auth'
        }
    },
    // ------------------------------------- Customer
    {
        path: '/allCustomers',
        component: AllCustomers,
        name: 'allCustomers',
        meta: {
            guard: 'auth'
        }
    },
    {
        path: '/storCustomer',
        component: StoreCustomer,
        name: 'storCustomer',
        meta: {
            guard: 'auth'
        }
    },
    {
        path: '/editCustomer/:id',
        component: EditCustomer,
        name: 'editCustomer',
        meta: {
            guard: 'auth'
        }
    },
    // ------------------------------------- Stock
{
    path: '/stock',
    component: stock,
    name: 'stock',
    meta: {
        guard: 'auth'
    }
},
{
    path: '/edit-stock/:id',
    component: editstock,
    name: 'edit-stock',
    meta: {
        guard: 'auth'
    }
},
// ------------------------------------- POS
{
path: '/pos',
component: pos,
name: 'pos',
meta: {
    guard: 'auth'
}
},
{
path: '/edit-stock/:id',
component: editstock,
name: 'edit-stock',
meta: {
    guard: 'auth'
}
},
// ------------------------------------- Order
{
    path: '/order',
    component: order,
    name: 'order',
    meta: {
        guard: 'auth'
    }
    }, 
    {
    path: '/view-order/:id',
    component: vieworder,
    name: 'vieworder',
    meta: {
        guard: 'auth'
    }
    }, 
    {
    path: '/searchorder',
    component: searchorder,
    name: 'searchorder',
    meta: {
        guard: 'auth'
    }
    }, 
    // -------------------------------------
    {
        path: '/settings',
        component: Settings,
        redirect: {
            name: 'profile'
        },
        name: 'settings',
        meta: {
            guard: 'auth'
        },
        children: [{
                path: 'profile',
                component: Profile,
                name: 'profile',
                meta: {
                    guard: 'auth'
                },

            },
            {
                path: 'password',
                component: Password,
                name: 'password',
                meta: {
                    guard: 'auth'
                },

            },

        ]
    },
    {
        path: '/:pathMatch(.*)*',
        redirect: '/home',

    }
];
