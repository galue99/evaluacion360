(function(){
	'use strict';
	$(document).ready(function(){

		var evaluadores = document.getElementById("evaluadores")
		if (evaluadores != null){
			ko.applyBindings(new evaluadoresViewModel(), document.getElementById("evaluadores"));
		}

		
	});
})();