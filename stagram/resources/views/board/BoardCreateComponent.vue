<template>
<div class="container">
    <h3>글작성</h3>
    <img class="img" src="">
    <textarea class="title" name="content" placeholder="내용을적어주세요" maxlength="200"></textarea>
    <input type="file" name="file" accept="image/*">
    <button>작성</button>
    <button @click="$router.push('/')">취소</button>
</div>
</template>

<script setup>

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

.img {
    width: 100px;
    height: 100px;
}
</style>