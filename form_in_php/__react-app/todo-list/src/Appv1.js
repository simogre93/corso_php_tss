import logo from './logo.svg';
import './App.css';
import CardBase from './components/CardBase';

function App() {
  const bookList = [
    {
      titolo:"A volte ritorno",
      autore:"J. Niven"
    },
    {
      titolo:"Dune",
      autore:"F. Herbert"
    },
    // {
    //   titolo:"Dune"
    // },
    //se ripetuto dà errore
    {
      titolo:"1Q84",
      autore:"H. Murakami"
    }
  ]
  //trasformo le informazioni in componenti
  const cardList = bookList.map((book, key) => <CardBase key={key} testo={book.autore} titolo={book.titolo}/>)

  return (
    <section>
      <div className="App">
        {cardList}
      </div>
      <hr />
      <div className="App">
        {bookList.map(book => <CardBase key={book.titolo} testo={book.autore} titolo={book.titolo}/>)}
      </div>
    </section>
  );
}

export default App;
