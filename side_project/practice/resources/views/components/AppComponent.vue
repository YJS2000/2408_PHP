<template>
    <!-- Header -->
    <header>
        <div class="header-container">
            <div class="header-content">
                <div class="title">
                    <a href=""><h1>Vuestagram</h1></a>
                </div>
                <img src="/img/3.jpg" class="img-logo"lt="">
                <div class="btn-group">
                    <router-link to="/login"><button class="btn btn-header btn-bg-black">로그인</button></router-link>
                    <router-link to="/registration"><button class="btn btn-header btn-bg-white">회원가입</button></router-link>
                </div>
            </div>
        </div>
    </header>
    <!-- Main -->
    <main>
        <UserInfoComponent />
        <div class="container">
            <router-view></router-view>
        </div>
    </main>


    <!-- Footer -->
    <footer>
        <p>너무 어렵따 진짜루 나 정말 많은일이 있었따..</p>
    </footer>
</template>

<script setup>
import UserInfoComponent from './user/UserInfoComponent.vue'
</script>

<style>
@import url('../../css/common.css');
</style>