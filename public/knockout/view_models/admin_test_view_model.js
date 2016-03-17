function AdminTest(){
 var self = this;
 self.textValue = ko.observable(''); 

function CourseViewModel(){
   
}

function CeremonyViewModel() {
    var self = this;
    
    self.cources = ko.observableArray([new CourseViewModel()]);
    
    self.addCourse = function(){
        self.cources.push(new CourseViewModel());
    };
}

ko.applyBindings(new CeremonyViewModel());


};