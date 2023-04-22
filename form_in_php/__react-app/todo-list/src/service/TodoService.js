export const addTask = (newTask,todos) =>{
    //1,todos viene trasformata anche fuori da questa funzione
    //2, fare copia, cambiarla e restiruirla
    const todosCopy = new Array(...todos)//si ottiene un copia debole, shallow copy, oggetti poco complicati
    const newTaskCopy = {...newTask}
    newTaskCopy.task_id = (new Date).getTime()
    //push restituisce nuova lunghezza
    todosCopy.push(newTaskCopy)
    return todosCopy
}

export const removeTask = (task_id, todos) => {
    const todosCopy = new Array(...todos)//anche todos.slice()
    //findindex, restituisce indice di quello che si cerca
    const indexToRemove = todosCopy.findIndex(task=>task.task_id == task_id)
    todosCopy.splice(indexToRemove,1)
    //console.log(indexToRemove)
    return todosCopy
}

export const updateTask = (taskToUpdate, todos) => {
    const todosCopy = new Array(...todos)
    return todosCopy.map(task => {
        if (task.task_id === taskToUpdate.task_id) {
            return {...task,...taskToUpdate}//si aggiorna
        }
        return task
    })
}

export const activeFilter = (todos) => {
    //filter, metodo array
    return todos.filter(task => !task.done)
}

export const completedFilter = todos => todos.filter(task => task.done)


export const dateFilter = () => {}
