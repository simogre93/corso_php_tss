//const {nome_task, done} = props
function TaskItem({nome_task, done, task_id, parentRemoveTask}) {

  function onRemoveTask() {
    //console.log("Task"+task_id)
    parentRemoveTask(task_id)
  }

  function onUpdateStatus() {
    console.log(task_id,!done)
  }

  return (
    <li className={done ? 'done' : ''}>
        <input type="checkbox" onChange={onUpdateStatus} checked={done} id="task1" />
        {done}
        <label htmlFor="task1" className="to_do">{nome_task}</label>
        {/* <button className="delete_btn">edit</button> */}
        <button className="delete_btn" onClick={onRemoveTask}>X</button>
    </li>
  )
}

export default TaskItem;