const routes = [
    {
        path: "/main",
        component: () => import("../views/MainView.vue"),
        name: "main",
    },
    {
        path: "/:pathMatch(.*)*",
        redirect: {name: 'main'}
    },
];
export default routes;