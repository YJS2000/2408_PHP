<template>
    <div v-for="item in fashion" :key="item">
        <h1 @click="openDetailModal(item)">{{ item.productName }}</h1>
        <p>{{ item.productContent }}</p>
        <p>{{ item.productPrice }}원</p>
   </div>
        <!-- detial modal -->
    <Transition name="detailModalAnimation">
         <div class="bg-modal-black" v-show="flgDetail">
            <div class="bg-modal-white">
                <h1>{{ detailProduct.productName }}</h1>
                <p>{{ detailProduct.productContent }}</p>
                <p>{{ detailProduct.productPrice }}</p>
                <button @click="closeDetailModal">닫기</button>
            </div>
        </div>
    </Transition>
 
</template>
<script setup>
    import { computed, ref } from 'vue';
    import { useStore } from 'vuex';

    const store = useStore();

    const fashion = computed(() => store.state.board.products);

    //상세 모달 제어
    const flgDetail = ref(false);
    const detailProduct = computed(() => store.state.board.detailProduct);
    const openDetailModal = (item) => {
        store.commit('board/setDetailProduct', item)
        flgDetail.value = true
    }
    const closeDetailModal = () => {
        flgDetail.value = false
    }

</script>
<style>
.bg-modal-black {
     width: 100vw;
     height: 100vh;
     background-color: rgba(0, 0, 0, 0.4);
     position: fixed;
     top: 0;
     left: 0;
}
.bg-modal-white {
    background-color: #fff;
    width: 80%;
    max-width: 300px;
    margin: 20px auto;
    padding: 20px;
}

.detailModalAnimation-enter-from {
    opacity: 0;
    }
.detailModalAnimation-enter-active {
    transition: 1s ease;
}
.detailModalAnimation-enter-active{
    opacity: 1s;
}

.detailModalAnimation-leave-from{
    transform: translateX(0px);
}
.detailModalAnimation-leave-active {
    transition: all 4s;
}
.detailModalAnimation-leave-to {
    transform: translateX(4000px);
}
</style>