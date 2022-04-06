<template>
	<q-tabs>
		<q-route-tab label="Home" to="/home" />
		
		<q-route-tab label="Account" to="/account" />
		
		<q-route-tab label="About" to="/about" />
	</q-tabs>
</template>
<script setup>
import {useUserStore} from "../store/user";

const userStore = useUserStore();


</script>
<style></style>