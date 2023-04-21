//funzione dentro variabile, function expression
const TaskList = (props) => {
    return (
    //fragment, tag vuoto che fà da contenitore
    <>
        <h3 className="task_list__header">{props.header} {props.task.length}</h3>    
        <ul className="task_list__list">
            {/* children, ha un contenuto al suo interno */}
            {props.children}
        </ul>
    </>
    )
}

export default TaskList;