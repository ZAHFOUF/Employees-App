<script setup>
   import { RouterView , RouterLink } from "vue-router"
   import './assets/main.css'
</script>
<template>
 <header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <RouterLink to="/" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
          <svg style="width: 30px;" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 120 120"><defs><linearGradient id="a" x1="-1315.782" x2="-1195.782" y1="529.793" y2="529.793" gradientTransform="rotate(-90 -832.788 -362.994)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#1d6ff2"/><stop offset="1" stop-color="#1ac8fc"/></linearGradient></defs><path fill="url(#a)" fill-rule="evenodd" d="M120,26V94a25.94821,25.94821,0,0,1-26,26H26A25.94821,25.94821,0,0,1,0,94V26A25.94821,25.94821,0,0,1,26,0H94A25.94821,25.94821,0,0,1,120,26Z"/><path fill="#fff" fill-rule="evenodd" d="M82.6,69H97.5a5.5,5.5,0,0,1,0,11H82.6Z"/><path fill="#fff" fill-rule="evenodd" d="M64.3 69a7.85317 7.85317 0 0 1 7.9 7.9 8.14893 8.14893 0 0 1-.6 3.1H22.5a5.5 5.5 0 0 1 0-11zM62.9 32.8v9.6H56.5L48.7 29a5.19712 5.19712 0 1 1 9-5.2zM68.4 42.1L95.7 89.4a5.48862 5.48862 0 0 1-9.5 5.5L69.7 66.2c-1.5-2.8-2.6-5-3.3-6.2A15.03868 15.03868 0 0 1 68.4 42.1z" data-name="Combined-Shape"/><path fill="#fff" fill-rule="evenodd" d="M46 74H33.3L62 24.3a5.48862 5.48862 0 0 1 9.5 5.5zM39.3 85.5L34 94.8a5.48862 5.48862 0 1 1-9.5-5.5l3.9-6.8a8.59835 8.59835 0 0 1 3.9-.9A7.77814 7.77814 0 0 1 39.3 85.5z" data-name="Combined-Shape"/></svg>
        </RouterLink>
        <ul id="header" class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><RouterLink to="/about" class="nav-link px-2 link-dark">Company</RouterLink></li>
          <li><RouterLink to="/employees" href="#" class="nav-link px-2 link-dark">Employees</RouterLink></li>
          <li><RouterLink to="/about" href="#" class="nav-link px-2 link-dark">Customers</RouterLink></li>
          <li><RouterLink to="/about" href="#" class="nav-link px-2 link-dark">Products</RouterLink></li>
        </ul>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>

        <div class="dropdown text-end">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <RouterView/>
</template>