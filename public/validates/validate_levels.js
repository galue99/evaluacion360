(function(){
    $("#formLevels").validate({
    rules: {
        name: {
            required: true,
            maxlength: 100,
            minlength: 2,
        }
    },
    messages: {
        name: {
            required: "La descripcion no puede estar vacia",
            maxlength: "No debe pasar de 100 Caracteres",
            minlength: "Minimo de caractes 2"
        }
    }
});
})();



