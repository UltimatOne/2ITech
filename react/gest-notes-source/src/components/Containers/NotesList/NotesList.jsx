import { useDispatch } from "react-redux"
import styles from "./notesListe.module.css"
import TextCard from "components/TextCard/TextCard"
import { useNavigate } from "react-router-dom"
import { NotesAPI } from "api/note-api"
import { deleteNote } from "store/note/note-slice"

export default function NotesList({notesList}) {
    const dispatch = useDispatch()
    const navigate = useNavigate()

    const deleteThisNote = async (id) => {
        if (window.confirm("Supprimer cette note?")) {
            await NotesAPI.deleteNoteById(id)
            dispatch(deleteNote(id))
        }
    }

    return (
        <div className={`row justify-content-center container-fluid`}>
            {notesList?.map((note, key) => {
                return (
                    <div key={key} className={styles.card_container}>
                        <TextCard
                            title={note.title}
                            subtitle={note.created_at}
                            content={note.content}
                            onClickTrash={(e) => deleteThisNote(note.id)}
                            onClick={() => navigate("/note/" + note.id)}
                        />
                    </div>
                )
            })}
        </div>
    )
}
