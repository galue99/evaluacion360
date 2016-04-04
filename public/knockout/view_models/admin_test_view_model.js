function AdminTestViewModel(){
   var self = this;
   var test = new AdminTest();

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
         console.log(response);
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

}