/**
 * TODO LIST OBJECT
 * Methods to manage the todo list
 */
var todoList = {


  /* MY TODOS ARRAY
  --------------------------------------*/
  todos: [
    {
      textTodo: "First",
      completed: true
    },
    {
      textTodo: "Second",
      completed: false
    },
    {
      textTodo: "Third",
      completed: false
    },
    {
      textTodo: "Forth",
      completed: true
    }
  ],


  /* ADD TODO
  --------------------------------------*/
  addTodo: function (text) {
    this.todos.push({
      textTodo: text,
      completed: false
    });
  },


  /* CHANGE TODO
    --------------------------------------*/
  changeTodo: function (index, text) {
    this.todos[index].textTodo = text;
  },


  /* DELETE TODO
  --------------------------------------*/
  deleteTodo: function (index) {
    this.todos.splice(index, 1);
  },


  /* TOGGLE COMPLETED KEY VALUE OF AN ITEM
  --------------------------------------*/
  toggleCompleted: function(index) {
    let item = this.todos[index];
    item.completed = ! item.completed;
  },


  /* TOGGLE ALL ITEMS
  --------------------------------------*/
  toggleAll: function () {

		var totalTodos = this.todos.length;
		var completedTodos = 0;

		// Get the number of completed todos
		for (var i = 0; i < totalTodos; i++) {
			if (this.todos[i].completed === true) {
				completedTodos++;
			}
		}

		// If everything is true, make everything false.
		if (completedTodos === totalTodos) {
			for (var i = 0; i < totalTodos; i++) {
				this.todos[i].completed = false;
			}
		}

		// Otherwise make everthing true.
		else {
			for (var i = 0; i < totalTodos; i++) {
				this.todos[i].completed = true;
			}
		}


	} //End toggleAll() method


};


/**
 * HANDLERS OBJECT
 * Methods to handle the DOM EVENTS
 */
var handlers = {

  addTodo: function() {
    var addTodoInput = document.getElementById("addTodoInput");
    todoList.addTodo(addTodoInput.value);

    addTodoInput.value = '';

    view.displayTodos();
  },

  changeTodo: function() {
    var changeTodoIndexInput = document.getElementById("changeTodoIndexInput");
    var changeTodoInput = document.getElementById("changeTodoInput");

    todoList.changeTodo(
      changeTodoIndexInput.valueAsNumber, 
      changeTodoInput.value
    );

    changeTodoIndexInput.value = '';
    changeTodoInput.value = '';

    view.displayTodos();
  },

  deleteTodo: function() {
    var deleteTodoIndexInput = document.getElementById("deleteTodoIndexInput");

    todoList.deleteTodo(deleteTodoIndexInput.valueAsNumber);

    deleteTodoIndexInput.value = '';

    view.displayTodos();
  },

  toggleCompleted: function() {
    var toggleTodoIndexInput = document.getElementById("toggleTodoIndexInput");

    todoList.toggleCompleted(toggleTodoIndexInput.valueAsNumber);

    view.displayTodos();
  }

};


/**
 * VIEW OBJECT
 * Methods to VIEW THE DOM ELEMENTS
 */
var view = {

  displayTodos: function() {

    const todoUL = document.querySelector("ul");
    todoUL.innerHTML = '';

    //START LOOP
    for(let i = 0; i < todoList.todos.length; i++) {

      //TODO item
      let todo = todoList.todos[i];

      //Completed string
      let x = '( ) ';

      if(todo.completed === true) {
        x = '(x) ';
      }

      //Put together completed state and the text
      let displayTodoItem = x + todo.textTodo;

      //CREATE LI ELEMENT
      let todoLi = document.createElement('li');
      todoLi.textContent = displayTodoItem;

      //APPEND THE LI TO THE UL LIST
      todoUL.appendChild(todoLi);

    } //END LOOP

  }

};

view.displayTodos();



