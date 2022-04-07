<template>
	<div class="row justify-center text-h4 text-primary text-bold">
		Manage your api token
	</div>
	<div class="row justify-center q-pa-md">
		<q-btn color="negative"
		       label="disconnect"
		       @click="userStore.disconnectUser" />
		<div v-if="userToken.length">
			<span>
				Name : {{ userToken[0].name }} <br />
				Created at : {{ userToken[0].created_at }} <br />
				Last used at : {{ userToken[0].last_used_at }} <br />
			</span>
			<q-btn color="primary"
			       label="Create/Refresh Token"
			       no-caps
			       @click="refreshToken" />
		</div>
		<div v-else>
			You don't have any token yet
			<q-btn label="generate a token"
			       @click="refreshToken" />
		</div>
	</div>
	<q-dialog v-model="alert">
		<q-card class="q-pa-md">
			Your new apiToken is : <span class="text-primary"> {{ newToken }} </span>
			<q-card-actions align="center">
				<q-btn :label="copyMsg"
				       color="primary"
				       @click="copyToken" />
				<q-btn v-close-popup
				       color="primary"
				       flat
				       label="close" />
			</q-card-actions>
		</q-card>
	</q-dialog>
</template>
<script setup>
import {computed, onMounted, ref} from "vue";
import {useUserStore} from '../store/user';
import {copyToClipboard} from "quasar";

const userToken = ref('');
const newToken = ref('');
const alert = ref(false);
const isCopied = ref(false);


const userStore = useUserStore();

const copyMsg = computed(() => {
    if (isCopied.value === false) {
        return "Copy Api Token";
    } else {
        return "Api Token Copied !";
    }
})

function getToken() {
    axios.get('/api/user/token')
         .then((response) => {
             userToken.value = response.data;
         })
}

function refreshToken() {
    axios.post('/api/user/token')
         .then((response) => {
             newToken.value = response.data
             alert.value = true;
             getToken();
         })
}

function copyToken() {
    copyToClipboard(newToken.value)
        .then(() => {
            isCopied.value = true;
        })
}

onMounted(() => {
    getToken();
})
</script>