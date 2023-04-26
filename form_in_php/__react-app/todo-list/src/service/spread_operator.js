//copia

const persona = {
    nome:"mario",
    cognome:"rossi"
}

const persona_copy = {...persona}

//console-console.log(persona_copy);

//merge object, simula ereditarietà

const voti = {
    materia:"matematica",
    voti:[3,4,5,6]
}

const studente = {...persona,...voti}

//console.log(studente)

const luigi = {
    nome: "luigi"
}

const luigi_studente = {...persona,...luigi,...voti}
//sostituisce propietà, se le hanno uguali vince chi arriva per ultimo
console.log(luigi_studente)