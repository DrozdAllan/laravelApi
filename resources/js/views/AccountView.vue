<template>
	<q-page v-if="userStore.user">
		<TokenSettings />
	</q-page>
	<q-page v-else>
		<div class="row justify-center q-col-gutter-none q-col-gutter-md-md">
			<div class="col-12 col-md-3">
				<LoginForm />
			</div>
			<div class="col-12 col-md-3">
				<RegisterForm />
			</div>
		</div>
	</q-page>
</template>
<script setup>
import {onMounted} from "vue";
import LoginForm from '../components/LoginForm';
import RegisterForm from '../components/RegisterForm';
import TokenSettings from '../components/TokenSettings';
import {useUserStore} from "../store/user";

const userStore = useUserStore();

onMounted(() => {
    userStore.getUser();
})
</script>