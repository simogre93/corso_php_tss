import { useState } from "react";

const SearchBar = () => {
    
    //restituisce array con due elementi
    //1°, variabile che rappresenta stato iniziale
    //2°, fubnziona che aggiorna stato
    const [taskName, setTaskName] = useState('')
    const [taskDueDate, setTaskDueDate] = useState('')
    //tutti gestori evento passono evento
    //const cambiaValore = (evento) => { setTaskName(evento.target.value)}
    return (
        // <>
        // <pre>{taskName}</pre>
        // <pre>{taskDueDate}</pre>
        <div className="task_add_search">
                {/* nel value è come fare getelementbyid().value */}
                {/* 1^ cosa da fare assegnare variabile di stato a vlaue */}
                {/* 2^ assegnare onChange */}
                <input type="text" 
                value={taskName}
                onChange={evento => setTaskName(evento.target.value)} 
                className="search" 
                placeholder="Add / Search" 
                />
                <button type="submit" className="add">Add</button>
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
//variabile associata, controled form con useState
//qualunque variazione di stato deve essere gestito da react 