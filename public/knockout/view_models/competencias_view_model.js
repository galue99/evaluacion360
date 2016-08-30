function CompetenciasViewModel(){
	var self = this;
	var competencia = new Competencias();

	//arrays para datos
	self.competencias = ko.observableArray();
	self.showForm = ko.observable(false);
	self.updateCompetencia = ko.observable(false)
	self.typeCompetencia = ko.observableArray([
		{type : 'Organizacional'},
		{type : 'Del cargo'}
		])
	window.destroy = ko.observable();
	window.modify = ko.observable();

	self.formData = ko.observable({
		name: ko.observable(),
		type: ko.observable(),
		description: ko.observable()
	});

	//para limpiar el formulario
	self.clearForm = function(){
		self.formData({
			name: ko.observable(),
			type: ko.observable(),
			description: ko.observable()
		});
		jQuery('#formCompetencia').validate().resetForm();
	};

	self.toggleForm = function(){
		self.showForm(!self.showForm());
	};

	self.cancel = function(){
		self.toggleForm();
		self.clearForm();
	};

	self.save = function(){
		if (jQuery('#formCompetencia').valid()) {
			if(self.updateCompetencia() != true){
				competencia.create(self.formData())
				.done(function(response){
					self.clearForm();
					self.toggleForm();
					self.getCompeteciasToDataTable();
					toastr.success('La competencia fue guardada exitosamene');
				})
				.fail(function(response){
					toastr.error('Hubo un error al guardar la competencia');	
				})
			}else{
				competencia.update(self.formData().id, self.formData())
				.done(function(response){
					self.clearForm();
					self.toggleForm();
					self.getCompeteciasToDataTable();
					self.updateCompetencia(false);
					toastr.info('Competencia Actualizado con exito');
				}).fail(function(response){
					toastr.error('hubo un error al intentar actualizar la competencia');
				})
			}
		}else{
			toastr.warning('Debe completar todos los campos');
		}
	};

	//buscamos el usuario para luego editarlo
	self.editCompetencias = function(data){
		competencia.find(data)
		.done(function(response){
			self.formData(response);
			self.updateCompetencia(true);
			self.toggleForm();
			self.getCompeteciasToDataTable();
		});
	};
	
	window.destroy.subscribe(function(value){
    	if (value){
    		swal({title: "¿Estas seguro?",
			text: "que desea eliminar esta competencia",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Eliminar",
			closeOnConfirm: true },
			function(){
				competencia.destroy(value)
				.done(function(response){
					toastr.info('Competencia removida con exito');
					self.getCompeteciasToDataTable();
				});
			});
    	}	
    });
    
    window.modify.subscribe(function(value) {
        if(value){
        	self.editCompetencias(value);
        }
    })

	// self.getCompetencias();
	
	
	self.getCompeteciasToDataTable = function(){
		competencia.all()
        .done(function(response){
        	var data = response;
            $('#dataTable').DataTable().clear().rows.add(data).draw();
        })
    }
    
    self.loadScripts = function(){
    	window.competenciaValidation.apply();
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
                {data: 'type'},
                {data: 'definicion'}
                
            ],
            columnDefs: [
            	{
            		targets: 3,
            		data: function(data){
            			return '<i class="fa fa-pencil fa-blue pointer" onClick="window.modify('+data.id+')"></i>    <i class="fa fa-close fa-red pointer" onClick="window.destroy('+data.id+')"></i>';
            		}
            	}
            ]
        });
    }
	
	self.getCompeteciasToDataTable();
	



}