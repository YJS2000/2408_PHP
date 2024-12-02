import axios from 'axios';
export default {
    namespaced: true,
    state: () => ({
        boardList: [],
        boardDetail: null,
        page: 0,
        controllFlg: true,
        lastPageFlg: false,

    }),
    mutations: {
        setBoardList(state, boardList) {
            state.boardList = state.boardList.concat(boardList);
        },
        setBoardDetail(state, board) {
            state.boardDetail = board;
        },
        // 스크롤 이벤트
        setPage(state, page) {
            state.page = page;
        },
        setBoardListUnshift(state, board) {
            state.boardList.unshift(board);
        },
        setControllFlg(state, flg) {
            state.controllFlg = flg;
        },
        setLastPageFlg(state, flg) {
            state.lastPageFlg = flg;
        },
    },
    actions: {
        boardListPagination(context) {
            const url = '/api/boards';
            axios.get(url)
            .then(response => {
                console.log(response);
                context.commit('setBoardList',response.data.boardList.data)
            })
            .catch(error => {
                console.error(error);
            });
        },
        showBoard(context, id) {
            const url = '/api/boards/'+id;
            axios.get(url)
            .then(response => {
                console.log(response);
                context.commit('setBoardDetail', response.data.board);
            })
            .catch(error => {
                console.error(error);
            });
        },
        boardListPagenation(context) {
            // 디 방운싱 처리 시작
            if(context.state.controllFlg && !context.state.lastPageFlg) {
                context.commit('setControllFlg', false);
                const url = '/api/boards?page=' + context.getters['getNextPage'];

                axios.get(url)
                .then(response => {
                    console.log('보드리스트 획득', response.data.boardList);
                    context.commit('setBoardList', response.data.boardList.data);
                    context.commit('setPage', response.data.boardList.current_page);
                    if(response.data.boardList.current_page >= response.data.boardList.last_page) {
                        context.commit('setLastPageFlg', true);
                    }
                })
                .catch(error => {
                    console.error(error);
                })
                .finally(error => {
                    context.commit('setControllFlg',true);
                });
            }
        }
    },
    getters: {
        getNextPage(state) {
            return state.page + 1;
        },
    }
}