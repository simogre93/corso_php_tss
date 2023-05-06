import { useState } from "react";

//cosa succede quando utente scrive
//props arriva dall'esterno del componente
const SearchBar = (props) => {
    
    //useState, restituisce array con due elementi
    //1°, variabile che rappresenta stato iniziale
    //2°, funzione che aggiorna stato
    const [taskName, setTaskName] = useState('')
    const [taskDueDate, setTaskDueDate] = useState('')
    //tutti gestori evento passono evento
    //const cambiaValore = (evento) => { setTaskName(evento.target.value)}
    function onAddTask() {
        const newTask = {
            name:taskName.trim(),
            due_date:taskDueDate,
            done:false
        }
        props.parentAddTask(newTask)
        setTaskName('')
        setTaskDueDate('')
    }
                  
    return (
        // <>
        // <pre>
        //      {taskName}
        //      {taskDueDate}
        // </pre>
        <div className="task_add_search">
                {/* nel value è come fare getelementbyid().value */}
                {/* 1^ cosa da fare assegnare variabile di stato a value */}
                {/* 2^ assegnare onChange */}
                <input type="text" 
                value={taskName}
                // target, che provoca evento
                //value, informazione scritta interno che può cambiare, è dinamico
                onChange={evento => setTaskName(evento.target.value)} 
                className="search" 
                placeholder="Add / Search" 
                />
                <button type="submit"
                        onClick={onAddTask}
                        disabled={!taskName.trim().length>0} 
                        className="add">Add
                </button><br />
                {!taskName.trim().length>0 ? 'devi inserire una task' : ''} 
            <div className="date">
                <label htmlFor="date" className="task_date">Due date</label>
                <input type="date" 
                id="task_date" 
                name="task_date"
                value={taskDueDate}
                onChange={evento => setTaskDueDate(evento.target.value)}
                />
            </div>
        </div>
        //</>
    )
}

export default SearchBar;

//form in react cambia sempre stato, input deve cambiare stato della
//variabile associata, controled form con useState, se cambia una cosa è perchè cambia una variabile
//dati cambiano inrterfaccia e viceversa
//qualunque variazione di stato deve essere gestito da react 