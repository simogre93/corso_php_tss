import './App.css';
import SearchBar from './components/SearchBar';
import TaskItem from "./components/TaskItem/TakskItem";
import TaskList from "./components/TaskList/TaskList";
import { activeFilter, addTask, removeTask } from './service/TodoService';
import { useState } from "react";

function App() {
  
  const [taskListData, setTaskListData] = useState([]);
  //const taskListData = []
  // const taskListData = [
  //   {
  //     task_id: 1,
  //     user_id: 2,
  //     name: "fare la spesa",
  //     due_date: "2023-04-21",
  //     done: true
  //   },
  //   {
  //     task_id: 4,
  //     user_id: 3,
  //     name: "andare dal dottore",
  //     due_date: "2023-04-29",
  //     done: false
  //   }
  // ]
  
  function parentAddTask(newTask) {
    const newTaskListData = addTask(newTask,taskListData)
    //console.log(newTaskListData)
    setTaskListData(newTaskListData)
  }
  
  function parentRemoveTask(taskId) {
      //console.log("parent"+ taskId)
      const res = removeTask(taskId,taskListData)
      setTaskListData(res)
  }

  function onShowActive(taskListData){
    //chiamo servizio
    //aggiorno stato
    const active = activeFilter(taskListData)
    setTaskListData(active)
  }
  //const list = taskListData.map(task => <TaskItem nome_task={task.name} />)
  //console.log(list)
  return (
    
    <main>
    <div class="container">
      <SearchBar parentAddTask={parentAddTask}></SearchBar>
      <div class="filter">
        {/* <button className="filter_btn" onClick={onShowAll}>All</button> */}
        <button className="filter_btn" onClick={onShowActive}>Active</button>
        {/* <button className="filter_btn" onClick={onShowCompleted}>Completed</button> */}
      </div>
      <TaskList header={'Paolo'} task={taskListData}>
          {/* {list} */}
          {taskListData.map(task => <TaskItem key={task.task_id} 
                                              id={task.task_id} 
                                              done={task.done} 
                                              nome_task={task.name}
                                              parentRemoveTask={parentRemoveTask}
                                              />)}
      </TaskList>
        
      {/* <TaskList header={'Giovanni'} task={taskListData}>
          {taskListData.map(task => <TaskItem key={task.task_id} done={task.done} nome_task={task.name} />)}
      </TaskList> */}
    </div>   
    </main>
  )
}

export default App;
