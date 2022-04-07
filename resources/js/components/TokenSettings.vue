<template>
	<div class="row justify-center text-h4 text-primary text-bold">
		Manage your api token
	</div>
	<div class="row justify-center q-pa-md">
		<q-btn color="negative"
		       label="disconnect"
		       @click="disconnect" />
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
</template>
<script setup>
import {computed, ref} from "vue";
import {useUserStore} from '../store/user';
import {copyToClipboard} from "quasar";

const newToken = ref('');
const alert = ref(false);
const isCopied = ref(false);


const userStore = useUserStore();

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

function disconnect() {
    axios.post('/logout')
         .then((response) => {
             location.reload();
         })
}
</script>