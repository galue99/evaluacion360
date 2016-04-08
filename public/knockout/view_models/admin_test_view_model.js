function AdminTestViewModel(){
   var self = this;
   var test = new AdminTest();
   var user = new Evaluadores();
   var assignTest = new UserEncuesta();
   var userdiff = new Miscelaneos();

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
         console.log(response)
         self.tests(response);
      });
   };

   self.save = function(){
     console.log(ko.toJSON(self.formData()));
      test.create(ko.toJSON(self.formData()))
      .done(function(response){
         self.clearFormTest();
         toastr.success('La encuesta ha sido guardada exitosamente');
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
   self.usersAssign = ko.observableArray();
   self.userAssignedTests = ko.observableArray();
   self.RefereeAssign = ko.observableArray();

   self.toggleFormAdminTest = function(data){
      self.showAdminTest(!self.showAdminTest());
      self.testSelected(data);
      self.getUserAssignedToTest();
      // console.log(self.testSelected());
   };

   self.getUserAssignedToTest = function(){
      assignTest.AllUserTest(self.testSelected().id)
      .done(function(response){
         self.userAssignedTests(response);
      });
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

   self.formDataAssignUser = ko.observable({
      id_encuesta: ko.observable(),
      id_user: ko.observable(),
      id_evaluado: ko.observable(),
      status: ko.observable()
   });


   self.saveAssignUserTes = function(){
      if ($('#formAssignUsersTest').valid()){
         assignTest.AssignUserTes(ko.toJSON(self.formDataAssignUser()))
         .done(function(response){
            toastr.success('La asignacion de la encuesta se ha realizado con exito');
            $('#modalassignuser').modal('hide');
            self.clearFormAssignUser();
            self.getUserAssignedToTest();
         })
         .fail(function(response){
            toastr.error('Hubo un error al asignar la encuesta al usuario');
         });
      }else{
         toastr.warning('Primero complete los datos requeridos');
      }
   };


   self.clearFormAssignUser = function(){
      self.formDataAssignUser({
         id_encuesta: ko.observable(),
         id_user: ko.observable(),
         id_evaluado: ko.observable(),
         status: ko.observable()
      });
   };

   self.getUserToAssign = function(){
      user.allUser()
      .done(function(response){
         self.usersAssign(response);
      });
   };

   self.cancelAssign = function(){
      $('#modalassignuser').modal('hide');
      self.clearFormAssignUser();
   };

   self.formDataAssignUser().id_user.subscribe(function(){
      console.log(self.formDataAssignUser().id_user())
      userdiff.diferentUser(self.formDataAssignUser().id_user())
      .done(function(response){
         self.RefereeAssign(response);
         console.log(response);
      })
      .fail(function(response){
         toastr.error('Hubo un error al consultar el resto de usuarios');
         $('#modalassignuser').modal('hide');
         self.clearFormAssignUser();
      })
   });













}