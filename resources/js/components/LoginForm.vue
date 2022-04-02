<template>
	<q-form ref="loginForm" class="q-pa-md">
		<q-input v-model="username" :rules="usernameRules" filled label="Username" lazy-rules="ondemand"
		         @click="hasError = false" @keydown.enter="validateLogin" />
		<q-input v-model="password" :rules="passwordRules" :type="isPwd ? 'password' : 'text'" filled label="Password"
		         lazy-rules="ondemand" @click="hasError = false" @keydown.enter="validateLogin">
			<template v-slot:append>
				<q-icon :name="isPwd ? 'visibility_off' : 'visibility'" class="cursor-pointer" @click="isPwd = !isPwd" />
			</template>
		</q-input>
		<div class="flex flex-center">
			<q-btn :disable="hasError" color="primary" label="Login" @click="validateLogin" />
		</div>
	</q-form>
</template>
<script setup>
import {onMounted, ref} from "vue";
import {useUserStore} from '../store/user';

const userStore = useUserStore();

const loginForm = ref(null)
const hasError = ref(false)
const username = ref('')
const password = ref('')
const isPwd = ref(true)
const usernameRules = [(v) => !!v || "Required", (v) => v.length >= 5 || "Min 5 characters",];
const passwordRules = [(v) => !!v || "Required", (v) => v.length >= 6 || "Min 6 characters",]

async function validateLogin() {
    const success = await loginForm.value.validate();
    if (success) {
        axios
            .post('/login', {
                name: username.value, password: password.value
            })
            .then((response) => {
                userStore.getUser();
                // location.reload();
            })
            .catch((e) => {
                if (e.response.status === 422) {
                    password.value = null;
                    hasError.value = true;
                }
            })
    }
}

onMounted(() => {
    axios.get("/sanctum/csrf-cookie");
})
</script>