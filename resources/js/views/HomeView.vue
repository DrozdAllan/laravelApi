<template>
	<p>
		Welcome to Movie Titles Api : get movie titles in 10 different languages </p>
	<p>
		get all movies :
		<q-btn label="get all movies" @click="getAllMovies"></q-btn>
	</p>
	<router-view />
</template>
<script setup>
import {ref} from 'vue'

const apiKey = ref('')
const movies = ref(null);

function getAllMovies() {
    axios.get('/api/movies')
         .then((Response) => {
             movies.value = Response.data;
         })
         .catch((e) => {
             console.log(e)
             if (e.response.status === 401) {
                 console.log('unauthorized')
             }
         })
}
</script>
