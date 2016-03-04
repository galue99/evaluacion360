(function(){
	'use strict';
	$(document).ready(function(){

		var evaluadores = document.getElementById("evaluadores")
		if (evaluadores != null){
			ko.applyBindings(new evaluadoresViewModel(), document.getElementById("evaluadores"));
		}
		var NuevaEncuestas = document.getElementById("NuevaEncuestas")
		if (NuevaEncuestas != null){
			ko.applyBindings(new encuestaViewModel(), document.getElementById("NuevaEncuestas"));
		}

		
	});
})();