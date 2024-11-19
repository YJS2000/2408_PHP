<template>
  <img alt="Vue logo" src="./assets/logo.png">
  <!-- <h1>{{ count }}</h1>
  <button @click="store.commit('board/addCount')">증가</button> -->

  <BoardListComponents />

  <!-- detail modal -->

</template>

<script setup>
  import BoardListComponents from './components/BoardListComponents.vue';
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
