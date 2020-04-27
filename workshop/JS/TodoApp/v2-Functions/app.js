/* TODO LIST - Global scope
-------------------------------*/
let todoList = [
  "Go shopping",
  "Buy tobacco",
  "Do this",
  "Do that"
];



/* DISPLAY TODOS
-------------------------------*/
function displayTodos() {

  console.log(todoList);

}
displayTodos();



/* ADD TODO
-------------------------------*/
function addTodo(index, text) {

  todoList.push(text);
  //todoList.splice(index, 0, text);
  displayTodos();

}
addTodo(2, "My new todo");



/* CHANGE A TODO
-------------------------------*/
function changeTodo(index, text) {

  todoList[index] = text;
  //todoList.splice(index, 1, text);
  displayTodos();

}
changeTodo(1, "Buy cars");
changeTodo(3, "Bob is great!");



/* DELETE A TODO
-------------------------------*/
function deleteTodo(index, numberToDelete = 1) {

  todoList.splice(index, numberToDelete);
  displayTodos();

}
deleteTodo(1, 2);
