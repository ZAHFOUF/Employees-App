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

</nav>

</template>

