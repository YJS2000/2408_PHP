import { createRouter, createWebHistory } from 'vue-router';
import BoardListComponent from '../views/board/BoardListComponent.vue';  // Board 컴포넌트를 경로에 맞게 수정
import BoardCreateComponent from '../views/board/BoardCreateComponent.vue';

const routes = [
  {
    path: '/',  // 기본 경로,
    component: BoardListComponent,  // / 경로에 해당하는 컴포넌트로 Board.vue 설정
  },
  {
    path: '/boards/create',
    component: BoardCreateComponent,
  },
  // 다른 경로와 컴포넌트 추가 가능
];


const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;