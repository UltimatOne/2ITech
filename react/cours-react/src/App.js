import './App.css';
import AgeCounter from './components/AgeCounter';
import Personnes from './components/Personnes';
import Vehicle from './components/Vehicle';
import calc from './services/calc';

export default function App() {

  // Exemple d'import de fonction
  console.log(calc(5, 5))

  const props = {
    name: "JJG",
    marque: "Peugeot",
    modele: "3008",
    vehiculeColor: "noir",
    year: 2013
  }

  return (
    <div className="App">
      <h1>Hello React !</h1>
      <Personnes props={props}/>
      <Vehicle props={props}/>
      <AgeCounter/>
    </div>
  )
}

