let todos = {

  //MY TODO LIST
  list : [
    "Learn HTML5", 
    "Learn CSS", 
    "Learn JS", 
    "Learn PHP"
  ],

  //DISPLAY TODOS
  displayTodos: function() {
    console.log(this.list);
  },

  //ADD TODO
  addTodo: function(todoText) {
    this.list.push(todoText);
    this.displayTodos();
  },

  //CHANGE TODO
  changeTodo: function(index, text) {
    this.list[index] = text;
    this.displayTodos(); 
  },

  //DELETE TODO
  deleteTodo: function(index) {
    this.list.splice(index, 1);
    this.displayTodos();
  }

}

console.log( todos.list );
todos.addTodo("New todo");







