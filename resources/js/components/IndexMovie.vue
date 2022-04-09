<template>
	<div class="row justify-center text-h5">
		Random Movie
	</div>
	<div class="row justify-center q-py-sm">
		<q-btn :loading="movieLoading"
		       color="primary"
		       label="Get one random movie"
		       @click="indexMovie() ; movieLoading = true;">
			<template v-slot:loading>
				<q-spinner-gears />
			</template>
		</q-btn>
	</div>
	<q-card v-if="indexMovieResult"
	        class="q-pa-none">
		<span class="text-primary text-bold">{{ indexMovieResult.en_title }}</span>
		<q-card-section class="text-left q-pa-sm">
			<span>
				<b>Release date :</b> {{ indexMovieResult.release_date }} <br />
				<b>Synopsis :</b> {{ indexMovieResult.synopsis }} <br />
				<b>French title : </b><span v-if="indexMovieResult.fr_title"> {{ indexMovieResult.fr_title }} </span>
				<span v-else>No French title yet</span><br />
				<b>German title : </b><span v-if="indexMovieResult.de_title"> {{ indexMovieResult.de_title }} </span>
				<span v-else>No German title yet</span><br />
				<b>Spanish title : </b><span v-if="indexMovieResult.es_title"> {{ indexMovieResult.es_title }} </span>
				<span v-else>No Spanish title yet</span><br />
				<b>Italian title : </b><span v-if="indexMovieResult.it_title"> {{ indexMovieResult.it_title }} </span>
				<span v-else>No Italian title yet</span><br />
				<b>Chinese title : </b><span v-if="indexMovieResult.zh_title"> {{ indexMovieResult.zh_title }} </span>
				<span v-else>No Chinese title yet</span><br />
				<b>Russian title : </b><span v-if="indexMovieResult.ru_title"> {{ indexMovieResult.ru_title }} </span>
				<span v-else>No Russian title yet</span><br />
				<b>Japanese title : </b><span v-if="indexMovieResult.ja_title"> {{ indexMovieResult.ja_title }} </span>
				<span v-else>No Japanese title yet</span><br />
			</span>
		</q-card-section>
		<q-card-actions v-if="missingTitles.length"
		                align="center"
		                class="text-caption">
			search by title to add missing translations
		</q-card-actions>
	</q-card>
</template>
<script setup>
import {ref} from "vue";

const indexMovieResult = ref(null);
const missingTitles = ref([]);

const movieLoading = ref(false);


function indexMovie() {
    axios.get('/api/movies')
         .then((Response) => {
             indexMovieResult.value = Response.data;
             missingTitles.value = [];
             if (!Response.data['fr_title']) {
                 missingTitles.value.push('fr');
             }
             if (!Response.data['de_title']) {
                 missingTitles.value.push('de');
             }
             if (!Response.data['es_title']) {
                 missingTitles.value.push('es');
             }
             if (!Response.data['it_title']) {
                 missingTitles.value.push('it');
             }
             if (!Response.data['ja_title']) {
                 missingTitles.value.push('ja');
             }
             if (!Response.data['ru_title']) {
                 missingTitles.value.push('ru');
             }
             if (!Response.data['zh_title']) {
                 missingTitles.value.push('zh');
             }
             movieLoading.value = false;
         })
         .catch((e) => {
             console.log(e)
             if (e.response.status === 401) {
                 console.log('unauthorized')
             }
         })
}
</script>