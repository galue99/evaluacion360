function AssignUsersTestViewModel(){
   var self = this;
   var test = new AdminTest();
   var user = new Evaluadores();

   self.showForm = ko.observable(false);
   self.tests = ko.observableArray();
   self.users = ko.observableArray();
   self.formData = ko.observable({
      user: ko.observable(),
      test: ko.observable(),
      status: ko.observable()
   });

   self.toggleForm = function(){
      self.showForm(!self.showForm());
   };


   self.getTest = function(){
      test.all()
      .done(function(response){
         self.tests(response);
      });
   };

   self.getUsers = function(){
      user.all()
      .done(function(response){
         self.users(response);
         console.log(response);
      });
   }

   self.formData().test.subscribe(function(){
      console.log(self.formData().test());
      self.getUsers();
   });
   self.formData().user.subscribe(function(){
      console.log(self.formData().user());
   });



   self.getTest();

}