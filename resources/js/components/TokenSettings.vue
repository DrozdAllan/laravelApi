<template>
	<div class="row justify-center text-h6">
		Connected as {{ userStore.user.name }}
	</div>
	<div class="row justify-center">
		<q-btn class="q-ma-sm"
		       color="negative"
		       label="Disconnect"
		       no-caps
		       size="small"
		       @click="userStore.disconnectUser" />
	</div>
	<q-separator inset spaced />
	<div class="row justify-center q-py-none">
		<div v-if="userToken.length">
			<span>
				<div class="text-h5">Token Information</div>
				Name : {{ userToken[0].name }} <br />
				Created at : {{ tokenCreated }} <br />
				Last used at : {{ tokenLastUsed }} <br />
			</span>
			<q-btn class="q-my-md"
			       color="primary"
			       label="Create/Refresh Token"
			       no-caps
			       @click="refreshToken" />
		</div>
		<div v-else>
			You don't have any api token yet <br />
			<q-btn class="q-my-md"
			       color="primary"
			       label="Generate a token"
			       no-caps
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
import {computed, onBeforeMount, ref} from "vue";
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

const tokenCreated = computed(() => {
    if (userToken.value.length) {
        const date = new Date(userToken.value[0].created_at);
        return date.toLocaleString('fr-FR');
    }
})

const tokenLastUsed = computed(() => {
    if (userToken.value.length) {
        const date = new Date(userToken.value[0].last_used_at);
        return date.toLocaleString('fr-FR');
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

onBeforeMount(() => {
    getToken();
})
</script>