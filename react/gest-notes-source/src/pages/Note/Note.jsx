import { useDispatch, useSelector } from "react-redux"
import styles from "./Note.module.css"
import NoteForm from "components/NoteForm/NoteForm"
import { useNavigate, useParams } from "react-router-dom"
import { useState } from "react"
import { NotesAPI } from "api/note-api"
import { deleteNote, updateNote } from "store/note/note-slice"

export default function Note() {
    const [isEditable, setIsEditable] = useState(false)
    const { id } = useParams()
    const note = useSelector((store) => store.NOTES.notesList).find(note => note.id === id)
    const navigate = useNavigate()

    const dispatch = useDispatch()

    const editNote = async (note) => {
        const response = await NotesAPI.updateNoteById(note)
        dispatch(updateNote(response))
        setIsEditable(!isEditable)
    }

    const deleteThisNote = async (id) => {
        if (window.confirm("Supprimer cette note?")) {
            await NotesAPI.deleteNoteById(id)
            dispatch(deleteNote(id))
            navigate("/")
        }
    }

    return (
        note &&
        <div className={styles.container}>
            <NoteForm
                isEditable={isEditable}
                note={note}
                title={isEditable ? "Edit Note" : note.title}
                onClickEdit={() => setIsEditable(!isEditable)}
                onClickTrash={() => deleteThisNote(note.id)}
                onSubmit={isEditable && ((formValues) => editNote(formValues))}
            />
        </div>
    )
}
