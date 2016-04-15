function AdminTestViewModel(){
   var self = this;
   var test = new AdminTest();
   var user = new Evaluadores();
   var assignTest = new UserEncuesta();
   var userdiff = new Miscelaneos();
   var level = new Level();

   self.showFormTest = ko.observable(false);
   self.showFormAdminTest = ko.observable(false);
   self.formCompany = ko.observable(false);
   self.tests = ko.observableArray();
   self.formData = ko.observable({
      name: ko.observable(),
      items: ko.observableArray()
   });

   self.toggleForm = function(){
      self.showFormTest(!self.showFormTest());
   };

   self.toggleAdmin = function(){
      self.showFormAdminTest(!self.showFormAdminTest());
   };

   self.toggleformCompany = function(){
      self.formCompany(!self.formCompany());
   };

   self.getTest = function(){
      test.all()
      .done(function(response){
         self.tests(response);
      });
   };

   self.save = function(){
      test.create(ko.toJSON(self.formData()))
      .done(function(response){
         self.clearFormTest();
         self.getTest();
         swal({
          title: "La encuesta ha sido guardada",
          text: "Quiere agregar alguna pregunta adicional?",
          type: "success",
          confirmButtonColor: "#A5DC86",
          confirmButtonText: "Continuar",
          showCancelButton: true,
          closeOnConfirm: true },
             function(){
              $('#modalOtherQuestions').modal('show');
        });
      })
      .fail(function(response){
         toastr.error('Ha ocurrido un error al guardar la encuesta');
      });
   };

   self.clearFormTest = function(){
      self.formData({
         name: ko.observable(),
         items: ko.observableArray()
      });
      self.toggleForm();
   };

   self.showModal = function(data){
      jQuery('#myModal').modal('show');
   }

   self.addItems = function(){
      if (self.formData().name()){
         self.formData().items.push({
            frases:ko.observableArray()
         }
         );
      }else{
         toastr.warning('Ingrese el nombre de la encuesta');
         jQuery('#nameTest').focus();
      };
   };

   self.addFrase = function(data){
      data.frases.push({
         name: ko.observable(), answers: ko.observableArray()
      });
   };

   self.addAnswers = function(data){

      if (!data.name()){
         toastr.warning('Introduzca el nombre de la pregunta');
      }else{
         data.answers.push({
            name: ko.observable(),
         });
      }

   };


   self.delItem = function(data){
      self.formData().items.splice(self.formData().items.indexOf(data),1);
   };

   self.delFrase = function(items,frases){
      items.frases.splice(items.frases.indexOf(frases),1);
   };

   self.delAnswer = function(frase,answer){
      frase.answers.splice(frase.answers.indexOf(answer),1);
   };



   self.getTest();


       /////////////////////////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
      //////////////////////////////////////////ADMINISTRACION DE LA ENCUESTA\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
      //////////////////////////////////////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

   self.showAdminTest = ko.observable(false);
   self.testSelected = ko.observable();

   //Primer box
   self.users = ko.observableArray();
   self.SameUsersCompany = ko.observableArray();
   self.userAssignedTests = ko.observableArray();
   self.RefereeAssign = ko.observableArray();
   self.UserEvaluadosAssigned = ko.observableArray();
   self.levels = ko.observableArray();
   // self.evaluados = ko.mapping.fromJS([]);

   self.toggleFormAdminTest = function(data){
      self.showAdminTest(!self.showAdminTest());
      self.testSelected(data);
      self.getUserAssignedToTest();
   };

   self.getUserAssignedToTest = function(){
      assignTest.AllUserTest(self.testSelected().id)
      .done(function(response){
         console.log(response);
         // self.userAssignedTests(response.Success.evaluadores);
         // self.UserEvaluadosAssigned(response.Success.evaluado);
      });
   };

   self.getStatusPrettyTest = function(statusId){
      return {'0': 'inactiva',
              '1': 'Activa'}[statusId];
   };

   self.getStatusPretty = function(statusId){
      return {'0': 'No realizada',
              '1': 'Realizada'}[statusId];
   };

   // Asignacion de usuarios a la encuesta 
   self.ModalAssignUser = function(data){
      $('#modalassignuser').modal('show');
      self.getUserToAssign();
      self.formDataAssignUser().id_encuesta(self.testSelected().id);
   };

   self.cancelAssign = function(){
      $('#modalassignuser').modal('hide');
      self.clearFormAssignUser();
   };

   self.formDataAssignUser = ko.observable({
      id_encuesta: ko.observable(),
      id_user: ko.observable(),
      nivel: ko.observable(),
      status: 0,
      evaluadores: ko.observableArray()
      
   });

   self.clearFormAssignUser = function(){
      self.formDataAssignUser().id_user(null);
   };

   self.unSelectNivel = function(){
      self.formDataAssignUser().nivel(null);
      self.formDataAssignUser().evaluadores([]);
   };

   self.formDataAssignUser().nivel.subscribe(function(value){
      self.SameUsersCompany(self.SameUsersCompany());
   })

   //Funcion para eliminar el usuario seleccionado en el siguiente select para evitar la seleccion del mismo
   self.formDataAssignUser().id_user.subscribe(function(value){
      self.getLevels();
      var company_id = null;
      if (value){
         var newUsers = self.users().filter(function(user){
            if (user.id == value){
             company_id = user.company_id
          }
          return  user.id != value;
       });
      var usuariosCompany = newUsers.filter(function(user){
            return user.company_id == company_id
         });
      }
      self.SameUsersCompany(usuariosCompany);
   });

   //Guardar la asignacion de los evaluados a los evaluadores y sus encuestas
   self.saveAssignUserTest = function(value){
      console.log(ko.toJSON(self.formDataAssignUser()));
      assignTest.AssignUserTest(ko.toJSON(self.formDataAssignUser()))
      .done(function(response){
         self.SameUsersCompany().splice(self.formDataAssignUser().id_user, 1);
         self.unSelectNivel();
         toastr.success('La asignacion de la encuesta se ha realizado con exito');
         // self.clearFormAssignUser();
         self.getUserAssignedToTest();
      })
      .fail(function(response){
         toastr.error('Hubo un error al asignar la encuesta al usuario');
      });
   };
   self.delItem = function(data){
      self.formData().items.splice(self.formData().items.indexOf(data),1);
   };

   self.evaluadosAssigned = function(data){
      var evaluado = data.evaluado_id;
      jQuery('#modalevaluadoassigned').modal('show');
      // console.log(data.evaluado_id);
      self.UserEvaluadosAssigned().forEach(function(evaluados){
         if (evaluados.id == evaluado) {
            // console.log(evaluados);
         }
      });
   };

   self.ModalHideEvaluadosAssigned = function(){
      jQuery('#modalevaluadoassigned').modal('hide');
   };

   //Funcion para listar todos los usuarios dentro de los select para la asignacion de la encuesta y el evaluador
   self.getUserToAssign = function(){
      user.allUser()
      .done(function(response){
         self.users(response);
      });
   };

   self.getLevels = function(){
      level.all()
      .done(function(response){
         self.levels(response);
         // console.log(response);
      })
   };


   //Administracion de las preguntas Adicionales de la encuesta\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
   self.showFormOtherQ = ko.observable(false);

   self.toggleFormOtherQ = function(){
      self.showFormOtherQ(!self.showFormOtherQ());
   }

   self.openModalOtherQ = function(data){
      $('#modalOtherQuestions').modal('show');
      self.formDataOtherQ().id_encuesta(data.id);
   }

   self.formDataOtherQ = ko.observable({
      id_encuesta: ko.observable(),
      question: ko.observable()
   });

   self.clearFormOtherQ = function(){
      self.formDataOtherQ({
         id_encuesta: ko.observable(1),
         question: ko.observable()
      })
   }

   self.saveOtherQ = function(){
      console.log(ko.toJSON(self.formDataOtherQ()));
      self.clearFormOtherQ();
      self.toggleFormOtherQ();
   };










}