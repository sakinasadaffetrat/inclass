/* COMMENTS
------------------------------------*/
//This is a single line comment
/* 
This is a block
comment
---------------------------
*/




/* VARIABLES
------------------------------------*/
/* NAMING RULES
---------------------*/
//1. No spaces
//2. You cannot start with numbers
//3. You cannot use dashes or mathematical operators
//4. You cannot use "reserved keywords"
let str = "My name is bob ?";
const num = 9;
var good = false;


/* NAMING BEST PRACTICES
 → camel case !
---------------------*/
let my_name = "Sorin";
let myName = "Bob"; //camel case
let someHeadsAreGonnaRoll = "Judas Priest song";
let some_heads_are_gonna_roll = "Judas Priest song";

/* JS IS CASE SENSITIVE
---------------------*/
let name = "Sorin";
// not the same as this :
let Name = "Sorin";

/* A VAR. IT'S CONTAINER
 * It can contain EVERYTHING
---------------------*/
let number = (9 + 9) - (3*5); //numbers
let text = "Bla bla"; //strings
let cond = true; //booleans
let data = [1,2,3,"Bob"]; //array
let object = {
  name: "John",
  age: 23
};




/* STRINGS
------------------------------------*/
let str1 = "I'm 18 years of age.";
let str2 = 'I\'m 18 years of age.'; //escape character

//In JS we concatenate with + sign
let str3 = "I'm " + 35;

let person = "Bob";
let age = 32;
let phrase = name + " is " + age + " years old"; //Bob is 32 years old

// console.log(phrase);
//NATIVE STRING METHODS
let txt       = "Apple 'is' red";
let txtLength = txt.length; //console.log(txtLength);

let txt2      = "Beatles"; //console.log(txt2.split(""));
let txt3      = "Powercoders"; //console.log( txt3.substr(5, 2) );




/* NUMBERS
------------------------------------*/
let integer   = 92; //integer
let negative  = -92; // negative
let float     = 1.5; //float
let calculate = 8 + 2; //console.log(calculate);
let calc2     = 2 + 3 * 10; //32
let calc3     = (2 + 3) * 10; //50
let calc4     = -2 + (-2); //console.log(calc4);

//NATIVE NUMBER METHODS
let rand        = Math.random() * 10; //console.log(rand);
let randInt     = Math.round(rand); //console.log(randInt);
let roundCeil   = Math.ceil(1.25987456); //console.log(roundCeil);
let roundFloor  = Math.floor(1.2); //console.log(roundFloor);



/* ARRAY (LISTS)
------------------------------------*/
let arr1  = [1,2,3,4,5]; //console.log(arr1);
let arr2  = ["Sorin", "Jane", "Tarzan"]; //console.log(arr2);
//console.log( "Numbers array:", arr1[2] ); //3
//console.log( arr2[2] ); //Tarzan

//NATIVE ARRAY METHODS
//Add to the array
arr2.push("Bob"); //console.log(arr2);
// console.log( arr2.length );

//Delete from the array
//arr2.pop(); console.log(arr2); //last element
//arr2.shift(); console.log(arr2); //first element
arr2.splice(1, 2); //console.log(arr2);

//Change a value inside an array
arr2[0] = 52; //console.log(arr2);



/* FUNCTIONS
------------------------------------*/
function calculateAge(name, birthYear) {

  let date = new Date();
  let currentYear = date.getFullYear(); //console.log(currentYear);
  let age = currentYear - birthYear;

  return name + " is " + age + " years old!";

}
console.log( calculateAge("Bob", 1974) );
console.log( calculateAge("Sorin", 1966) );
console.log( calculateAge("Marc", 1985) );