<template>
	<q-page>
		<div class="row justify-center q-col-gutter-md">
			<div class="col-4">
				<IndexMovie />
			</div>
			<div class="col-4">
				<ShowMovie />
			</div>
		</div>
	</q-page>
</template>
<script setup>
import IndexMovie from '../components/IndexMovie'
import ShowMovie from '../components/ShowMovie'</script>
