import s from "./DisplayDifficulty.module.css"

export default function DisplayDifficulty({className, difficulty}) {
    return (
        <div className={className || s.displayDifficulty}>
            Difficulty set to : {difficulty || "no set difficulty"}
        </div>
    )
}

