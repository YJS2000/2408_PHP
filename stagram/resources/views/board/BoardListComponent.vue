<!-- 리스트 -->
<template>
    <div class="board-center">
        <div class="board-flex">
            <div  v-for="item in boardList" :key="item" class="board-width">
                <img @click="openModal(item.board_id)" class="board-img" :src="item.img" alt="" >
            </div>
        </div>
    </div>  

<!-- 상세모달 -->
    <div v-show="modalFlg"  class="board-detail-box">
        <div v-if="boardDetail" class="board-item">
            <img class="modal-img" :src='boardDetail.img'>
            <hr>
            <p>{{ boardDetail.content }}</p>
            <hr>
            <div>
                <span>작성자 : {{ boardDetail.user.name }}</span>
                <button @click="closeModal" class="btn">닫기</button>
                <button class="btn">수정</button>
                <button @click="destroyBoard(boardDetail.board_id)" class="btn">삭제</button>
            </div>
        </div>
    </div>
</template>



<script setup>
import { computed, onBeforeMount, ref } from 'vue';
import { useStore } from 'vuex';

const store = useStore();

// 보드 상세 정보
const boardDetail = computed(() => store.state.board.boardDetail);

// 보드 리스트
const boardList = computed(() => store.state.board.boardList);

onBeforeMount(() => {
    store.dispatch('board/boardListPagination');
});

//-------------------------------
// 스크롤 이벤트 관련
const boardScrollEvent = () => {
    // console.log(store.state.board.controllFlg);
    if(store.state.board.controllFlg) {
        const docHeight = document.documentElement.scrollHeight; // 문서기준 Y축 길이
        const winHeight = window.innerHeight; // 윈도우의 Y축 총길이
        const nowHeight = window.scrollY; // 현재 스크롤 위치
        const viewHeight = docHeight - winHeight; // 끝까지 스크롤 했을때 Y축 위치
        // console.log('if문작동됨')
        if(viewHeight <= nowHeight) {
            // console.log('if문작동됨')
            store.dispatch('board/boardListPagenation');
        }

    }
}
window.addEventListener('scroll', boardScrollEvent );


// 모달 관련
const modalFlg = ref(false);
const closeModal = () => {
    modalFlg.value = false;
}
const openModal = (id) => {
    store.dispatch('board/showBoard', id)
    modalFlg.value = true;
}

const destroyBoard = (id) => {
    modalFlg.value = false;
    store.dispatch('board/destroyBoard',id)
}



</script>

<style>
    .board-center {
        max-width: 800px;
        margin: 20px auto;
    }
    .board-img {
        width: 300px;
        height: 300px;
    }
    .board-flex {  
        display: grid;
        grid-template-columns: repeat(2, 1fr); /* 열 2개 */
        gap: 20px;
    }
    .board-width {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .board-detail-box {
        display :flex; 
        justify-content:center;
        align-items :center;
        background-color : rgba(0,0,0,0.2);
        position: fixed;
        top : 0;
        left :0;
        width : 100vw; 
        height : 100vh;
        z-index: 100;
    }
    .board-item {
        width: 500px;
        height: 500px;
        background-color: bisque;
        border-radius: 20px;
        text-align: center;
        display: grid;
        grid-template-columns: 300px, 100px ,100px;
        align-items: center;
        justify-items: center;
    }
    .modal-img {
        width: 300px;
        height: 300px;
    }
    .btn {
        margin-left: 5px;
    }
</style>