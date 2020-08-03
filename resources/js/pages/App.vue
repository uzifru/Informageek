<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light flex-md-row-reverse">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a @click.prevent="" class="navbar-brand" href="#">INFORMAGEEK</a>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <router-link class="nav-link" :to="{name: 'home'}">Selamat Datang</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" :to="{name: 'login'}">Login</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" :to="{name: 'register'}">Register</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" :to="{name: 'forgot'}">Forgot Password</router-link>
          </li>
        </ul>
      </div>
    </nav>

    <div class="container py-3">
      <router-view></router-view>
    </div>
  </div>
</template>