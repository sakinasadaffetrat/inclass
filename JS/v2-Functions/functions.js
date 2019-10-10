//Age first version. Hard coded, no arguments
// function age() {
//   let birthYear = 1966;
//   let currentYear = 2019;
//   let age = currentYear - birthYear;

//   return age;
// }

//Age second version. One argument (parameter).
// function age(birthYear) {
//   let currentYear = 2019;
//   let age = currentYear - birthYear;

//   return age;
// }
// age(1988);
// age(1956);

//Age third version. Two arguments (parameters).
// function age(birthYear, currentYear) {
//   let age = currentYear - birthYear;
//   return age;
// }

//Age forth version. One argument, one JS native function.
function age(birthYear) {
  let currentYear = new Date().getFullYear(); //2019
  let age = currentYear - birthYear;
  return age;
}

// console.log( age(1966) );
// console.log( age(1982) );
// console.log( age(1976) );
// console.log( age(2000) );

function sayHello(firstName) {
  return "Hi there, " + firstName;
}
// console.log( sayHello("Sorin") );
// console.log( sayHello("Marc") );
// console.log( sayHello("Angus") );

function weekDay(day) {
  return "Todays is " + day;
}

//console.log( weekDay("Tuesday") );


function meteoMsg(city, currentWeather) {
  return "Today in CITY is a " + currentWeather + " day.";
}

console.log( meteoMsg("cloudy") );
console.log( meteoMsg("rainy") );
console.log( meteoMsg("sunny") );
