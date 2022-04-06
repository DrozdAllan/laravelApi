<template>
	<div class="row justify-center text-h4 text-primary text-bold">
		Search by Title
	</div>
	<q-input v-model="title" label="Enter a movie title" @focus="[notFound = false, showMovieResult = undefined]" />
	<div class="row justify-center q-py-md">
		<q-btn color="primary" label="Search" @click="showMovie" />
	</div>
	<q-card v-if="notFound">
		Error : Movie not found
	</q-card>
	<q-card v-if="showMovieResult" class="q-pa-sm">
		<span class="text-primary text-bold">{{ showMovieResult.en_title }}</span>
		<q-card-section class="text-left">
				<span>
							<b>Release date :</b> {{ showMovieResult.release_date }} <br />
							<b>Synopsis :</b> {{ showMovieResult.synopsis }} <br />
							<b>French title :</b> {{ frTitle }}<br />
							<b>German title :</b> {{ deTitle }}<br />
							<b>Spanish title :</b> {{ esTitle }}<br />
							<b>Italian title :</b> {{ itTitle }}<br />
							<b>Japanese title :</b> {{ jaTitle }}<br />
							<b>Russian title :</b> {{ ruTitle }}<br />
							<b>Chinese title :</b> {{ zhTitle }}<br />
						</span>
		</q-card-section>
	</q-card>
</template>
<script setup>
import {computed, ref} from "vue";

const title = ref('');
const showMovieResult = ref(null);
const notFound = ref(false);

const frTitle = computed(() => {
    if (showMovieResult.frTranslation) {
        return showMovieResult.frTranslation
    } else {
        return 'no translation yet'
    }
})
const deTitle = computed(() => {
    if (showMovieResult.deTranslation) {
        return showMovieResult.deTranslation
    } else {
        return 'no translation yet'
    }
})
const esTitle = computed(() => {
    if (showMovieResult.esTranslation) {
        return showMovieResult.esTranslation
    } else {
        return 'no translation yet'
    }
})
const itTitle = computed(() => {
    if (showMovieResult.itTranslation) {
        return showMovieResult.itTranslation
    } else {
        return 'no translation yet'
    }
})
const jaTitle = computed(() => {
    if (showMovieResult.jaTranslation) {
        return showMovieResult.jaTranslation
    } else {
        return 'no translation yet'
    }
})
const ruTitle = computed(() => {
    if (showMovieResult.ruTranslation) {
        return showMovieResult.ruTranslation
    } else {
        return 'no translation yet'
    }
})
const zhTitle = computed(() => {
    if (showMovieResult.zhTranslation) {
        return showMovieResult.zhTranslation
    } else {
        return 'no translation yet'
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
</script>