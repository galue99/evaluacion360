(function(){
	$("#formAssignUsersTest").validate({
    rules: {
        user: {
            required: true,
        },
        evaluado:{
            required: true,
        }
    },
    messages: {
        user: {
            required: "Usuario es requerido",
        },
        evaluado: {
            required: "El usuario a evaluar es requerido",
        },
    }
});
})();



