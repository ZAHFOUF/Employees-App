<script setup>
import { ref , onMounted } from 'vue'
import { RouterLink } from 'vue-router';
import axios from 'axios';
import '../assets/main.css'
import queryString from 'query-string';


axios.defaults.baseURL = 'http://127.0.0.1:8000/api/v1/'

const user = ref([])
const ad = ref()
const user_parms = queryString.parse(window.location.search)
var data
var pag 


const fetch_user = async () =>{
    var res = await  axios.get("employees",{params:user_parms})
    user.value = res.data.data
    pag = res.data.links
}



onMounted(()=>{fetch_user()})
/* Download Data User */
 

</script>


<template>
  <div   style="display: flex; justify-content: space-between; align-items: center;">
            <RouterLink to="/employees/add" style="margin: 17px;" class="btn btn-primary">Add New Empolyee</RouterLink>
             <a   class="btn btn-success" ref="ad" style="height: 40px;" href="http://127.0.0.1:8000/download" ><i style="    margin-right: 10px;" class="fa fa-download" aria-hidden="true"></i>Download</a>
        </div>
  <div class="row align-items-start">


    <div v-if="user.length === 0" v-for="us in 3" class="col">

      <div class="card" aria-hidden="true">
        <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect></svg>
  <div class="card-body">
    <h5 class="card-title placeholder-glow">
      <span class="placeholder col-6"></span>
    </h5>
    <p class="card-text placeholder-glow">
      <span class="placeholder col-4"></span>
      <span class="placeholder col-6"></span>
      <span class="placeholder col-7"></span>
    </p>
    <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>
  </div>
</div>



    </div>
    
        <div v-for="us in  user" class="col"  >

        
        
            <div class="card" style="width: 18rem;">
                <RouterLink v-bind:to="'/employees/' + us.id" class="emp" >
                     <img v-bind:src="us.profile " width="50" class="card-img-top" alt="...">
                      <div class="card-body">
                    <h5 class="card-title">{{ us.fs }} {{ us.ls }}</h5>
                     </div>
                    <ul class="list-group list-group-flush">
                    <li class="list-group-item">age : {{ us.age }}</li>
                    <li class="list-group-item">adress : {{ us.address }}</li>
                     </ul>
                </RouterLink>
  
</div>
      
       </div>
       </div>
       <nav class="pug" v-if="user[0]" aria-label="Page navigation example">
  <ul class="pagination">
  
    <li v-for="pg in pag" class="page-item"><a   class="page-link" :href="pg.url !== null ? `employees?page=${pg.url.slice(-1)}` : ''"  > {{
     pg.label.slice(0,4) === '&laq' ? 'Previous' :  pg.label.slice(0,4)
  


    
    }}</a></li>
  </ul>
<!--

    <div class="card" aria-hidden="true">
        <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"></rect></svg>
  <div class="card-body">
    <h5 class="card-title placeholder-glow">
      <span class="placeholder col-6"></span>
    </h5>
    <p class="card-text placeholder-glow">
      <span class="placeholder col-7"></span>
      <span class="placeholder col-4"></span>
      <span class="placeholder col-4"></span>
      <span class="placeholder col-6"></span>
      <span class="placeholder col-8"></span>
    </p>
    <a href="#" tabindex="-1" class="btn btn-primary disabled placeholder col-6"></a>
  </div>
</div>


-->
</nav>

</template>

