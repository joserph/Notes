new Vue({
	el: '#faov',

	data: {
		faovs: []
	},

	ready: function(){
		this.listFaovs();
	},

	methods: {
		listFaovs: function(){
			this.$http.get('faov').then(function(faovs){
				this.$set('faovs', faovs.data)
			});
		}
	}
});