function usersList(array_users, element_selector){
    //dati disponibili
    //console.log(json)
    const lista = document.getElementById(element_selector)
    //map, restituisce un array
    const elenco = array_users.map((user) =>{
        //console.log("sono utente", user)
        return "<li>("+user.user_id+")"+user.first_name+" "+user.last_name+"</li>"
    }).join(" ")//join, metodo per scegliere separatore

    lista.innerHTML = elenco
}

//variabile con funzione, function expression
const usersTable = (array_users, element_selector) => {
    //template literal
    const tr_users = array_users.map((user) => {
        return  `<tr>
                    <td>
                        ${user.first_name}
                    </td>
                </tr>`
        }).join("")
    
    
    const html =  `<table>
            <tr>
                <th>
                    Nome
                </th>
            </tr>
            ${tr_users}
            
    </table>` 
    
    document.getElementById(element_selector).innerHTML = html
    
}

export { usersList, usersTable }