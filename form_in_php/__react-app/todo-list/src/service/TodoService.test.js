//npm init -y per creare modulo
import { activeFilter, addTask, completedFilter, removeTask, updateTask } from "./TodoService.js";
//const user_id = 12
const taskList = [
    {   
        task_id:12,
        user_id:12,
        name:"comprare il latte",
        due_date:"2023-04-22",
        done: true
    },
    {   
        task_id:13,
        user_id:12,
        name:"comprare il caffè",
        due_date:"2023-04-22",
        done: true
    },
    {   
        task_id:14,
        user_id:12,
        name:"comprare il cioccolato",
        due_date:"2023-04-25",
        done: false
    }    
]

const activeTaskList = activeFilter(taskList)

//console.log(activeTaskList)

if (!(activeTaskList.length == 1)) {
    console.log("test activetask fallito");
}

const completedTaskList = completedFilter(taskList)

//console.log(completedTaskList)

if (!(completedTaskList.length == 2)) {
    console.log("test completedtask fallito");
}

const newTask = {
    name:"fare la lavatrice",
    user_id:12,
    due_date:"2023-04-24"
}

//const altro = taskList;
const newTaskList = addTask(newTask,taskList)

console.log(newTaskList)
//console.log(altro)

if (!(newTaskList.length == 4)) {
    console.log("test addtask fallito");
}

const task_id = 13
const removedTaskList = removeTask(task_id,newTaskList)
console.log("--------------------")
console.log(removedTaskList)

const updatedTask = {
    name:"nuovo nome",
    task_id:12
}
const updateTaskList = updateTask(updatedTask,taskList)
console.log("--------------------")
console.log(updateTaskList)