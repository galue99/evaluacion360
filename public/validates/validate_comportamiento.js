(function(){
    $("#formComportamiento").validate({
    rules: {
        name: {
            required: true,
            maxlength: 200,
            minlength: 2,
        },
        competencia:{
            required: true,
        },
    },
    messages: {
        name: {
            required: "Comportamiento no puede estar vacio",
            maxlength: "No debe pasar de 200 Caracteres",
            minlength: "Minimo de caractes 2"
        },
        competencia:{
            required: "Seleccion la competencia",
        },
    }
});
})();



