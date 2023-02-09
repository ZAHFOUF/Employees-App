<script setup>
import { ref , onMounted } from 'vue'
import axios from 'axios'

const user = ref({})

var id = 111

var n = 0

const printResult = ()=> console.log(n+=1);

var user_validation = false

const users =[{id:1,nm:"John"},{id:2,nm:"Anas"}] 

axios.defaults.baseURL = 'http://127.0.0.1:8000/'

const fetch_user = async () =>{
   var res = await  axios.get("user")
   user.value = res.data

}
onMounted(()=>{fetch_user()})

setTimeout(()=>{
  user.value.name = "YOUR SESSION WAS EXPEND"
},10000)

</script>

<template>
  <div :id="id"  class="about" >
    <h1 style="cursor: pointer;" @click="printResult"> Data : {{ user.name }}  </h1>
  </div>
<div>
  <p v-if="user_validation">This user is logged</p>
  <div v-for="us in users">

    <p>{{ us.nm }}</p>
      
  </div>

</div>
</template>

<style>
@media (min-width: 1024px) {
  .about {
    min-height: 100vh;
    display: flex;
    align-items: center;
  }
}
</style>
