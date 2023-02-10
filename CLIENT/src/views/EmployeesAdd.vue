<script setup>
import { ref } from 'vue';
import '../assets/main.css'
import axios from 'axios';
import Swal from 'sweetalert2'

axios.defaults.baseURL = 'http://127.0.0.1:8000/api/v1/'


var url = ''
const inn = ref()
const inn2 = ref()
const fs =ref()
const ls =ref()
const age =ref()
const adress =ref()




function submit () {
     
     axios.post("employees",{
         fs:fs.value.value , 
         ls:ls.value.value,
         age:age.value.value,
         profile:url,
         address:adress.value.value
     }).then(()=>{
         Swal.fire({title:"Employees added Successfully" , icon:"success" , timer:2000})
         setTimeout(()=>{ window.history.back() },2000)
     })
}


function upload (){
     const read = new FileReader()
     read.addEventListener("load",()=>{
             url = read.result
             inn.value.value = url

     })
     read.readAsDataURL(inn2.value.files[0])
}


</script>

<template>
    <div class="container" style="width: 57%; padding: 17px;">
        <form class="row g-3" @submit.prevent="submit()">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">First Name</label>
    <input ref="fs" type="text" name="fs" class="form-control" id="fs">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Last Name</label>
    <input ref="ls" type="text" class="form-control" name="ls" id="inputPassword4">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Age</label>
    <input ref="age" type="number" name="age" class="form-control" id="inputAddress" >
  </div>
  <div class="col-12">
    <label for="inputAddress2"  class="form-label">Profile</label>
    <input ref="inn2" type="file" @change="upload()" name="preview" class="form-control" id="inputAddress2">
  </div>
 
   
    <input ref="inn" type="text" name="profile" hidden class="form-control" >
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Adress</label>
    <input ref="adress" type="text" name="adress" class="form-control" id="inputCity">
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-success">Add</button>
  </div>
</form>

    </div>
</template>

