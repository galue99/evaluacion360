function PruebaViewModel(){
    var self = this;
    
    
    self.all = function(){
        return $.ajax({
            url: '/admin/evaluados/' + 1,
            method: 'GET',
            contentType: 'json'
        });
    };
    
    self.evaluadores = ko.observableArray();
    self.evaluados = ko.observableArray();
    
    self.getAll = function(){
        self.all()
        .done(function(response){
            console.log(response);
            // self.evaluadores(response.User.user);
            // self.evaluados(response.Evaluado)
            // console.log(self.evaluadores());
            // console.log(self.evaluados());
        })
    }
    
    self.getAll();
    
}