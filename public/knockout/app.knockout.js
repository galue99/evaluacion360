(function(){
	'use strict';
	$(document).ready(function(){

		var evaluadores = document.getElementById("evaluadores")
		if (evaluadores != null){
			ko.applyBindings(new EvaluadoresViewModel(), document.getElementById("evaluadores"));
		}

		var NuevaEncuestas = document.getElementById("NewTest")
		if (NuevaEncuestas != null){
			ko.applyBindings(new testViewModel(), document.getElementById("NewTest"));
		}

    var crudTest = document.getElementById("crudTest")
		if (crudTest != null){
			ko.applyBindings(new AdminTestViewModel(), document.getElementById("crudTest"));
		}

		var company = document.getElementById("company")
		if (company != null){
			ko.applyBindings(new CompanyViewModel(), document.getElementById("company"));
		}


	});
})();