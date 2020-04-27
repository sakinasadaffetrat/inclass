/* TODO LIST
-------------------------------*/
let todoList = [
  "Go shopping",
  "Buy tobacco",
  "Do this",
  "Do that"
];

console.log("List in the beggining", todoList);

//ADD EN ELEMENT TO THE ARRAY
todoList.push("Do also that (it's important!)");
console.log("List after push", todoList);

//DELETE FROM ARRAY
todoList.splice(1, 1);
console.log("List after splice", todoList);