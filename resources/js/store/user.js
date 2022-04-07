import {defineStore} from "pinia";

export const useUserStore = defineStore('user', {
    state: () => {
        return {
            user: null
        }
    }, actions: {
        loginUser(username, password) {
            axios.get("/sanctum/csrf-cookie")
                 .then(() => {
                     axios
                         .post('/login', {
                             name: username, password: password
                         })
                         .then((response) => {
                             this.getUser();
                         })
                         .catch((e) => {
                             if (e.response.status === 422) {
                                 password.value = null;
                                 hasError.value = true;
                             }
                         })
                 })
        },
        getUser() {
            axios.get("/api/user")
                 .then((Response) => {
                     this.user = Response.data;
                 })
                 .catch((e) => {
                     if (e.response.status === 401) {
                         console.log('unauthorized')
                     }
                 })
        }
    }
})