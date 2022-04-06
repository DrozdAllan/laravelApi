<template>
	<div class="row justify-center text-h4 text-primary text-bold">
		Random Movie
	</div>
	<div class="row justify-center q-py-md">
		<q-btn color="primary" label="Get one random movie" @click="indexMovie"></q-btn>
	</div>
	<q-card v-if="indexMovieResult" class="q-pa-sm">
		<span class="text-primary text-bold">{{ indexMovieResult.en_title }}</span>
		<q-card-section class="text-left">
						<span>
							<b>Release date :</b> {{ indexMovieResult.release_date }} <br />
							<b>Synopsis :</b> {{ indexMovieResult.synopsis }} <br />
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
import {ref, computed} from "vue";

const indexMovieResult = ref(null);

const frTitle = computed(() => {
    if (indexMovieResult.frTranslation) {
        return indexMovieResult.frTranslation
    } else {
        return 'no translation yet'
    }
})
const deTitle = computed(() => {
    if (indexMovieResult.deTranslation) {
        return indexMovieResult.deTranslation
    } else {
        return 'no translation yet'
    }
})
const esTitle = computed(() => {
    if (indexMovieResult.esTranslation) {
        return indexMovieResult.esTranslation
    } else {
        return 'no translation yet'
    }
})
const itTitle = computed(() => {
    if (indexMovieResult.itTranslation) {
        return indexMovieResult.itTranslation
    } else {
        return 'no translation yet'
    }
})
const jaTitle = computed(() => {
    if (indexMovieResult.jaTranslation) {
        return indexMovieResult.jaTranslation
    } else {
        return 'no translation yet'
    }
})
const ruTitle = computed(() => {
    if (indexMovieResult.ruTranslation) {
        return indexMovieResult.ruTranslation
    } else {
        return 'no translation yet'
    }
})
const zhTitle = computed(() => {
    if (indexMovieResult.zhTranslation) {
        return indexMovieResult.zhTranslation
    } else {
        return 'no translation yet'
    }
})

function indexMovie() {
    axios.get('/api/movies')
         .then((Response) => {
             indexMovieResult.value = Response.data;
         })
         .catch((e) => {
             console.log(e)
             if (e.response.status === 401) {
                 console.log('unauthorized')
             }
         })
}
</script>