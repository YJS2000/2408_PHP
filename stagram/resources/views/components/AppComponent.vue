<template>
    <header class="container">
        <div class="container-inner">
            <div class="container-text"> 
                <div class="stagram">
                    <p>STAGRAM</p>
                </div>
                <div class="name-img">
                    <span class="name">name</span>
                    <img class="small-img" src="/img/1.webp" alt="">
                </div>
            </div>
            <div class="container-img">
                <img class="img" src="/img/1.webp" alt="">
            </div>
            <div class="container-btn">
                <router-link to="/boards/create"><button class="btn">글작성</button></router-link>
            </div>
        </div>
    </header>

    <main>
        <router-view></router-view>
    </main>

    <footer class="fixed-footer">
            <p>ⓒstagram</p>
    </footer>

</template>
<script setup>

</script>
<style>
    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    }
    .name {
        font-size: 30px;
    }
    .name-img {
        display: grid;
        grid-template-columns: 1fr 1fr;
        align-items: center;
        gap: 10px;
    }
    .stagram {
        margin: auto 0;
        font-size: 40px;
    }
    .container-inner {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        max-width: 800px;
        min-width: 600px;
        height: 150px;
        background-color: bisque;
        margin: 0 auto;
        border-radius: 20px;
    }
    .small-img {
        height: 50px;
        width: 50px;
    }
    .img {
        height: 100px;
        width: 100px;
    }
    .btn {
        height: 50px;
        width: 100px;
        background-color: #EFEFEF;
        border-radius: 10px;
        border-style: none;
    }
    .container-text {
        display: grid;
        grid-template-rows: 1fr 1fr ;
        margin: auto 25px;
    }
    .container-btn {
        display: grid;
        margin: auto 25px;
        grid-template-columns: 1fr 1fr ;
    }
    .container-img {
        display: flex;
        margin: 0 auto;
        align-items: center;
    }
    .fixed-footer {
        position: fixed;
        max-width: 800px;
        width: 100%;
        font-size: 20px;
        background-color: bisque;
        bottom: 0;
        text-align: center;
        padding: 5px;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 10px;
    }
</style>