// service, parte del programma che fa qualcosa in particolare, logica business

//users.php
const base_url = "http://localhost/corso_php_tss/form_in_php/rest_api"

export function getUser() {
    //fetch per fare chiamate http es6, risposta non è immediata
    //promise, non ha ancora informazioni ma poi arriveranno, per eventi che si verificano in tempi diversi
    const promise = fetch(base_url+"/users.php")
        //eseguita quando arrivano i dati
        //console.log("1 promessa di fetch", promise)
        promise
        .then((response)=>{
            return response.json()  //anche lui restituisce una promessa
            //console.log("2 response", response)
        })
        .then((json) => {
            //dati disponibili
            console.log(json)
            const lista = document.getElementById("lista_utenti")
            //map, restituisce un array
            const elenco = json.map((user) =>{
                //console.log("sono utente", user)
                return "<li>"+user.first_name+"</li>"
            }).join(" ")//join, metodo array per scegliere separatore

            lista.innerHTML = elenco
            console.log(elenco)
        })
        //console.log("3 dopo")
}