import { createStore } from 'vuex';

const store = createStore({
  state : {
    user: null
  },
  mutations : {
    setUser(state, userData) {
      state.user = userData;
    },
    clearUser(state) {
      state.user = null;
    }
  },
  actions : {
    setUser({ commit }, userData) {
      commit('setUser', userData);
    },
    clearUser({ commit }) {
      commit('clearUser');
    }
  },
  getters : {
    isAuthenticated(state) {
      return !!state.user;
    },
    getUser(state) {
      return state.user;
    }
  }
});

export default store;
