<template>
  <q-page>
		<span>
			Movie Titles is an api that display movies in English, French, German, Spanish, Italian, Chinese, Russian and Japanese. <br />
			The documentation for the api is available <a class="text-primary"
																		 href="/api/documentation"
																		 style="text-decoration: none"
																		 target="new">here</a>. <br />
			To add movies and translations, you can use the account "user1" and the password "password". <br />
			Developed by <a class="text-primary"
								 href="https://allandrozd.com/"
								 style="text-decoration: none"
								 target="new">Allan Drozd</a>. For any question <a class="text-primary"
																									href="#"
																									style="text-decoration: none"
																									@click="dialog = true">contact me</a>.
		</span>
	 <q-dialog v-model="dialog"
				  persistent>
		<q-card style="min-width: 350px">
		  <q-card-section>
			 <div class="text-h6">Contact by Mail</div>
		  </q-card-section>
		  <q-form ref="contactForm">
			 <q-card-section class="q-pt-none">
				<q-input v-model="mail"
							:rules="emailRules"
							autofocus
							dense
							label="Your mail to recontact you"
							lazy-rules="ondemand"
							type="email" />
			 </q-card-section>
			 <q-card-section class="q-pt-none">
				<q-input v-model="message"
							autofocus
							dense
							label="Your message"
							type="textarea"
							@keyup.enter="dialog = false" />
			 </q-card-section>
		  </q-form>
		  <q-card-actions align="right"
								class="text-primary">
			 <q-btn v-close-popup
					  flat
					  label="Cancel" />
			 <q-btn flat
					  label="Send mail"
					  @click="contactValidate" />
		  </q-card-actions>
		</q-card>
	 </q-dialog>
	 <q-dialog v-model="seamless"
				  position="bottom"
				  seamless>
		<q-card style="width: 350px">
		  <q-card-section class="row items-center no-wrap">
			 <div class="text-weight-bold">Message sent !</div>
			 <q-space />
			 <q-btn v-close-popup
					  flat
					  icon="close"
					  round />
		  </q-card-section>
		</q-card>
	 </q-dialog>
	 <q-separator inset
					  spaced />
	 <div class="row justify-center q-col-gutter-md q-pt-md">
		<div class="col-12 col-md-4">
		  <ShowMovie />
		</div>
		<div class="col-12 col-md-4">
		  <IndexMovie />
		</div>
	 </div>
  </q-page>
</template>
<script setup>
import IndexMovie from '../components/IndexMovie'
import ShowMovie from '../components/ShowMovie'

import {ref} from 'vue';

const dialog = ref(false);
const contactForm = ref(null);
const mail = ref('');
const message = ref('');
const seamless = ref(false);

const emailRules = [(v) => !!v || "Required", (v) => /.+@.+\..+/.test(v) || "Email must be valid"];

async function contactValidate() {
    const success = await contactForm.value.validate();
    if (success) {
        sendMsg();
        dialog.value = false;
        mail.value = '';
        message.value = '';
        seamless.value = true;
    }
}

function sendMsg() {
    axios.post('api/contact', {
        'mail': mail.value, 'message': message.value
    });

}
</script>
