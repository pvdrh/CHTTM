import {createRouter, createWebHistory} from "vue-router";
import store from "../stores/_loader";
import {HomeRoutes} from "./HomeRoutes.js";
import {AdminRoutes} from "./AdminRoutes.js";
import { JobRoutes } from "./JobRoutes.js";


const routers = createRouter({
    history: createWebHistory(),
    routes: [...HomeRoutes, ...AdminRoutes, ...JobRoutes],
});
routers.beforeEach(async (to, from, next) => {
    console.log("from", from.path);
    console.log("to", to.path);
    console.log(from.path.includes("admin"));
    if (from.path.includes("admin")) {
        let isAuthenticate = store.getters["auth/isLogged"];
        // let user = store.getters["auth/getUser"];
        if (!isAuthenticate) {
            if (to.meta.auth === false) return next();
            return from();
        }
        return next();
        // else {
        //     if (user && user?.expires_in < Date.now()) {
        //         await store.dispatch("auth/refreshToken");
        //     }
        //     return next();
        // }
    } else return next();
});

export default routers;
