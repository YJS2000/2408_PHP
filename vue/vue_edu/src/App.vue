<template>
  <!-- 자식 컴포넌트 호출 -->
   <BoardComponent />



   
  <!-- 리스트 랜더링 -->
  <!-- v_for -->
  <div v-for="val in 5" :key="val">
    <p>{{ val }}</p>
  </div>

  <!-- 구구단 -->
  <!-- <div v-for="dan in 9" :key="dan">
    <span>**** {{ dan }}단 ****</span>
    <div v-for="num in 9" :key="num">
      <span>{{ dan }} X {{ num }} = {{ dan*num }}</span>
    </div>
  </div> -->

  <div v-for="(item, key) in data" :key="item">
    <p>{{ `${key}번째 ${item.name} - ${item.age} - ${item.gender}` }}</p>
  </div>

  <!-- 조건부 랜더링 -->
  <!-- v-if -->
  <h1 v-if="cnt >= 5">5보다 이상입니다.</h1>
  <h1 v-else-if="cnt < 0">음수입니다</h1>
  <h1 v-else>나머지</h1>

  <!-- v-show -->
  <h1 v-show="flgShow">브이 쇼</h1>
  <button @click="flgShow = !flgShow">브이쇼 토글</button>


  <h1>{{ cnt }}</h1>
  <button @click="addCnt">증가</button>
  <button @click="disCnt">감소</button>
  <hr>
  <h2>이름 : {{ userInfo.name }}</h2>
  <h2 :class="ageBlue">나이 : {{ userInfo.age }}</h2>
  <h2>성별 : {{ userInfo.gender }}</h2>
  <h2>{{ userInfo.name }}</h2>
  <button @click="changeName">이름 변경</button>
  <button @click="changeAgeBlue">나이 파란색으로</button>
  <hr>
  <input type="text" v-model="transgender">
  <button @click="userInfo.gender = transgender">성별 변경</button>
  <p>{{ transgender }}</p>
  <hr>

</template>

<script setup>
import BoardComponent from './components/BoardComponent.vue';
import { reactive, ref } from 'vue';

const data = reactive([
      {name: '홍길동', age: 20, gender: '남자'}
      ,{name: '김영희', age: 12, gender: '여자'}
      ,{name: '둘리', age: 41, gender: '수컷'}
]);

const flgShow = ref(true);

const transgender = ref('');

//--------------------------------------------

const ageBlue = ref('');

function changeAgeBlue() {
  ageBlue.value = 'blue'
}

const cnt = ref(0);
const userInfo = reactive({
  name: '홍길동'
  ,age: 20
  ,gender: 'undefined'
});

function addCnt() {
  cnt.value++;
}

function disCnt() {
  cnt.value--;
}

function changeName() {
  userInfo.name = '갑순이';
}

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

.blue {
  color: #0000ff;
}
</style>
