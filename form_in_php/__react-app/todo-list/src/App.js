import './App.css';
import SearchBar from './components/SearchBar';
import TaskItem from "./components/TaskItem/TakskItem";
import TaskList from "./components/TaskList/TaskList";
import { activeFilter, addTask, addTaskApi, completedFilter, getTaskApi, removeTask, updateTask } from './service/TodoService';
import { useEffect, useState } from "react";

function App() {
  
  

  let taskList  = localStorage.getItem('taskList')
  console.log('tasklist')
  if (taskList == null) {
    taskList = [];
  } else {
    taskList = JSON.parse(taskList)
  }
  //per i dati
  const [taskListData, setTaskListData] = useState([]);
  //per la visualizzazione
  const [filtredTask, setFiltredTask] = useState(taskListData)

  useEffect(()=>{
    getTaskApi().then(json=>{
    setTaskListData(json.data)
  })},[])

  function parentAddTask(newTask) {
    const newTaskListData = addTask(newTask,taskListData)
    //console.log(newTaskListData)
    setTaskListData(newTaskListData)
    setFiltredTask(newTaskListData)
    localStorage.setItem('taskList', JSON.stringify(newTaskListData))
    useEffect(()=>{
      addTaskApi(newTask)
    }, [])
  }
  
  function parentRemoveTask(taskId) {
    //console.log("parent"+ taskId)
    const res = removeTask(taskId,taskListData)
    setTaskListData(res)
    setFiltredTask(res)
    localStorage.setItem('taskList', JSON.stringify(res))
  }

  function parentUpdateTask(taskId) {
    //console.log("parent"+ taskId)
    const res = updateTask(taskId,taskListData)
    setTaskListData(res)
    localStorage.setItem('taskList', JSON.stringify(res))
    //setFiltredTask(res)
  }

  function onShowActive(){
    //chiamo servizio
    //aggiorno stato
    //console.log("sono qui")
    const active = activeFilter(taskListData)
    setFiltredTask(active)
    //console.log(active)
  }

  function onShowCompleted() {
    // chiamo il servizio 
    // aggiorno lo stato
    const completed = completedFilter(taskListData)
    setTaskListData(completed)
    setFiltredTask(completed)
    //console.log(completed)
  } 

  function onShowAll() {
    setFiltredTask(taskListData)
  }

  //const list = taskListData.map(task => <TaskItem nome_task={task.name} />)
  //console.log(list)
  return (
    
    <main>
    <div className="container">
      <SearchBar parentAddTask={parentAddTask}></SearchBar>
      <div className="filter">
        <button className="filter_btn" onClick={onShowAll}>All</button>
        <button className="filter_btn" onClick={onShowActive}>Active</button>
        <button className="filter_btn" onClick={onShowCompleted}>Completed</button>
      </div>
      <TaskList header={'Paolo'} task={taskListData}>
          {/* {list} */}
          {filtredTask.map(task => <TaskItem key={task.task_id} 
                                              id={task.task_id} 
                                              done={task.done} 
                                              nome_task={task.name}
                                              parentRemoveTask={parentRemoveTask}
                                              parentUpdateTask={parentUpdateTask}
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
