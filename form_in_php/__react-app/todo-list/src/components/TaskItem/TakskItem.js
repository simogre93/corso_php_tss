import { useState } from "react";
//const {nome_task, done} = props
function TaskItem({nome_task, done, task_id, parentRemoveTask}) {
  const [doneCheckbox,setDoneCheckbox]=useState(done)

  function onRemoveTask() {
    //console.log("Task"+task_id)
    parentRemoveTask(task_id)
  }

  function onUpdateStatus(event) {
    setDoneCheckbox(event.target.checked)
    //done = !doneCheckbox
  }

  return (
    <li className={done ? 'done' : ''}>
      {/* {doneCheckbox ? <h1>FATTO</h1> :  <h1>DA FARE</h1> } */}
        <input type="checkbox" onChange={evento => onUpdateStatus(evento)} checked={doneCheckbox} />
        {done}
        <label htmlFor="task1" className="to_do">{nome_task}</label>
        <button className="edit_btn">edit</button>
        <button className="delete_btn" onClick={onRemoveTask}>X</button>
    </li>
  )
}

export default TaskItem;