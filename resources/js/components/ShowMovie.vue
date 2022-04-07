<template>
	<div class="row justify-center text-h4 text-primary text-bold">
		Search by Title
	</div>
	<div style="display: flex;justify-content: center">
		<q-input v-model="title"
		         label="Enter a movie title"
		         style="width: 300px;"
		         @focus="notFound = false ; showMovieResult = undefined"
		         @keydown.enter="showMovie(); movieLoading=true;" />
	</div>
	<div class="row justify-center q-py-md">
		<q-btn :loading="movieLoading"
		       color="primary"
		       label="Search"
		       @click="showMovie(); movieLoading=true;">
			<template v-slot:loading>
				<q-spinner-gears />
			</template>
		</q-btn>
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
		<q-card-actions v-if="missingTitles.length"
		                align="center">
			<q-btn color="primary"
			       label="add translations"
			       @click="translateDialog = true" />
		</q-card-actions>
	</q-card>
	<q-dialog v-model="translateDialog">
		<q-card class="q-pa-md"
		        style="width: 400px">
			<q-card-section>
				<div class="text-h6">Update movie title</div>
			</q-card-section>
			<q-card-section class="q-pt-none">
				<q-form ref="translateForm">
					<div class="row q-col-gutter-md">
						<div class="col-6">
							<q-select v-model="newLanguage"
							          :options="missingTitles"
							          label="Language"
							          @focus="translateBtn = 'translate'" />
						</div>
						<div class="col-6">
							<q-input v-model="newTitle"
							         label="Title"
							         @focus="translateBtn = 'translate'" />
						</div>
					</div>
				</q-form>
			</q-card-section>
			<q-card-actions align="center">
				<q-btn :label="translateBtn"
				       color="primary"
				       @click="validateTranslate" />
				<q-btn v-close-popup
				       color="primary"
				       flat
				       label="close"
				       @click="translateBtn = 'translate'" />
			</q-card-actions>
		</q-card>
	</q-dialog>
</template>
<script setup>
import {ref} from "vue";


const title = ref('');
const showMovieResult = ref(null);
const notFound = ref(false);
const translateDialog = ref(false);
const missingTitles = ref([]);
const newLanguage = ref('');
const newTitle = ref('');
const translateForm = ref(null);
const translateBtn = ref('translate');
const movieLoading = ref(false);

function showMovie() {
    if (title.value) {
        const titleSlug = title.value.toLowerCase()
                               .replace(/ /g, '-');
        axios.get('/api/movies/' + titleSlug)
             .then((Response) => {
                 showMovieResult.value = Response.data;
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
                 if (e.response.status === 404) {
                     notFound.value = true;
                 }
             })
    }
}

async function validateTranslate() {
    const success = await translateForm.value.validate();
    if (success) {
        axios.patch('/api/movies/' + showMovieResult.value.slug, {
            [newLanguage.value + '_title']: newTitle.value
        })
             .then((response) => {
                 translateBtn.value = "title added !";
                 newTitle.value = '';
                 newLanguage.value = '';
                 showMovie();
             })
             .catch((e) => {
                 console.log(e.response);
             })
    }
}
</script>