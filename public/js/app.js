var app = new Vue({
	el: '#faov',
	data: {
		form: {},
		errors: {}
	},

	created: function(){
		Vue.set(this.$data, 'form', _form); // Seteo mis inputs.
	}
})