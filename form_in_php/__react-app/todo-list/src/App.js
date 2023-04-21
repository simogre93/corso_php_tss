import './App.css';
import { useState } from "react";
import TaskItem from "./components/TaskItem/TakskItem";
import TaskList from "./components/TaskList/TaskList";

function App() {
  
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
  
  const [taskListData, setTaskListData] = useState([])
  
  function aggiungiTask() {
    setTaskListData((attuale)=>{
      attuale.push({   
        task_id: 4,
        user_id: 3,
        name: "andare dal dottore",
        due_date: "2023-04-29",
        done: false
      })
      return attuale;
    });
    //alert("tutto ok");
  }
  //const list = taskListData.map(task => <TaskItem nome_task={task.name} />)
  //console.log(list)
  return (
    
    <main>
      <button onClick={aggiungiTask}>add task</button>
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
