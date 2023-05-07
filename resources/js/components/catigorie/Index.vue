<template>
    <div>
        <h1>All Catigories</h1>

                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Simple Tables</h6>
                  <input type="text" class="form-control" v-model="searchTerme" placeholder="Search in table">
                </div>
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>name</th> 
                      </tr>
                    </thead>
                    <tbody>
                      <tr  v-for="catigorie in searchFilter" :key="catigorie.id"> 
                        <td>{{catigorie.name}}</td> 
                        <!-- <th>{{catigorie.photo}}</th>  -->
                        
                          <td><router-link class="btn btn-sm btn-primary" :to="{ name: 'editcatigorie', params: {id:catigorie.id }} ">ُEdit</router-link>  -->
                          <a @click="deletecatigorie(catigorie.id)" class="btn btn-sm btn-danger">Delete</a></td>
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
            Catigories:[],
            searchTerme:'',
        }
    },
    methods: {
        allcatigories(){
            axios.get('/api/catigorie/')
            .then(({data})=>(this.Catigories=data))
            .catch()
        },
        deletecatigorie(id){
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
                    axios.delete('/api/catigorie/'+id)
                  .then(()=>{
                    this.Catigories= this.Catigories.filter(catigorie=>{
                      return catigorie.id!=id;
                    }); 
                  }).catch(()=>{
                    this.$router.push({name:'catigorie'})
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
           return this.Catigories.filter(
             catigorie=>{
               return (catigorie.name.match(this.searchTerme))
             }
           )
         }
    },
    created(){
         this.allcatigories();
    }
}
</script>
<style >
    #imgtab{
        height: 50px;
        width: 50px;
    }
</style>