//js le passa tutte per riferimento
const a = [1,2,3]

//const b = a //punta la stessa zona di memoria quindi uno cambia automaticamente l'altro, per riferimento

//con ... li separa e crea un nuovo array
//shallow copy
const b = [...a] 

// let c = "mario"
// d = c
// d="luigi"
// console.log(c,d)

b.push("z")

console.log(a)
console.log(b)


