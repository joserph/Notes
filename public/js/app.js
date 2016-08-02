Vue.component('faovs', {
	template: '#faovs-template',

	props: ['list'],

	created(){
		this.list = JSON.parse(this.list);
	}
});

new Vue({
	el: '#faov'
})