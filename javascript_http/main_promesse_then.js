//come require in php
//nelle graffe si possono importare più funzioni, anche le variabili
import { getUser } from "./UserService.js";
import { usersList, usersTable } from "./RenderView.js";
// restituisce promessa
getUser()
.then(json => {
    usersList(json, "lista_utenti")
})

const user_locale = [
    {
        "first_name": "Amedeo",
        "last_name": "Verdi",
        "birthday": "2017-03-17",
        "birth_city": "sfdsf",
        "regione_id": 16,
        "provincia_id": 15,
        "gender": "M",
        "username": "giuseppe@xcvxc",
        "password": "a3ea3259dd51c5d28ac011a8dbf78e79",
        "user_id": 15
    },
   
    {
        "first_name": "Ranuncolo",
        "last_name": "Rivola",
        "birthday": "1999-03-01",
        "birth_city": "sdfdsfs",
        "regione_id": 18,
        "provincia_id": 17,
        "gender": "M",
        "username": "a@b.it",
        "password": "a3ea3259dd51c5d28ac011a8dbf78e79",
        "user_id": 21
    }
]

usersTable(user_locale, "lista_utenti_2")
// getUser().then((json)=>{
//     alert (json[0])
// })
;