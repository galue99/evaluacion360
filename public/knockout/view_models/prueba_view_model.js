function PruebaViewModel(){
    var self = this;

    self.evaluados = function(){
        return $.ajax({
            url: '/admin/evaluados/' + 1,
            method: 'GET',
            contentType: 'json'
        });
    };
    
    self.getApiEvaluados = function(){
        self.evaluados()
        .done(function(response){
            console.log(response);
        })
    }
    self.getApiEvaluados();
    

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
    
    self.getusers();

    
}