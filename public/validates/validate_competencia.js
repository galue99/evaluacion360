(function(){
    $("#formCompetencia").validate({
    rules: {
        name: {
            required: true,
            maxlength: 100,
            minlength: 2,
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
        description:{
            required: "Descripcion no puede estar vacio",
            maxlength: "No debe pasar de 100 Caracteres",
            minlength: "Minimo de caractes 2"
        }
    }
});
})();



