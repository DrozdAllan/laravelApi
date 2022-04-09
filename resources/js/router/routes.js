const routes = [{
    path: "/home",
    component: () => import("../views/HomeView.vue"),
    name: "home",
}, {
    path: "/account",
    name: "account",
    component: () => import("../views/AccountView")
}, {
    path: "/:pathMatch(.*)*", redirect: {name: 'home'}
},];
export default routes;