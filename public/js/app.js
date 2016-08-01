var app = new Vue({
	el: '#faov',
	data: {
		form: {},
		errors: {}
	},

	methods: {
		index: function()
		{
			this.$http.get('/faovs', function(data)
			{
				this.$set('faovs', data)
			})
		},

		created: function(){
			Vue.set(this.$data, 'form', _form); // Seteo mis inputs.
		}
	},
	

	ready: function()
	{
		this.index()
	}
})