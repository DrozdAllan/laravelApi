<template>
	<div class="row justify-center text-h4 text-primary text-bold">
		Search by Title
	</div>
	<q-input v-model="title"
	         label="Enter a movie title"
	         @focus="[notFound = false, showMovieResult = undefined]" />
	<div class="row justify-center q-py-md">
		<q-btn color="primary"
		       label="Search"
		       @click="showMovie" />
	</div>
	<q-card v-if="notFound">
		Error : Movie not found
	</q-card>
	<q-card v-if="showMovieResult"
	        class="q-pa-none">
		<span class="text-primary text-bold">{{ showMovieResult.en_title }}</span>
		<q-card-section class="text-left q-pa-sm">
			<span>
				<b>Release date :</b> {{ showMovieResult.release_date }} <br />
				<b>Synopsis :</b> {{ showMovieResult.synopsis }} <br />
				<b>French title : </b><span v-if="showMovieResult.fr_title"> {{ showMovieResult.fr_title }} </span>
				<span v-else>No French title yet</span><br />
				<b>German title : </b><span v-if="showMovieResult.de_title"> {{ showMovieResult.de_title }} </span>
				<span v-else>No German title yet</span><br />
				<b>Spanish title : </b><span v-if="showMovieResult.es_title"> {{ showMovieResult.es_title }} </span>
				<span v-else>No Spanish title yet</span><br />
				<b>Italian title : </b><span v-if="showMovieResult.it_title"> {{ showMovieResult.it_title }} </span>
				<span v-else>No Italian title yet</span><br />
				<b>Chinese title : </b><span v-if="showMovieResult.zh_title"> {{ showMovieResult.zh_title }} </span>
				<span v-else>No Chinese title yet</span><br />
				<b>Russian title : </b><span v-if="showMovieResult.ru_title"> {{ showMovieResult.ru_title }} </span>
				<span v-else>No Russian title yet</span><br />
				<b>Japanese title : </b><span v-if="showMovieResult.ja_title"> {{ showMovieResult.ja_title }} </span>
				<span v-else>No Japanese title yet</span><br />
			</span>
		</q-card-section>
		<q-card-actions v-if="!allTitles"
		                align="center">
			<q-btn color="primary"
			       label="add translations"
			       @click="addTranslations" />
		</q-card-actions>
	</q-card>
</template>
<script setup>
import {computed, ref} from "vue";

const title = ref('');
const showMovieResult = ref(null);
const notFound = ref(false);

const allTitles = computed(() => {
    if (showMovieResult.value.fr_title == null || showMovieResult.value.de_title == null || showMovieResult.value.es_title == null || showMovieResult.value.it_title == null || showMovieResult.value.ja_title == null || showMovieResult.value.zh_title == null || showMovieResult.value.ru_title == null) {
        return false
    } else {
        return true
    }
})

function showMovie() {
    if (title.value) {
        const titleSlug = title.value.toLowerCase()
                               .replace(/ /g, '-');
        axios.get('/api/movies/' + titleSlug)
             .then((Response) => {
                 showMovieResult.value = Response.data;
             })
             .catch((e) => {
                 if (e.response.status === 404) {
                     notFound.value = true;
                 }
             })
    }
}

function addTranslations() {
    console.log(showMovieResult.value.fr_title);
}
</script>