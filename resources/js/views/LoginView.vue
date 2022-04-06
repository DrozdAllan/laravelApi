<template>
	<q-page>
		<div class="row justify-center q-col-gutter-md">
			<div class="col-3">
				<LoginForm />
			</div>
			<div class="col-3">
				<RegisterForm />
			</div>
		</div>
	</q-page>
</template>
<script setup>
import LoginForm from '../components/LoginForm';
import RegisterForm from '../components/RegisterForm';</script>