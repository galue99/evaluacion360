function AssignUsersTestViewModel(){
   var self = this;
   var test = new AdminTest();
   var user = new Evaluadores();
   var assignTest = new UserEncuesta();

   self.showForm = ko.observable(false);
   self.tests = ko.observableArray();
   self.users = ko.observableArray();
   self.userTests = ko.observableArray();
   self.formData = ko.observable({
      test: ko.observable(),
      user: ko.observable(),
      status: ko.observable()
   });

   self.clearForm = function(){
      self.formData({
         test: ko.observable(),
         user: ko.observable(),
         status: ko.observable()
      });
   }

   self.toggleForm = function(){
      self.showForm(!self.showForm());
   };

   self.save = function(){
      assignTest.AssignUserTes(ko.toJSON(self.formData()))
      .done(function(response){
         toastr.success('La asignacion de la encuesta se ha realizado con exito');
         self.toggleForm();
         self.clearForm();
         self.getUserTests();
         console.log(ko.toJSON(self.formData()));
      })
      .fail(function(response){
         toastr.error('Hubo un error al asignar la encuesta al usuario');
      });
   };

   self.newAssing = function(){
      self.toggleForm();
      self.getTest();
   };

   self.getTest = function(){
      test.all()
      .done(function(response){
         self.tests(response);
      });
   };

   self.getUsers = function(){
      user.allUser()
      .done(function(response){
         self.users(response);
      });
   };

   self.getUserTests = function(){
      assignTest.AllUserTest()
      .done(function(response){
         self.userTests(response);
      });
   }


   self.formData().test.subscribe(function(){
      self.getUsers();
   });


   self.getUserTests();


}