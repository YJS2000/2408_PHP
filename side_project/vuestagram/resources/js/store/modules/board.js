import axios from '../../axios';
import router from '../../router';

export default {
    namespaced: true,
    state: () => ({
        boardList: [],
        page: 0,
        boardDetail: null,
        controllFlg: true,
        lastPageFlg: false,
    }),
    mutations: {
        setBoardList(state, boardList) {
            state.boardList = state.boardList.concat(boardList);
        },
        setPage(state, page) {
            state.page = page;
        },
        setBoardDetail(state , board) {
            state.boardDetail = board;
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
        /**
         * 게시글 획득
         * 
         * @param {*}  context
         */
        boardListPagenation(context) {
            // 디 방운싱 처리 시작
            if(context.state.controllFlg && !context.state.lastPageFlg) {
                context.commit('setControllFlg', false);
                const url = '/api/boards?page=' + context.getters['getNextPage'];
                const config = {
                    headers: {
                        'Authorization': 'Bearer ' + localStorage.getItem('accessToken'),
                    }
                }

                axios.get(url, config)
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
        },
        /** 
         * 계시글 상제 정보 획득
         * 
         * @param {*} context
         * @param {int} id
         */
        showBoard(context, id) {
            const url = '/api/boards/' + id;
            const config = {
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('accessToken'),
                }
            }

            axios.get(url, config)
            .then(response => {
                // console.log(response);
                context.commit('setBoardDetail', response.data.board);
            })
            .catch(error => {
                console.error(error);
            });
        },

        /**
         * 게시글 작성 
         */
        storeBoard(context, data) {
            if(context.state.controllFlg) {
                context.commit('setControllFlg', false);

                const url = '/api/boards';
                const config = {
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'Authorization': 'Bearer ' + localStorage.getItem('accessToken'),
                    }
                };
                const formData = new FormData();
                formData.append('content', data.content);
                formData.append('file', data.file);

                axios.post(url, formData, config)
                .then(response => {
                    context.commit('setBoardListUnshift', response.data.board);

                    context.commit('user/setUserInfoBoardsCount', null, {root: true});

                    router.replace('/boards')
                })
                .catch(error => {
                    console.error(error);
                })
                .finally(() => {
                    context.commit('setControllFlg', true);
                });
            }
        },


    },
    getters: {
        getNextPage(state) {
            return state.page + 1;
        },
    }
}