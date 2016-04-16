function AdminTestViewModel(){
   var self = this;
   var test = new AdminTest();
   var user = new Evaluadores();
   var assignTest = new UserEncuesta();
   var level = new Level();
   var otherq = new OtherQuestion();

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

   self.users = ko.observableArray();
   self.SameUsersCompany = ko.observableArray();
   self.levels = ko.observableArray();
   self.evaluados = ko.observableArray();
   self.evaluadores = ko.observableArray();
   self.usersTesters = ko.observable()

   

   self.toggleFormAdminTest = function(data){
      self.showAdminTest(!self.showAdminTest());
      self.testSelected(data);
      self.getUserAssignedToTest();
   };

   self.getUserAssignedToTest = function(){
      var first = true;
      // var evaluados = [];

      assignTest.AllUserTest(self.testSelected().id)
      .done(function(response){
         console.log(response);
         self.usersTesters(response);
         self.getEvaluadoresAssigned();
         // self.users().evaluadores.forEach(function(evaluador){
         //    evaluador.evaluados.forEach(function(evaluado){
         //       evaluados.push(evaluado);
         //    });
         // });
         // self.evaluados(evaluados);
         
      });
   };

   //metodo para listar todos lo evaluadores de la encuesta seleccionada
   self.getEvaluadoresAssigned = function(){
      var evaluadores = [];

      self.usersTesters().evaluadores.forEach(function(evaluador){
            evaluadores = evaluadores.concat(evaluador);
         });
         self.evaluadores(evaluadores);
         console.log(self.evaluadores());
   }

   //Metodo para ver los usuarios evaluados de cada evaluador
   self.evaluadosAssigned = function(data){
      var evaluados = [];
      evaluador = data;
      jQuery('#modalevaluadoassigned').modal('show');

      evaluador.evaluados.forEach(function(evaluado){
         evaluados = evaluados.concat(evaluado);
      })
      self.evaluados(evaluados);
      
   };

   self.getStatusPrettyTest = function(statusId){
      return {'0': 'inactiva',
              '1': 'Activa'}[statusId];
   };

   self.getStatusPretty = function(statusId){
      return {'0': 'No realizada',
              '1': 'Realizada'}[statusId];
   };


//Administracion de las Asginaciones de los evaluadores a las encuestas\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

   self.formDataAssignUser = ko.observable({
      id_encuesta: ko.observable(),
      id_user: ko.observable(),
      nivel: ko.observable(),
      status: 0,
      evaluadores: ko.observableArray()
      
   });

   // Asignacion de usuarios a la encuesta 
   self.ModalAssignUser = function(data){
      $('#modalassignuser').modal('show');
      self.getUserToAssign();
      self.formDataAssignUser().id_encuesta(self.testSelected().id);
   };

   //Metodo para cerrar el modal y cancelar la asignacion
   self.cancelAssign = function(){
      $('#modalassignuser').modal('hide');
      self.clearFormAssignUser();
      self.unSelectNivel();
   };

   //Metodo para limpiar el formulario
   self.clearFormAssignUser = function(){
      self.formDataAssignUser().id_user(null);
   };

   //Metodo para desecleccionar el nivel y uego asignar mas evaluadores
   self.unSelectNivel = function(){
      self.formDataAssignUser().nivel(null);
      self.formDataAssignUser().evaluadores([]);
   };

   //Metodo para reasigar los mismos usuarios al array de ofrma actualizada sacando los ya seleccionados
   self.formDataAssignUser().nivel.subscribe(function(value){
      self.SameUsersCompany(self.SameUsersCompany());
   })

   //Metodo para eliminar el usuario seleccionado en el siguiente select para evitar la seleccion del mismo
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


   //Metodo para Guardar la asignacion de los evaluados a los evaluadores y sus encuestas
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

   //Metodo para cerrar el modal de los usuarios evaluados asignados a un evaluador
   self.ModalHideEvaluadosAssigned = function(){
      jQuery('#modalevaluadoassigned').modal('hide');
   };

   //Metodo para obtener los niveles para la asignacion
   self.getLevels = function(){
      level.all()
      .done(function(response){
         self.levels(response);
         // console.log(response);
      })
   };

   self.getUserToAssign = function(){
      user.allUser()
      .done(function(response){
         self.users(response);
      });
   };


   //Administracion de las preguntas Adicionales de la encuesta\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\


   self.showFormOtherQ = ko.observable(false);
   self.othersQuestions = ko.observableArray();

   self.toggleFormOtherQ = function(){
      self.showFormOtherQ(!self.showFormOtherQ());
   }

   self.openModalOtherQ = function(data){
      $('#modalOtherQuestions').modal('show');
      self.formDataOtherQ().id_encuesta(data.id);
      self.getOtherQ(data);
   }
   self.CloseModalOtherQ = function(){
      $('#modalOtherQuestions').modal('hide');
      self.clearFormOtherQ();
   }

   self.formDataOtherQ = ko.observable({
      id_encuesta: ko.observable(),
      question: ko.observable()
   });

   self.clearFormOtherQ = function(){
      self.formDataOtherQ({
         id_encuesta: ko.observable(),
         question: ko.observable()
      })
   };

   self.cancelSaveOtherQ = function(){
      self.clearFormOtherQ();
      self.toggleFormOtherQ();
   };


   self.saveOtherQ = function(){
      // console.log(ko.toJSON(self.formDataOtherQ()));
      otherq.create(ko.toJSON(self.formDataOtherQ()))
         .done(function(response){
            toastr.info('Pregunta Adicional guardada exitosamente');
            self.clearFormOtherQ();
            self.toggleFormOtherQ();
         })
         .fail(function(response){
            toastr.error('Hubo un error al guardar la pregunta adicional');
            self.clearFormOtherQ();
         })

      // self.clearFormOtherQ();
      // self.toggleFormOtherQ();
   };

   self.getOtherQ = function(data){
      var test_id = data.id;
      self.formDataOtherQ().id_encuesta(test_id);
      otherq.all(self.formDataOtherQ().id_encuesta)
         .done(function(response){
            self.othersQuestions(response);
         })
         .fail(function(response){
            toastr.error('Hubo un error al obtener las preguntas adicionales de esta encuesta');
         });
   };

   










}