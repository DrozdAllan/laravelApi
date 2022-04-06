<template>
	<div class="row justify-center text-h4 text-primary text-bold">
		Random Movie
	</div>
	<div class="row justify-center q-py-md">
		<q-btn color="primary"
		       label="Get one random movie"
		       @click="indexMovie"></q-btn>
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
		                align="center">
			<q-btn color="primary"
			       label="add translations"
			       @click="translateDialog = true" />
		</q-card-actions>
	</q-card>
	<q-dialog v-model="translateDialog">
		<q-card class="q-pa-md">
			<q-form ref="translateForm">
				<div class="row q-col-gutter-md">
					<div class="col-6">
						<q-select v-model="newLanguage"
						          :options="missingTitles"
						          label="language" @focus="translateBtn = 'translate'" />
					</div>
					<div class="col-6">
						<q-input v-model="newTitle"
						         label="title" @focus="translateBtn = 'translate'" />
					</div>
				</div>
			</q-form>
			<q-card-actions align="center">
				<q-btn color="primary"
				       :label="translateBtn"
				       @click="validateTranslate" />
				<q-btn v-close-popup
				       color="primary"
				       flat
				       label="close" @click="translateBtn = 'translate'" />
			</q-card-actions>
		</q-card>
	</q-dialog>
</template>
<script setup>
import {ref} from "vue";

const indexMovieResult = ref(null);
const translateDialog = ref(false);
const missingTitles = ref([]);
const newLanguage = ref('');
const newTitle = ref('');
const translateForm = ref(null);
const translateBtn = ref('translate');


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
         })
         .catch((e) => {
             console.log(e)
             if (e.response.status === 401) {
                 console.log('unauthorized')
             }
         })
}

async function validateTranslate() {
    const success = await translateForm.value.validate();
    if (success) {
        axios.patch('/api/movies/' + indexMovieResult.value.slug, {
            [newLanguage.value + '_title']: newTitle.value
        })
             .then((response) => {
                 console.log(response);
                 translateBtn.value = "title added !";
                 newTitle.value = '';
                 newLanguage.value = '';
             })
             .catch((e) => {
                 console.log(e.response);
             })
    }
}
</script>