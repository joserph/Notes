new Vue({
	http: {
		
		headers: {
			'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
		}
	},

	el: '#faov',

	data: {
		faovs: [],
		newFaov: {
			id_user: '',
			update_user: '',
			periodo: '',
			estatus: '',
			pagado_por: '',
			monto: '',
			fecha_pago: ''
		}
	},

	ready: function(){
		this.listFaovs();
	},

	methods: {
		listFaovs: function(){
			this.$http.get('faov').then(function(faovs){
				this.$set('faovs', faovs.data)
			});
		},

		AddNewFaov: function(){
			var pago = this.newFaov
			
			// Limpiar inputs
			this.newFaov = {
				id_user: '',
				update_user: '',
				periodo: '',
				estatus: '',
				pagado_por: '',
				monto: '',
				fecha_pago: ''
			}

			// Envio de datos
			this.$http.post('/faovs', pago)

			// Cargar pagos
			this.listFaovs()
		}
	},

	computed: {
		validation: function(){
			return {
				periodo: !!this.newFaov.periodo.trim(),
				estatus: !!this.newFaov.estatus.trim()
			}
		},

		isValid: function(){
			var validation = this.validation
			return Object.keys(validation).every(function (key) {
        		return validation[key]
      		})
		}
	}
});