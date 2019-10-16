//Condition: what to do depending on the weather
// let weather = "snowing"; //sunny, rainy, cloudy, snowing

// if(weather == "sunny") {
//   console.log("Take your sun glasses");
// }
// else if(weather == "rainy") {
//   console.log("Take your umbrella");
// }
// else if(weather == "cloudy") {
//   console.log("Take your jacket");
// }
// else if(weather == "snowing") {
//   console.log("Take your sledge");
// }
// else {
//   console.log("Not clear what I have to do...");
// }

//AGE CONDITIONS
function calculateAge(birthYear) {

  let currentYear = new Date().getFullYear();
  let age = currentYear - birthYear; //2019
  let msg = "";

  if(age < 6) {
    msg = "Drink you milk !";
  }
  else if(age >= 6 && age < 18) {
    msg = "Go to sleep, you have school tomorrow.";
  }
  else if(age >= 18 && age < 40) {
    msg = "Work hard, you can do it !";
  }
  else if(age >= 40 && age <= 65) {
    msg = "You won 1 million dollars !";
  }
  else if(age > 65) {
    msg = "Don't forget to take your pills !";
  }
  else {
    msg = "Let's Party !";
  }

  return "You have " + age + ": " + msg; //You have 53: Let's party !

}

// console.log( calculateAge(1966) ); //53
// console.log( calculateAge(2000) ); //19
// console.log( calculateAge(2016) ); //3
// console.log( calculateAge(2008) ); //11

//OR COMPARISON OPERATOR
// let weather = "rainy";
// if(weather == "rainy" || weather == "cloudy") {
//     console.log("Take your jacket");
// }

//COMPARAISON OPERATORS
/*
==  //=> equality
||  //OR
&&  //AND
>
>=
<
<=
*/


// LOOPS -----------------------------------
let num = 100;

for(let i = 1; i <= num; i++) {
  console.log(i);
}