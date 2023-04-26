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

//console.log(newTaskList)
//console.log(altro)

if (!(newTaskList.length == 4)) {
    console.log("test addtask fallito");
}

const newTaskNoname = {
    user_id:12,
    due_date:"2023-04-24"
}

try {
    const addTaskNoname = addTask(newTaskNoname,taskList)
    console.log("il test nome vuoto è fallito")
} catch (error) {
    if(!(error.message === "manca il nome della task")){
        console.log("test fallito, non ho errore che mi aspettavo")
    }
    //console.log(error.message)
}

const emptyStringName = {
    name:"",
    user_id:12,
    due_date:"2023-04-24"
}

try {
    const addTaskNoname = addTask(emptyStringName,taskList)
    console.log("il test stringa vuota è fallito")
} catch (error) {
    if(!(error.message === "manca il nome della task")){
        console.log("test fallito, non ho errore che mi aspettavo")
    }
    //console.log(error.message)
}

const spaceStringName = {
    name:"      ",
    user_id:12,
    due_date:"2023-04-24"
}

try {
    const addTaskNoname = addTask(spaceStringName,taskList)
    console.log("il test spazi vuoti è fallito")
} catch (error) {
    if(!(error.message === "manca il nome della task")){
        console.log("test fallito, non ho errore che mi aspettavo")
    }
    //console.log(error.message)
}

const toTrimTask = {
    name:" rinnovare patente     ",
    user_id:12,
    due_date:"2023-04-24"
}


    const addToTrimTask = addTask(toTrimTask,taskList)
    //console.log("il test spazi vuoti è fallito")

    const res = addToTrimTask.find(function(task, index){
        return task.name == toTrimTask.name.trim()
    })
    
    if (res == undefined) {
        console.log("test fallito addtrimtask")
    }
    console.log("sno res", res)
//console.log(addTaskNoname)

// const task_id = 13
// const removedTaskList = removeTask(task_id,newTaskList)
// console.log("--------------------")
// console.log(removedTaskList)

// const updatedTask = {
//     name:"fare i compiti",
//     task_id:12
// }

// const updateTaskList = updateTask(updatedTask,taskList)
// console.log("--------------------")
// console.log(updateTaskList)