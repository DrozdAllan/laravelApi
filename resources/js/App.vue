<template>
	<q-layout view="hHh lpR fFf">
		<q-header bordered class="bg-primary text-white" height-hint="98">
			<q-toolbar class="text-center">
				<q-toolbar-title>
					Movie Titles Api : Get movie titles in 10 different languages <a href="/api/documentation" target="new" style="text-decoration: none">
					<q-btn color="white" glossy label="DOCUMENTATION" text-color="primary" />
				</a>
				</q-toolbar-title>
			</q-toolbar>
			<QTabs />
		</q-header>
		<q-page-container>
			<router-view class="q-pa-md text-center" />
		</q-page-container>
	</q-layout>
</template>
<script setup>
import QTabs from './components/QTabs'

</script>
<style></style>
