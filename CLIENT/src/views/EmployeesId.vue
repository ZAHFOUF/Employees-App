<script setup>
import { ref , onMounted  } from 'vue'
import { useRoute  } from 'vue-router'
import axios from 'axios';
import '../assets/main.css'
import Swal from 'sweetalert2'


axios.defaults.baseURL = 'http://127.0.0.1:8000/api/v1/employees'

const user = ref({})
const { params } = useRoute()



const fetch_user = async () =>{
   var res = await  axios.get(params.id)
   user.value = res.data
}
onMounted(()=>{fetch_user()})


var url = ''
const inn = ref()
const inn2 = ref()
const fs =ref()
const ls =ref()
const age =ref()
const adress =ref()
const close = ref()




function submit () {
     
     axios.put(`/${params.id}`,{
         fs:fs.value.value , 
         ls:ls.value.value,
         age:age.value.value,
         profile:inn.value.value,
         address:adress.value.value
     }).then(()=>{
         user.value.fs = fs.value.value
         user.value.ls = ls.value.value
         user.value.age = age.value.value
         user.value.profile = inn.value.value
         user.value.address = adress.value.value
         close.value.click()
         Swal.fire({title:"Employees Updated Successfully" , icon:"success" , timer:1500})
         
     })
}

const swalWithBootstrapButtons = Swal.mixin({
  customClass: {
    confirmButton: 'btn btn-success',
    cancelButton: 'btn btn-danger'
  },
  buttonsStyling: false
})

function pop ()  {
    swalWithBootstrapButtons.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Yes, delete it!',
  cancelButtonText: 'No, cancel!',
  reverseButtons: true
}).then((result) => {
  if (result.isConfirmed) {
    axios.delete(`/${params.id}`).then(()=>{
        swalWithBootstrapButtons.fire({title:"Employee Deleted" , icon:"success" , timer:1500})
        setTimeout(()=>{window.history.back()},1500)
    })
  } else if (
    /* Read more about handling dismissals below */
    result.dismiss === Swal.DismissReason.cancel
  ) {
    swalWithBootstrapButtons.fire(
      'Cancelled',
      'Your imaginary file is safe :)',
      'error'
    )
  }
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
    <div class="page-content page-container" id="page-content">
    <div class="padding">
        <div class="row container d-flex justify-content-center">
<div class="col-xl-6 col-md-12" style="width: 80%;">
                                                <div class="card user-card-full">
                                                    <div class="row m-l-0 m-r-0">
                                                        <div class="col-sm-4 bg-c-lite-green user-profile">
                                                            <div class="card-block text-center text-white">
                                                                <div class="m-b-25">
                                                                    <img style="width: 50%; border-radius: 15px;" v-bind:src="user.profile">
                                                                </div>
                                                                <h6  class="f-w-600" >{{ user.fs }} {{ user.ls }}</h6>
                                                                <p>Employee</p>
                                                                <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="card-block">
                                                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600 title"> <p>Information</p>  <div> <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-pencil" aria-hidden="true"></i>
</button> <button @click="pop()" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i>
</button> </div></h6>
                                                                <div class="row">
                                                                    <div class="col-sm-3">
                                                                        <p class="m-b-10 f-w-600">Fist name</p>
                                                                        <h6 class="text-muted f-w-400">{{ user.fs }}</h6>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <p class="m-b-10 f-w-600">Last name</p>
                                                                        <h6 class="text-muted f-w-400">{{ user.ls }}</h6>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <p class="m-b-10 f-w-600">Adress</p>
                                                                        <h6 class="text-muted f-w-400">{{ user.address }}</h6>
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <p class="m-b-10 f-w-600">Age</p>
                                                                        <h6 class="text-muted f-w-400">{{ user.age }}</h6>
                                                                    </div>
                                                                </div>
                                                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Company</h6>
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-10 f-w-600">Joined At</p>
                                                                        <h6 class="text-muted f-w-400">{{ Date(user.created_at) }}</h6>
                                                                    </div>
                                                                </div>
                                                                <ul class="social-link list-unstyled m-t-40 m-b-10">
                                                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                                                    <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                             </div>
                                                </div>
                                            </div>

                                            <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Employee</h1>
        <button type="button" ref="close" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container" style="width: 95%;">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">First Name</label>
    <input ref="fs" required  v-bind:value="user.fs" type="text" name="fs" class="form-control" id="fs">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Last Name</label>
    <input ref="ls" type="text" required  v-bind:value="user.ls"  class="form-control" name="ls" id="inputPassword4">
  </div>
  <div class="col-12">
    <label for="inputAddress"    class="form-label">Age</label>
    <input ref="age" required  type="number" v-bind:value="user.age" name="age" class="form-control" id="inputAddress" >
  </div>
  <div class="col-12">
    <label for="inputAddress2"  class="form-label">Profile</label>
    <input ref="inn2"  type="file" @change="upload()" name="preview" class="form-control" id="inputAddress2">
  </div>
 
   
    <input ref="inn" required v-bind:value="user.profile" type="text" name="profile" hidden class="form-control" >
  <div class="col-md-6">
    <label for="inputCity"   class="form-label">Adress</label>
    <input ref="adress" required v-bind:value="user.address" type="text" name="adress" class="form-control" id="inputCity">
  </div>

    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" @click="submit()" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</template>