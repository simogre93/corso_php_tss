//const {nome_task, done} = props
function TaskItem({nome_task, done}) {
    return (
      <li className={done ? 'done' : ''}>
          <input type="checkbox" checked={done} id="task1" />
          {done}
          <label htmlFor="task1" className="to_do">{nome_task}</label>
          <button className="delete_btn">X</button>
      </li>
    )
}

export default TaskItem;