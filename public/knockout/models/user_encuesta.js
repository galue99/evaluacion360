function UserEncuesta(){
	var self = this;

	self.AssignUserTest = function(data){
		return $.ajax({
			url: '/admin/users_encuestas',
			dataType: 'JSON',
			method: 'POST',
			data: data,
			contentType: 'application/json',
		});
	};

	self.AllUserTest = function(id){
		return $.ajax({
			url: '/admin/users_encuesta/' + id,
			dataType: 'JSON',
			method: 'GET',
			contentType: 'application/json',
		});
	};

	self.allTestReady = function(){
		return $.ajax({
			url: '/admin/encuestas_ready',
			dataType: 'JSON',
			method: 'GET',
			contentType: 'application/json',
		});
	}

	self.testDetails = function(id){
		return $.ajax({
			url: '/admin/details_answers/' + id,
			dataType: 'JSON',
			method: 'GET',
			contentType: 'application/json',
		});
	}
	
	self.delUserAssigned = function(data){
		return $.ajax({
			url: '/admin/user_encuestas_delete/',
			method: 'POST',
			data: data,
			dataType: 'json',
			headers: {'Content-Type': 'application/x-www-form-urlencoded'},
			contentType: "application/json",
		});
	}

	self.newApiEvaluados = function(id){
        return $.ajax({
            url: '/admin/evaluados/' + id,
            method: 'GET',
            contentType: 'json'
        });
    }
    
    self.printReport = function(data){

        var encuesta_id = data.encuesta_id;
        var evaluado_id = data.evaluado_id;

        var url = '/admin/printReport/' + encuesta_id + '/' + evaluado_id ;
        window.open(url, '_blank');
    /*	return $.ajax({
    		url: '/admin/printReport/' + encuesta_id,
    		method: 'get',
    		contentType: 'json'
    	});*/
    };

    self.printReport1 = function(data){

        var encuesta_id = data.encuesta_id;
        var evaluado_id = data.evaluado_id;

        var url = '/admin/printReport1/' + encuesta_id + '/' + evaluado_id ;
        window.open(url, '_blank');
    /*	return $.ajax({
    		url: '/admin/printReport/' + encuesta_id,
    		method: 'get',
    		contentType: 'json'
    	});*/
    };



}
