//restituisce un pezzo di interfaccia
//diventerà un tag nuovo
//props, rappresenta informazioni passate dentro componente, come costruttore classe
//{} frammento di javascript
//passo valori destruttorati come argomenti ({})
function CardBase({titolo, testo}) {
    //console.log(props.titolo)
    //const {titolo, testo} = props;
    return (
        //elemento che contiene tutto, componenti devono avere contenitore
        <div>
            {/* incapsulamento */}
            <h3>{titolo}</h3>
            <p>{testo}</p>
        </div>
    );
}

export default CardBase;