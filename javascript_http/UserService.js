// service, parte del programma che fa qualcosa in particolare, logica business

//users.php
const base_url = "http://localhost/corso_php_tss/form_in_php/rest_api"

export function getUser() {
    //fetch per fare chiamate http es6, risposta non è immediata
    //promise, non ha ancora informazioni ma poi arriveranno, per eventi che si verificano in tempi diversi
    return fetch(base_url+"/users.php").then(response=>response.json())  
    //anche lui restituisce una promessa
    //console.log("2 response", response)
    //eseguita quando arrivano i dati
    //console.log("1 promessa di fetch", promise)
    //console.log("3 dopo")
}