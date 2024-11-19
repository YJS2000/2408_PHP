
export default {
    namespaced: true, // 도뮬화 된 스토어의 네임스페이스 활성화
    state: () => ({
        // 데이터가 저장되는 영역
        count: 0,
        products: [
            {productName: '바지', productPrice: 38000, productContent: '매우 아름다운 바지'}
            ,{productName: '티셔츠', productPrice: 25000, productContent: '매우 아름다운 티셔츠'}
            ,{productName: '양말', productPrice: 39999, productContent: '매우 비싼 양말'}
        ],
        detailProduct: {productName: '', productPrice: 0, productContent: ''},
    }),
    mutations: {
        // 데이터를 수정할 수 있는 메소드들을 정의하는영역
        addCount(state) {
            state.count++;
        },
        setDetailProduct(state, item) {
            state.detailProduct = item;
        },
    },
    actions: {
        // 비동기성 비지니스 로직 함수를 정의하는 영역
    },
    getters: {
        // 추가처리를 하여 state의 데이터를 획득 하기위한 함수들을 정의하는 영역
    },
}