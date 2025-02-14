import { createStore } from "vuex";

const store = createStore();

// Auth store
import auth from "./auth";
store.registerModule("auth", auth);


import route from "./route";
store.registerModule("route", route);

export default store;
