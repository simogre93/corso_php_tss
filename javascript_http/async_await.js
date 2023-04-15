//codice diverso per promesse, più lineare
const base_url = "http://localhost/corso_php_tss/form_in_php/rest_api";

//async, normalmente funzioni js danno subito risultato con questo no
//restituisce sempre promessa
async function getUsers() {
    //await in attesa della response, risolve promessa
    const response = await fetch(base_url+"/users.php")
    const json = await response.json()

    return json
    //console.log(json)
}

const users = await getUsers()

//altra sintassi
// getUsers().then(data=>{
//     const user = data
// })

console.log(users)
