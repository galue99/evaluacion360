(function(){
    $("#formEvaluadores").validate({
    rules: {
        firstname: {
            required: true,
            maxlength: 100,
            minlength: 2,
        },
        lastname:{
            required: true,
            maxlength: 200,
            minlength: 2,
        },
        dni:{
            required: true,
            minlength: 2,
            number: true
        },
        email:{
            required: true,
            email: true,
            maxlength: 50,
            minlength: 2,
        },
        password: {
            required: true,
            minlength: 6,
        },
        deparment:{
            required: true,
            maxlength: 50,
            minlength: 2
        },
        position:{
            required: true,
            maxlength: 50,
            minlength: 2
        },
        idroluser:{
            required: true,
        },
        company:{
            required: true,
        },
    },
    messages: {
        firstname: {
            required: "Nombre no puede estar en blanco",
            maxlength: "No debe pasar de 100 Caracteres",
            minlength: "Minimo de caractes 2"
        },
        lastname: {
            required: "Apellido no puede estar en blanco",
            maxlength: "No debe pasar de 50 Caracteres",
            minlength: "Minimo de caractes 2"
        },
         dni:{
            required: "Cedula no puede estar en blanco",
            minlength: "Minimo de caractes 2",
            number: "Solo numeros esta requerido"
        },
        email:{
            required: "El email es obligatorio",
            maxlength: "No debe pasar de 50 Caracteres",
            minlength: "Minimo de caractes 2",
            email: "ingrese un email valido",
        },
        password:{
            required: "Campo contraseña es requerido",
            minlength: "Minimo 6 caractes"
        },
        deparment:{
            required: "El departamento es obligatorio",
            maxlength: "No debe pasar de 50 Caracteres",
            minlength: "Minimo de caractes 2",
        },
        position:{
            required: "Indique la posicion del usuario",
            maxlength: "No debe pasar de 50 Caracteres",
            minlength: "Minimo de caractes 2",
        },
        idroluser:{
            required: "Seleccion el rol del usuario",
        },
        company:{
            required: "Seleccion la empresa para el usuario",
        },
    }
});
})();



