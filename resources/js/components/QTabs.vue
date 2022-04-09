<template>
	<q-tabs dense>
		<q-route-tab label="Home" to="/home" />
		
		<q-route-tab label="Account" to="/account" />
	</q-tabs>
</template>
<script setup>
import {useUserStore} from "../store/user";

const userStore = useUserStore();


</script>
<style></style>