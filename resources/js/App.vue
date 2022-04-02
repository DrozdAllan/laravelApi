<template>
	<q-layout view="hHh lpR fFf">
		<q-header bordered class="bg-primary text-white" height-hint="98">
			<q-toolbar>
				<q-toolbar-title>
					<q-avatar>
						<img src="https://cdn.quasar.dev/logo-v2/svg/logo-mono-white.svg">
					</q-avatar>
					Movie Titles Api
				</q-toolbar-title>
			</q-toolbar>
			<QTabs />
		</q-header>
		<q-page-container>
			<router-view />
		</q-page-container>
	</q-layout>
</template>
<script setup>
import QTabs from './components/QTabs'
import {onMounted} from 'vue'
import {useUserStore} from "./store/user";

const userStore = useUserStore();
onMounted(() => {
    userStore.getUser();
})
</script>
<style></style>
