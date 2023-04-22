import './App.css';
import SearchBar from './components/SearchBar';
//import { useState } from "react";
import TaskItem from "./components/TaskItem/TakskItem";
import TaskList from "./components/TaskList/TaskList";

function App() {
  
  const taskListData = []
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
  
  
  
  //const list = taskListData.map(task => <TaskItem nome_task={task.name} />)
  //console.log(list)
  return (
    
    <main>
      <SearchBar></SearchBar>
      {/* <button onClick={aggiungiTask}>add task</button> */}
      <TaskList header={'Paolo'} task={taskListData}>
        {/* {list} */}
        
        {
          taskListData.map(task => <TaskItem key={task.task_id} done={task.done} nome_task={task.name} />)
        }
        </TaskList>
        
        <TaskList header={'Giovanni'} task={taskListData}>
        
        {
          taskListData.map(task => <TaskItem key={task.task_id} done={task.done} nome_task={task.name} />)
        }
        </TaskList>
    </main>
  )
}

export default App;
