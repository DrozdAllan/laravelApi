<template>
	<q-page v-if="userStore.user">
		<div class="row justify-center text-h4 text-primary text-bold">
			Manage your api token
		</div>
		<div class="row justify-center q-pa-md">
			<q-table :columns="columns"
			         :rows="rows"
			         hide-pagination
			         row-key="name"
			         title="Api Token">
				<template v-slot:top-right>
					<q-btn color="primary"
					       label="Create/Refresh Token"
					       no-caps
					       @click="refreshToken" />
				</template>
			</q-table>
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
	</q-page>
	<q-page v-else>
		<div class="row justify-center q-col-gutter-md">
			<div class="col-3">
				<LoginForm />
			</div>
			<div class="col-3">
				<RegisterForm />
			</div>
		</div>
	</q-page>
</template>
<script setup>
import LoginForm from '../components/LoginForm';
import RegisterForm from '../components/RegisterForm';
import {computed, ref} from 'vue';
import {useUserStore} from "../store/user";
import {copyToClipboard} from "quasar";

const userStore = useUserStore();
const newToken = ref('');
const alert = ref(false);
const isCopied = ref(false);

const tokenDate = computed(() => {
    const date = new Date(userStore.user.userToken.last_used_at);
    return date.toLocaleString('fr-FR');
})

const copyMsg = computed(() => {
    if (isCopied.value === false) {
        return "Copy Api Token";
    } else {
        return "Api Token Copied !";
    }
})

const columns = ref([{
    name: 'name', align: 'center', label: 'Token Name', field: row => row.name, sortable: false
}, {
    last_used: 'token', align: 'center', label: 'Last Used at', field: 'last_used', sortable: false
},]);
const rows = ref([{
    name: userStore.user.userToken.name, last_used: tokenDate,
}]);

function refreshToken() {
    axios.post('/api/tokens/create')
         .then((response) => {
             newToken.value = response.data
             alert.value = true;
             userStore.getUser();
         })
}

function copyToken() {
    copyToClipboard(newToken.value)
        .then(() => {
            isCopied.value = true;
        })
}
</script>