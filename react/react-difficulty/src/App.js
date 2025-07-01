import { useState } from "react";
import s from "./app.module.css"
import DisplayDifficulty from "./components/displayDifficulty/DisplayDifficulty";
import MenuList from "./components/menuList/MenuList";

export default function App() {

  const [difficulty, setDifficulty] = useState()

  function updateDifficulty (itemDifficulty) {
    setDifficulty(itemDifficulty)
  }

  return (
    <>
      <h1 className={s.title}>Hello World!</h1>
      <div className={s.container}>
        <MenuList difficulty={difficulty} updateDifficulty={updateDifficulty}/>
        <DisplayDifficulty difficulty={difficulty}/>
      </div>
    </>
  )
}
