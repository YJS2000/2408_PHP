<template>
<div class="container">
    <h3>글작성</h3>
    <img class="img" :src="preview">
    <textarea v-model="boardInfo.content" class="title" name="content" placeholder="내용을적어주세요" maxlength="200"></textarea>
    <input @change="setFile" type="file" name="file" accept="image/*">
    <button @click="$store.dispatch('board/storeBoard', boardInfo)">작성</button>
    <button @click="$router.push('/')">취소</button>
</div>
</template>

<script setup>

import { reactive, ref } from 'vue';

const boardInfo = reactive({
        content: ''
        ,file: null
    });

const preview = ref('');

const setFile = (e) => {
    boardInfo.file = e.target.files[0];
    preview.value = URL.createObjectURL(boardInfo.file);
}
</script>

<style>
.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 20px;
}

.title {
    height: 100px;
    width: 300px;
}
</style>