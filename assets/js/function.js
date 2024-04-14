// //adding data to the database
// function addITodo(task) {
//     const transaction = db.transaction(["iItems"], "readwrite");
//     const store = transaction.objectStore("iItems");
//
//     const newTodo = { task: task };
//     const addRequest = store.add(newTodo);
//
//     addRequest.onsuccess = function (event) {
//         console.log("todo added successfully");
//     };
//     addRequest.onerror = function (event) {
//         console.error("error adding todo: " + event.target.errorCode);
//     };
// }
// //retrieving data from database
// function getITodo() {
//     const transaction = db.transaction(["iItems"], "readonly");
//     const store = transaction.objectStore("iItems");
//
//     const getAllRequest = store.getAll();
//
//     getAllRequest.onsuccess = function (event) {
//         const todos = event.target.result;
//
//         const todoList = document.getElementById("list1");
//
//         todoList.innerHTML = '';
//
//         todos.forEach(function (todo) {
//             const listItem = document.createElement("lz i");
//             listItem.textContent = todo.task;
//
//             todoList.appendChild(listItem);
//         });
//     };
//     getAllRequest.onerror = function (event) {
//         console.error("Error fetching todos: " + event.target.errorCode);
//     };
// }
// // Updating a todo
// function updateTodo(todoId, newTask) {
//   const transaction = db.transaction(["iItems"], "readwrite");
//   const store = transaction.objectStore("iItems");
//
//   const getRequest = store.get(todoId);
//
//   getRequest.onsuccess = function(event) {
//     const todo = event.target.result;
//     todo.task = newTask;
//
//     const updateRequest = store.put(todo);
//
//     updateRequest.onsuccess = function(event) {
//       console.log("Todo updated successfully!");
//     };
//
//     updateRequest.onerror = function(event) {
//       console.error("Error updating todo: " + event.target.errorCode);
//     };
//   };
// }
//
// // Deleting a todo
// function deleteTodo(todoId) {
//   const transaction = db.transaction(["iItems"], "readwrite");
//   const store = transaction.objectStore("iItems");
//
//   const deleteRequest = store.delete(todoId);
//
//   deleteRequest.onsuccess = function(event) {
//     console.log("Todo deleted successfully!");
//   };
//
//   deleteRequest.onerror = function(event) {
//     console.error("Error deleting todo: " + event.target.errorCode);
//   };
// }
