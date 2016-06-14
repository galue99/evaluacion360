(function(){
    $("#formCompetencia").validate({
    rules: {
        name: {
            required: true,
            maxlength: 100,
            minlength: 2,
        },
        type: {
            required: true,
        },
        description:{
            required: true,
            maxlength: 100,
            minlength: 2,
        }
    },
    messages: {
        name: {
            required: "Competencia no puede estar vacio",
            maxlength: "No debe pasar de 100 Caracteres",
            minlength: "Minimo de caractes 2"
        },
        type: {
            required: "Tipo de competencia requerida"
        },
        description:{
            required: "Descripcion no puede estar vacio",
            maxlength: "No debe pasar de 100 Caracteres",
            minlength: "Minimo de caractes 2"
        }
    }
});
})();



