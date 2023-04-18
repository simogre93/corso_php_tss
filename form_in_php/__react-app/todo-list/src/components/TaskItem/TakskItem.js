const TaskItem = props => {
    return (
    
    <ul className="list">
        <li className="task">
          <input type="checkbox" className="to_do" id="task1" />
          <label for="task1">Fare spesa</label>
          <button className="delete_btn">X</button>
        </li>
    </ul>
    )
}

export default TaskItem;