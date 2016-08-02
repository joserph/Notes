Vue.component('faovs', {
	template: '#faovs-template',

	data: function(){
		return {
			list: []
		};
	},

	created: function(){
		$.getJSON('faovs', function(faovs)
		{
			this.list = faovs;
		});
	}
})

new Vue({
	el: '#faov'
})