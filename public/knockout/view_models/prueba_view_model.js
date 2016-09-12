function PruebaViewModel(){
    var self = this;

    self.apievaluados = function(){
        return $.ajax({
            url: '/admin/evaluados/' + 1,
            method: 'GET',
            contentType: 'json'
        });
    };
    

    self.users = function(){
        return $.ajax({
            url: '/admin/users',
			dataType: 'json',
			method: 'GET',
			contentType: "application/json"
        });
    };
    
    window.hola = function(){
        console.log('hola')
    }

    
    self.getusers = function(){
        self.users()
        .done(function(response){
            $('#dataTable').DataTable().clear().rows.add(response).draw();
        })
    }
    
    self.hola = function(data){
        console.log(data)
    }

    
    self.loadScripts = function(){
        jQuery('#dataTable').dataTable({
            columns: [
                {data: 'firstname'},
                {data: 'lastname'},
                {data: 'email'},
                {data: 'dni'},
                {data: 'position'},
                {data: 'branch_office'},
                {data: 'company.name'},
                {data: 'is_active'},
            ],
            aoColumnDefs: [
                {
                    Data: null,
                    sDefaultContent: '<i class="fa fa-close fa-red pointer" data-bind="hola()"><i>',
                    aTargets: [8]
                }
            ]
            
        });
    }
    
    // self.getusers();






    self.evaluados = ko.observableArray();

    self.getApiEvaluados = function(){
        self.newApiEvaluados()
        .done(function(response){
            var evaluados = response.Evaluados;
            var evaluadores = response.Evaluadores;

            evaluados.map(function(evaluado){
                evaluado.evaluadores = ko.observableArray();
                evaluadores.map(function(evaluador){
                    if (evaluador.user_id == evaluado.id){
                        evaluado.evaluadores.push(evaluador);
                    }
                    return evaluadores;
                })
                return evaluados;
            })
            self.evaluados(evaluados);

            // console.log(ko.toJSON(self.evaluados));
        })
    }
    
    self.modal = function(data){
        console.log(data.evaluadores);
    }

    self.getApiEvaluados();
    
}

function myFunction(){
    var id = $("#img").val();
    swal({title: "¿Estas seguro?",
            text: "que desea eliminar este usuario",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Eliminar",
            closeOnConfirm: true },
        function(){
            console.log(id);
            $.ajax({
                url: '/admin/img/'+ id + '/edit',
                contentType: "application/json",
            })

            window.location.reload();
        });
}