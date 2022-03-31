<template>
	<p>
		COUCOU ICI CEST MAIN VIEW </p>
	<button @click="increment">Count from this component is: {{ count }}</button>
	<router-view />
</template>
<script setup>
import {ref, onBeforeMount, onUpdated} from 'vue'

const count = ref(0)

function increment() {
    count.value++
}

onUpdated(() => {
    console.log('component updated !')
})

onBeforeMount(() => {
    console.log('the initial count is ' + count.value)
})
</script>
