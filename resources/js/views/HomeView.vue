<template>
	<p>
		Welcome to Movie Titles Api : get movie titles in 10 different languages </p>
	<p>you can provide your api key here to test your rights :
		<q-input v-model="apiKey" filled label="Enter your apiKey"></q-input>
	</p>
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
    axios.get('/api/movies', {
        headers: {Authorization: 'Bearer ' + apiKey.value, }
    })
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
