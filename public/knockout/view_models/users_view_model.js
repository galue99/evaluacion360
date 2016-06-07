function EvaluadoresViewModel(){
	var self = this;
	var evaluador = new Evaluadores();
	var miscelaneo = new Miscelaneos();
	var admin = 1;

	//arrays para datos
	self.evaluadores = ko.observableArray();
	self.companies = ko.observableArray();
	self.selectedEvaluadores = ko.observable();
	self.showForm = ko.observable(false);
	self.updateEvaluadores = ko.observable();
	window.destroy = ko.observable();
	window.modify = ko.observable();


	self.formData = ko.observable({
		firstname: ko.observable(),
		lastname: ko.observable(),
		dni: ko.observable(),
		email: ko.observable(),
		deparment: ko.observable(),
		position: ko.observable(),
		company_id: ko.observable(),
		branch_office: ko.observable(),
		is_active: ko.observable()
	});


	//funcion para obtener empresas
	self.getCompanies = function(){
		miscelaneo.allCompanies()
		.done(function(response){
			self.companies(response);
		});
	};
	
	//para limpiar el formulario
	self.clearForm = function(){
		self.formData({
			firstname: ko.observable(),
			lastname: ko.observable(),
			dni: ko.observable(),
			email: ko.observable(),
			deparment: ko.observable(),
			position: ko.observable(),
			company_id: ko.observable(),
			branch_office: ko.observable(),
			is_active: ko.observable(),
			password: ko.observable()
		});
		$('#formEvaluadores').validate().resetForm();
	};


	//guardar el usuario
	self.save = function(){
		if ($('#formEvaluadores').valid()) {
		//chequeamos la variable para saber si es un update o un insert
			if (self.updateEvaluadores() == false){
				evaluador.create(self.formData())
				.done(function(response){
					self.toggleForm();
					self.getusers();
	                self.clearForm();
					toastr.info('El usuario se ha guardado con exito');
					self.updateEvaluadores(false);
				})
				.fail(function(response){
					toastr.error('Ocurrio un error al intentar guardar el usuario');
				});
			}else{
			//actualizando el usuario
				evaluador.update(self.formData().id, self.formData())
				.done(function(response){
					self.toggleForm();
					self.getusers();
					self.clearForm();
					self.updateEvaluadores(false);
					window.modify(null);
					toastr.info('El Usuario ha sido editado con exito');
				})
				.fail(function(response){
					toastr.error('Ha habido un error al actualizar el usuario');
				});
			};
		}else{
			toastr.warning('Debe completar todos los campos');
		}
	};


	//buscamos el usuario para luego editarlo
	self.editEvaluadores = function(data){
		evaluador.find(data)
		.done(function(response){
			self.toggleForm();
			self.formData(response);
			self.updateEvaluadores(true);
			response.password = response.repassword;
		});
	};

	//Borrando Usuarios
	self.removeEvaluadores = function(data){
		evaluador.destroy(data)
		.done(function(response){
			toastr.info('Usuario removido con exito');
			self.getusers();
    		window.destroy(null);
		});
	};

	self.toggleForm = function(){
		self.showForm(!self.showForm());
	};

	self.cancel = function(){
		self.toggleForm();
		self.clearForm();
		self.updateEvaluadores(false);
	};
	
	window.destroy.subscribe(function(value){
    	if (value){
    		swal({title: "¿Estas seguro?",
			text: "que desea eliminar este usuario",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Eliminar",
			closeOnConfirm: true },
			function(){
				self.removeEvaluadores(value);
			});
    	}	
    });
    
    window.modify.subscribe(function(value) {
        if(value){
        	self.editEvaluadores(value);
        }
    })


	//obteniendo empresas
	self.getCompanies();
	
	
	//Modificaciones para el datatable
	self.getusers = function(){
        evaluador.all()
        .done(function(response){
        	self.updateEvaluadores(false);
            $('#dataTable').DataTable().clear().rows.add(response).draw();
        })
    }
    
    self.loadScripts = function(){
        $('#dataTable').dataTable({
        	"language": {
					"sProcessing": "Procesando...",
					"sLengthMenu": "Mostrar _MENU_ registros",
					"sZeroRecords": "No se encontraron resultados",
					"sEmptyTable": "NingÃºn dato disponible en esta tabla",
					"sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					"sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
					"sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
					"sInfoPostFix": "",
					"sSearch": "Buscar:",
					"sUrl": "",
					"sInfoThousands": ",",
					"sLoadingRecords": "Cargando...",
					"oPaginate": {
					"sFirst": "Primero",
					"sLast": "Ultimo",
					"sNext": "Siguiente",
					"sPrevious": "Anterior"
				},
					"oAria": {
					"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
					"sSortDescending": ": Activar para ordenar la columna de manera descendente"
				}
			},
            columns: [
                {data: 'firstname'},
                {data: 'lastname'},
                {data: 'email'},
                {data: 'dni'},
                {data: 'position'},
                {data: 'branch_office'},
                {data: 'company.name'},
            ],
            columnDefs: [
            	{
            		targets: 7,
            		data: function (data) {
            			if( data.is_active == 1){
            				return 'Activo';
            			}else{
            				return 'Inactivo'
            			}
            		}
            	},
            	{
            		targets: 8,
            		data: function(data){
            			return '<button class="btn btn-flat btn-info btn-xs" onClick="window.modify('+data.id+')"> Editar</button>    <button class="btn btn-flat btn-danger btn-xs" onClick="window.destroy('+data.id+')"> Eliminar</button>';
            		}
            	}
            ]
        });
    }
    
    self.getusers();


}