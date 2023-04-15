//... spread operator, prende valori array e li scrive al posto nostro 
//singoli
const primari_additivi = ["rosso", "verde", "blu"]
const primari_sottrattivi = ["ciano", "magenta", "giallo"]


//console.log(...primari_additivi)
//console.log(["rosso", "verde", "blu","ciano", "magenta", "giallo"])
//per sommare array
const tutti_colori_primari = [...primari_additivi, ...primari_sottrattivi]

//console.log(tutti_colori_primari)

const primari_additivi_pink = [...primari_additivi, "rosa"]
//console.log(primari_additivi_pink)

const nuovo = "arancione"
const primari_additivi_pink_orange = [...primari_additivi, "rosa", nuovo]
//console.log(primari_additivi_pink_orange)

//scompone la stringa
const spelling = [..."bnewgjeweonbvojwe"]
//console.log(spelling)

const persona = {
    nome:"mario",
    cognome:"rossi"
}

const persona2 = {...persona,...{"voti":[6,7,8]}}
//modifica persona e persona2
persona2.indirizzo = "via roma 1"
console.log(persona)
console.log(persona2)