<template>
	<div class="panel panel-default">
		<div class="panel-heading">
			Get access token
		</div>
		<div class="panel-body">
			<button v-if="accessToken==null" class="btn btn-success" @click="getAccessToken">Get token</button>
			<p v-if="accessToken!=null">Your access token is {{accessToken}}</p>
		</div>
	</div>
</template>
<script>
	export default {
		data(){
			return {
				email: 'dmitriy@gmail.com',
				password: '',
				accessToken: null
			}
		},
		mounted(){
			console.log('Properties component loaded...');;
		},
		methods: {
			getAccessToken(){
				console.log('Login button clicked...');

				var data = {
					client_id: 2,
					client_secret: 'NrUAwpGPGgdOUAUjlvS6EjjvRlDe4hfi2uDAufGm',
					grant_type: 'password',
					username: this.email,
					password: 'Angelwok1'
				}
				axios.post('/oauth/token', data)
                    .then(response => {
                    	console.log(response.data.access_token);
                        this.accessToken = response.data.access_token;
                    });
			}
		}
	}
</script>