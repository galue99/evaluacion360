function AdminTestViewModel(){
   var self = this;
   var test = new AdminTest();
   var user = new Evaluadores();
   var assignTest = new UserEncuesta();
   var level = new Level();
   var otherq = new OtherQuestion();
   var competencia = new Competencias();
   var answersDefault = ['Nunca', 'Rara Vez', 'A veces', 'Casi Siempre', 'Siempre'];

   self.competencias = ko.observableArray();
   self.competenciaSelected = ko.observable();
   self.currentCompetencia = ko.observable();
   self.detailsTest = ko.observableArray();
   self.showFormTest = ko.observable(false);
   self.showFormAdminTest = ko.observable(false);
   self.formCompany = ko.observable(false);
   self.assignOtherQ = ko.observable(false);
   self.tests = ko.observableArray();
   self.formData = ko.observable({
      name: ko.observable(),
      items: ko.observableArray()
   });
   
   self.openModalComportamientos = function(){
      if (self.formData().name()){
         self.getCompetencias();
         $('#modalcomportamientos').modal('show');
      }else{
         toastr.warning('Indique un nombre para la encuesta');
      }
   };


   self.assignQuestions = function(){
      self.formData().items.push({
         name: ko.observable(),
         frases: ko.observableArray()
      });

      self.competenciaSelected().comportamiento.forEach(function(compor){
         self.formData().items()[self.formData().items().length-1].name(self.competenciaSelected().name);
         if ( compor.active() ){
            self.formData().items()[self.formData().items().length-1].frases.push({
            name: ko.observable(compor.name),
            answers: ko.observableArray(answersDefault.map(function(answer){
               return {name: ko.observable(answer)}
            }))
            })
         }
      })
   };

   self.getCompetencias = function(){
      competencia.AllCompetenciaComport()
      .done(function(response){

         self.competencias(response.map(function(competencia){
            competencia.comportamiento.map(function(comportamiento){

               comportamiento.active = ko.observable(false);
               return comportamiento;

            });
            return competencia;
         }));
      })
   };

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
         self.assignOtherQ(true);
         self.selectedTestId(response.Success.id);
         self.formDataOtherQ().id_encuesta(self.selectedTestId());
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
   
   self.removeTest = function(data){
      swal({title: "¿Estas seguro?",
			text: "que desea eliminar este usuario",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Eliminar",
			closeOnConfirm: true },
			function(){
				test.destroy(data.id)
				.done(function(response){
				   self.tests.remove(data);
				   toastr.info('La evaluación ha sido eliminada con exito');
				})
				.fail(function(response){				
				   toastr.error('hubo un problema al intentar borrar la encuesta');				   
				
				   
				});
			});
   }
   
   self.toggleModalTestDetails = function(){
      $('#modalDetailsTest').modal('toggle');
   }
   
   self.viewTest = function(data){
      test.ViewDetails(data.id)
      .done(function(response){
         self.toggleModalTestDetails();
         self.detailsTest(response);
      })
   }

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
            name: ko.observable(),
            frases:ko.observableArray()
         }
         );
      }else{
         toastr.warning('Ingrese un nombre de la encuesta');
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
            name: ko.observable()
         })
         
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


   //Obteniendo test para la tabla
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
   self.usersTesters = ko.observable();
   self.evaluadoSelected = ko.observableArray();
   

   

   self.toggleFormAdminTest = function(data){
      self.showAdminTest(!self.showAdminTest());
      self.testSelected(data);
      self.getUserAssignedToTest();
   };

   self.getUserAssignedToTest = function(){
      var first = true;

      assignTest.newApiEvaluados(self.testSelected().id)
      .done(function(response){
         var evaluados = response.Evaluados;
         var evaluadores = response.Evaluadores;

         evaluados.map(function(evaluado){
             evaluado.evaluadores = ko.observableArray();
             evaluadores.map(function(evaluador){
                 if (evaluador.user_id == evaluado.id){
                     evaluado.evaluadores.push(evaluador);
                 }
                 return evaluadores;
             })
             return evaluados;
         })
         self.evaluados(evaluados);
      });
   };

   //Metodo para ver los usuarios evaluados de cada evaluador
   self.evaluadosAssigned = function(data){
      jQuery('#modalevaluadoassigned').modal('show');

      self.evaluadoSelected(data.evaluadores());
   };

   self.getStatusPrettyTest = function(statusId){
      return {'0': 'Inactiva',
              '1': 'Activa'}[statusId];
   };

   self.getStatusPretty = function(statusId){
      return {'0': 'No realizada',
              '1': 'Realizada'}[statusId];
   };

   self.changeStatus = function(data){
      // console.log(data.id)
      test.update(data.id)
      .done(function(response){
         toastr.info('Estado de la encuesta cambiado exitosamente');
         self.getTest();
      })
      .fail(function(response){
         toastr.error('Hubo un problema al cambiar la encuesta');
      })
   }


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
      self.autoEvalAsigned(false);
      self.autoEvalSelected(false);
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
   
   self.autoEvalAsigned = ko.observable(false);
   self.autoEvalSelected = ko.observable(false);
  //Metodo para reasigar los mismos usuarios al array de ofrma actualizada sacando los ya seleccionados
   self.formDataAssignUser().nivel.subscribe(function(value){
      if(value == 5){
         console.log('autoevaluacion');
         self.autoEvalSelected(true);
         self.formDataAssignUser().evaluadores.push(self.formDataAssignUser().id_user());
      }else{
         self.autoEvalSelected(false);
         self.formDataAssignUser().evaluadores([]);
         self.SameUsersCompany(self.SameUsersCompany());
      }
   })

   //Metodo para eliminar el usuario seleccionado en el siguiente select para evitar la seleccion del mismo
   self.formDataAssignUser().id_user.subscribe(function(value){
      self.autoEvalAsigned(false)
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
   self.saveAssignUserTest = function(){
      
      if(self.autoEvalSelected()){
         if(!self.autoEvalAsigned()){
            assignTest.AssignUserTest(ko.toJSON(self.formDataAssignUser()))
            .done(function(response){
               if(self.formDataAssignUser().id_user() == self.formDataAssignUser().evaluadores()[0]){
                  self.autoEvalAsigned(true);
               }else{
                  self.autoEvalAsigned(false);   
                  self.SameUsersCompany().splice(self.formDataAssignUser().id_user, 1);
               }
               self.unSelectNivel();
               toastr.success('La asignacion de la encuesta se ha realizado con exito');
               self.getUserAssignedToTest();
            })
            .fail(function(response){
               toastr.error('Hubo un error al asignar la encuesta al usuario');
            });
         }else{
            toastr.warning("Ya se ha realizado la asignacion de autoevaluacion");
         }
      }else{
         assignTest.AssignUserTest(ko.toJSON(self.formDataAssignUser()))
            .done(function(response){
               self.SameUsersCompany().splice(self.formDataAssignUser().id_user, 1);
               self.unSelectNivel();
               toastr.success('La asignacion de la encuesta se ha realizado con exito');
               self.getUserAssignedToTest();
            })
            .fail(function(response){
               toastr.error('Hubo un error al asignar la encuesta al usuario');
            });
      }
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
      })
   };

   self.getUserToAssign = function(){
      user.allUser()
      .done(function(response){
         response = response.map(function(user){
            user.fullname = user.firstname + ' ' + user.lastname;
            return user;
         })
         self.users(response);
      });
   };
   
   self.removeUserAsigned = function(data){
      var params = {
         evaluador_id: data.id,
         encuesta_id: data.pivot.encuesta_id
      };
      	swal({title: "¿Estas seguro?",
			text: "de eliminar la asignación",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Eliminar",
			closeOnConfirm: true },
			function(){
			assignTest.delUserAssigned(params)
				.done(function(response){
					toastr.info('Asignación eliminada con éxito');
					self.evaluadores.remove(data);
				});
			});
   }
   


   //Administracion de las preguntas Adicionales de la encuesta\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\


   self.showFormOtherQ = ko.observable(false);
   self.othersQuestions = ko.observableArray();
   self.updateOtherQ = ko.observable(false);
   self.selectedTestId = ko.observable();

   self.toggleFormOtherQ = function(){
      self.showFormOtherQ(!self.showFormOtherQ());
   }

   self.openModalOtherQ = function(data){
      $('#modalOtherQuestions').modal('show');
      self.selectedTestId(data.id);
      self.formDataOtherQ().id_encuesta(self.selectedTestId());
      self.getOtherQ();
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

   self.clearQuestion = function(){
      self.formDataOtherQ({
         id_encuesta: ko.observable(self.selectedTestId()),
         question: ko.observable('')
      });
   }

   self.cancelSaveOtherQ = function(){
      self.clearFormOtherQ();
      self.toggleFormOtherQ();
   };


   //Metodo para guardar las otherquestions
   self.saveOtherQ = function(){
      if (!self.updateOtherQ()){
         otherq.create(self.formDataOtherQ())
         .done(function(response){
            toastr.info('Pregunta Adicional guardada exitosamente');
            self.clearQuestion();
            self.toggleFormOtherQ();
            self.getOtherQ();
         })
         .fail(function(response){
            toastr.error('Hubo un error al guardar la pregunta adicional');
            self.formDataOtherQ().id_encuesta(null);
         })
      }else{
         otherq.update(self.selectedTestId(), self.formDataOtherQ())
         .done(function(response){
            toastr.info('Actualizacion de Pregunta adicional exitosa');
            self.updateOtherQ(false);
            self.clearQuestion();
            self.toggleFormOtherQ();
            self.getOtherQ();
         })
         .fail(function(response){
            toastr.error('Hubo un error al guardar la pregunta adicional');
         })
      }
   };

   //Metodo para guardar las preguntas adicionales inmediatamente despues de crear la encuesta
   self.saveAssignOtherQ = function(){
      otherq.create(self.formDataOtherQ())
      .done(function(response){
         toastr.info('Pregunta adicional guardada exitosamente');
            self.clearQuestion();
            self.toggleFormOtherQ();
            self.getOtherQ();
            self.assignOtherQ(false);
      })
      .fail(function(response){
         toastr.error('Hubo un error al guardar la pregunta adicional');
      })
   }

   //Metodo para llamar las othersquestions de cada encuesta
   self.getOtherQ = function(){
      otherq.all(self.selectedTestId())
      .done(function(response){
         self.othersQuestions(response);
      })
      .fail(function(response){
         toastr.error('Hubo un error al obtener las preguntas adicionales de esta encuesta');
      });
   };

   //Metodo para editar el OtherQuestions
   self.editOtherQ = function(data){
      self.formDataOtherQ().id_encuesta(data.id);
      otherq.findOtherQ(data.id)
      .done(function(response){
         self.formDataOtherQ().id_encuesta(response.id);
         self.toggleFormOtherQ();
         self.formDataOtherQ(response);
         self.updateOtherQ(true);
      })
   };

   //Metodo para eliminar las preguntas adicionales
   self.delteOtherQ = function(data){
      otherq.destroy(data.id)
      .done(function(response){
         toastr.info('Other Question removida con exito');
         self.othersQuestions.remove(data);
      });
   }

   










}