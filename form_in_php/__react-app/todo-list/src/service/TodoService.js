export const addTask = (newTask,todos) =>{
    //console.log(newTask.name);
    if (newTask.name === undefined || newTask.name.trim() === "") {
        throw new Error("manca il nome della task")
    }
    //1,todos viene trasformata anche fuori da questa funzione
    //2, fare copia, cambiarla e restiruirla
    const todosCopy = new Array(...todos)//si ottiene un copia debole, shallow copy, oggetti poco complicati
    const newTaskCopy = {...newTask,...{name:newTask.name.trim()}}
    newTaskCopy.task_id = (new Date()).getTime()//tra parentesi per usare subito istanza di Date
    //push restituisce nuova lunghezza
    todosCopy.push(newTaskCopy)
    return todosCopy
}

export const removeTask = (task_id, todos) => {
    const todosCopy = new Array(...todos)//anche todos.slice()
    //findindex, restituisce indice di quello che si cerca
    const indexToRemove = todosCopy.findIndex(task=>task.task_id === task_id)
    todosCopy.splice(indexToRemove,1)
    //console.log(indexToRemove)
    return todosCopy
}

export const updateTask = (task_id, todos) => {
    const todosCopy = new Array(...todos)
    const taskToUpdate = todosCopy.map(task => {
        if (task.task_id === task_id) {
            task.done = !task.done 
        }
        return task
    })
    return taskToUpdate
}

export const activeFilter = (todos) => {
    //filter, metodo array, fa anche una copia
    return todos.filter(task => !task.done)
    //return act
}

export const completedFilter = todos => todos.filter(task => task.done)


export const dateFilter = () => {}

//API

const baseUrl = "http://localhost/corso_php_tss/form_in_php/rest_api/task.php"

export const getTaskApi = () => {
    return fetch(baseUrl).then((res)=>res.json())
}

export  const addTaskApi = (newTask) => {
    let headersList = {
        "Accept": "*/*",
        "User-Agent": "Thunder Client (https://www.thunderclient.com)",
        "Content-Type": "application/json"
       }
       
    return fetch(baseUrl, { 
         method: "POST",
         body: JSON.stringify(newTask),
         headers: headersList
       }).then(response=>response.json())
       
    //    let data = response.text();
    //    console.log(data);
}