<script setup>
   import { RouterView , RouterLink } from "vue-router"
   import Header from "./components/Header.vue";
   import Footer from './components/Footer.vue'
   import './assets/main.css'
</script>
<template>
  <Header/>
  <RouterView/>
  <Footer/>
</template>