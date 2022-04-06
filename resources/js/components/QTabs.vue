<template>
	<q-tabs>
		<q-route-tab label="Home" to="/home" />
		
		<q-route-tab v-if="userStore.user" label="Account" to="/account" />
		
		<q-route-tab v-else label="Login" to="/login" />
		<q-route-tab label="About" to="/about" />
	</q-tabs>
</template>
<script setup>
import {useUserStore} from "../store/user";

const userStore = useUserStore();


</script>
<style></style>