//GLOBAL SCOPE

//VARIABLES
var aString = "This is a string";
var aNumber = 45; //23.2, -3, 0
var aBoolean = true; //false
var anArray = [];
var anObject = {};
var aFunction = function() {

};


//ARRAYS
var myArray = [
  "String", 
  567, 
  [1,2,3], 
  {}
];
myArray[1]; //1 is the index
myArray.push("dada");
myArray.length; //size of the array

//FUNCTIONS
function addTodo() {
  //whatever code...
  //LOCAL SCOPE
  var bob = 3;
}

var addTodoOther = function() {
  //whatever code...
  //LOCAL SCOPE
  addTodo();

  //console.log(bob);
}
addTodo();
addTodoOther();

//Display name
function nameChandler() {
  console.log("Chandler");
}
//nameChandler();

function nameMark() {
  console.log("Mark");
}
//nameMark();


function name(theName, theAge) {
  console.log("name function: ", theName, "=>", theAge);
}
// name("Mark", 34);
// name("Chandler", 67);
// name("Mary", 22);


//OBJECTS
var car = {

  make: "",
  model: "",
  color: "",

  moreInfo: function(myArg) {
    return car.color;
  }

};

console.log(car.make, car.color);



