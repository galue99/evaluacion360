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

		var AssignUsersTest = document.getElementById("AssignUsersTest")
		if (AssignUsersTest != null){
			ko.applyBindings(new AssignUsersTestViewModel(), document.getElementById("AssignUsersTest"));
		}

		var levels = document.getElementById("levels")
		if (levels != null){
			ko.applyBindings(new LevelsViewModel(), document.getElementById("levels"));
		}
		var listsSurveys = document.getElementById("listsSurveys")
		if (listsSurveys != null){
			ko.applyBindings(new ListsSurveysViewModel(), document.getElementById("listsSurveys"));
		}

		var competencias = document.getElementById("competencias")
		if (competencias != null){
			ko.applyBindings(new CompetenciasViewModel(), document.getElementById("competencias"));
		}

		var comportamientos = document.getElementById("comportamientos")
		if (comportamientos != null){
			ko.applyBindings(new ComportamientosViewModel(), document.getElementById("comportamientos"));
		}
		var adminTest = document.getElementById("adminTest")
		if (comportamientos != null){
			ko.applyBindings(new AdminTestViewModel(), document.getElementById("adminTest"));
		}

	});
})();