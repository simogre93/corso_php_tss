//estrarre valori da oggetto con chiavi di riferimento
const task = {
    "name":"comprare il latte",
    "due_date":"2023-04-25",
    "done":true
}

const frase = `ricordati che il  ${task.due_date} devi ${task.name}` 

// const {name, due_date} = task;

// //senza usare la sintassi con .
// const frase2 = `ricordati che il  ${due_date} devi ${name}` 

// console.log(frase)
// console.log(frase2)

function fraseFun({name, due_date}) {
    const frase2 = `ricordati che il  ${due_date} devi ${name}`
    console.log(frase2)
}

//gli passo l'oggetto ma prende solo quello che ha destrutturato prima
fraseFun(task)