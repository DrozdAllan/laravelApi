<template>
	<q-page>
		<span>
			Movie Titles is an api developed by <a class="text-primary"
			                                       href="https://allandrozd.com/"
			                                       style="text-decoration: none"
			                                       target="new">Allan Drozd</a> that display movies in English, French, German, Spanish, Italian, Chinese, Russian and Japanese. <br />
			The documentation for the api is available <a class="text-primary"
			                                              href="/api/documentation"
			                                              style="text-decoration: none"
			                                              target="new"> here </a>. <br />
			To add movies and translations, you can use the account "user1" and the password "password".
			<!--		TODO: add contact mail with mailtrap to test mailer in laravel -->
		</span>
		<q-separator inset spaced />
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
import ShowMovie from '../components/ShowMovie'</script>
