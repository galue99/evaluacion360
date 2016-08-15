function ComportamientosViewModel(){
	var self = this;
	var comportamiento = new Comportamientos();
	var competencia = new Competencias();

	
	self.tableComportamientos = ko.observable(false);
	
	self.comportamientos = ko.observableArray();
	self.competencias = ko.observableArray();
	self.competenciasCompor = ko.observableArray();
	self.updateComportamiento = ko.observable(false);
	self.showForm = ko.observable(false);


	self.formData = ko.observable({
		competencia_id: ko.observable(),
		name: ko.observable(),
	});
	
	self.newComportamiento = function(){
		self.getCompeteciasToDataTable();
		self.getCompetencias();
		self.toggleForm();
	};


	self.getCompetencias = function(){
		competencia.competenciasComportamientos()
		.done(function(response){
			self.competencias(response);
			
			self.competencias().map(function(competencia){
				
				competencia.comportamientos = ko.observableArray(competencia.comportamiento);
				
				return competencia;
			});
			
		});
	};

	self.clearForm = function(){
		self.formData({
			competencia_id: ko.observable(),
			name: ko.observable(),
		});
		jQuery('#formComportamiento').validate().resetForm();
	};

	self.toggleForm = function(){
		self.showForm(!self.showForm());
		self.tableComportamientos(false);
	};

	self.cancel = function(){
		location.reload();
	};

	self.save = function(){
		if ($('#formComportamiento').valid()){
			if(self.updateComportamiento() != true){
				comportamiento.create(self.formData())
			.done(function(response){
				self.formData().name('');
				// self.clearForm();
				// self.toggleForm();
				self.getCompetencias();
				toastr.success('El comportamiento fue guardada exitosamene');
			})
			.fail(function(response){
				toastr.error('Hubo un error al guardar el comportamiento');	
			})
			}else{
				comportamiento.update(self.formData().id, self.formData())
				.done(function(response){
					self.cancel();
					self.clearForm();
					self.updateComportamiento(false);
					self.getCompetencias();
					toastr.info('Comportamiento actualizado con exito');	
				})
				.fail(function(response){
					toastr.error('Hubo un error al aztualizar el comportamiento');	
				})
			}
		}else{
			toastr.warning('Debe completar todos los campos');
		}
	}

	//buscamos el usuario para luego editarlo
	self.editComportamientos = function(data){
		comportamiento.find(data.competencia_id)
		.done(function(response){
			self.formData(data);
			self.updateComportamiento(true);
			self.toggleForm();
		});
	};

	//Borrando Usuarios
	self.removeComportamientos = function(data){
		swal({title: "¿Estas seguro?",
			text: "que desea eliminar este comportamiento",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Eliminar",
			closeOnConfirm: true },
			function(){
				comportamiento.destroy(data.id)
				.done(function(response){
					toastr.info('Comportamiento removido con exito');
					self.competenciaSeleted().comportamientos.remove(data);
				});
			});
	};
	
	self.Unselected = ko.observable(true);
	self.competenciaSeleted = ko.observableArray();
	self.competeSelected = ko.observable();
	//Toggle de box
	self.toggleBox = function(data){
		self.tableComportamientos(!self.tableComportamientos());
		self.competenciaSeleted(data[0]);
		self.competeSelected(data[0]);
		self.formData().competencia_id(data[0].id)
		self.Unselected(false);
	};
	
	
	window.view = ko.observable();
	window.view.subscribe(function(value) {
		var id = value;
		
		var competencia = self.competencias().filter(function(val){
			if( val.id == id ){
				return val
			}
		})
		competencia.map(function(obs){
			obs.comportamientos = ko.observableArray(obs.comportamiento);
		})
		self.toggleBox(competencia);
		
		
	})
	
	
	self.getCompeteciasToDataTable = function(){
		competencia.competenciasComportamientos()
        .done(function(response){
        	var data = response;
            $('#dataTable').DataTable().clear().rows.add(data).draw();
        })
    }
    
    self.loadScripts = function(){
        $('#dataTable').dataTable({
        	"language": {
					"sProcessing": "Procesando...",
					"sLengthMenu": "Mostrar _MENU_ registros",
					"sZeroRecords": "No se encontraron resultados",
					"sEmptyTable": "Ningun dato disponible en esta tabla",
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
                {data: 'name'},
                {data: 'definicion'},
            ],
            columnDefs: [
            	{
            		targets: 2,
            		data: function(data){
            			return '<i class="fa fa-blue fa-eye pointer" onClick="window.view('+data.id+')"></i>';
            		}
            	}
            ]
        });
    }
    
    self.getCompetencias();
    self.getCompeteciasToDataTable();

}