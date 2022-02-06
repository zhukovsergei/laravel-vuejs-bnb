<template>
    <div>
        <nav class="navbar bg-white border-bottom navbar-light">
            <router-link :to="{name: 'home'}" class="navbar-brand me-auto">Home</router-link>
        </nav>
        <div class="container mt-4 mb-4 pe-4 ps-4">
            <router-view></router-view>
        </div>
    </div>
</template>
