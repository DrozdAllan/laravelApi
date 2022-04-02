<template>
	<q-form ref="registerForm" class="q-pa-md">
		<q-input v-model="email" :rules="emailRules" filled label="Email" lazy-rules="ondemand" type="email"
		         @click="hasError = false" @keydown.enter="validateRegister" />
		<q-input v-model="username" :rules="usernameRules" filled label="Username" lazy-rules="ondemand"
		         @click="hasError = false" @keydown.enter="validateRegister" />
		<q-input v-model="password" :rules="passwordRules" :type="isPwd ? 'password' : 'text'" filled label="Password"
		         lazy-rules="ondemand" @click="hasError = false" @keydown.enter="validateRegister">
			<template v-slot:append>
				<q-icon :name="isPwd ? 'visibility_off' : 'visibility'" class="cursor-pointer" @click="isPwd = !isPwd" />
			</template>
		</q-input>
		<div class="flex flex-center">
			<q-btn :disable="hasError" color="primary" label="Register" @click="validateRegister" />
		</div>
	</q-form>
</template>
<script setup>
import {ref} from "vue";


const registerForm = ref(null)
const hasError = ref(false)
const email = ref('')
const username = ref('')
const password = ref('')
const isPwd = ref(true)
const emailRules = [(v) => !!v || "Required", (v) => /.+@.+\..+/.test(v) || "Email must be valid",];
const usernameRules = [(v) => !!v || "Required", (v) => v.length >= 5 || "Min 5 characters",];
const passwordRules = [(v) => !!v || "Required", (v) => v.length >= 6 || "Min 6 characters",]

async function validateRegister() {
    const success = await registerForm.value.validate();
    if (success) {
        axios
            .post("/register", {
                email: email.value,
                name: username.value,
                password: password.value,
                password_confirmation: password.value,
            })
            .then((Response) => {
                if (Response.status == 201) {
                    axios
                        .post("/login", {
                            name: username.value, password: password.value
                        })
                        .then((Response) => {
                            location.reload();
                        });
                }
            })
    } else {
        console.log('form failure')
        hasError.value = true;
    }
}
</script>