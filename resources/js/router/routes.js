const routes = [{
    path: "/home",
    component: () => import("../views/HomeView.vue"),
    name: "home",
}, {
    path: "/account",
    name: "account",
    component: () => import("../views/AccountView")
}, {
    path: "/about",
    component: () => import("../views/AboutView.vue"),
    name: "about",
}, {
    path: "/:pathMatch(.*)*", redirect: {name: 'home'}
},];
export default routes;