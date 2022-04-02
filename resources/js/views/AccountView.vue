<template>
	Manage your tokens :
	<div v-for="token in userStore.user.userTokens">
		{{ token.created_at }} abilities :
		<div v-for="ability in token.abilities">
			{{ ability }}
		</div>
	</div>
	Create new api token :
	<q-btn label="get new token" @click="createToken"></q-btn>
	{{ newToken }} <br>
	<p>test your token
		<q-btn label="test token" @click="testToken"></q-btn>
	</p>
</template>
<script setup>
import {ref} from 'vue';
import {useUserStore} from "../store/user";

const userStore = useUserStore();

const newToken = ref('');

function createToken() {
    axios.post('/api/tokens/create')
         .then((response) => {
             newToken.value = response.data
         })
}

function testToken() {
    axios.post('/api/tokens/test')
         .then((response) => {
             console.log(response.data)
         })
         .catch((error) => {
             console.log(error)
         })
}
</script>