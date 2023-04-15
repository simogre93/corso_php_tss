// service, parte del programma che fa qualcosa in particolare, logica business

const base_url = "http://localhost/corso_php_tss/form_in_php/rest_api"

export async function getUsers() {
    const response = await fetch(base_url+"/users.php")
    const json = await response.json()
    return json//aggiungere .data dopo cambiamenti
}