import NoteForm from "components/NoteForm/NoteForm"
import styles from "./NoteCreate.module.css"
import { NotesAPI } from "api/note-api";
import { useDispatch } from "react-redux";
import { useNavigate } from "react-router-dom";
import { addNote } from "store/note/note-slice";


export default function NoteCreate() {
    const dispatch = useDispatch()
    const navigate = useNavigate()

    const createNote = async (note) => {
        const createdNote = await NotesAPI.createNote({
            ...note, created_at: new Date().toLocaleDateString()
        })
        dispatch(addNote(createdNote))
        navigate("/")
    }

    return (
        <div className={styles.container}>
            <NoteForm title={"Create a note"} onSubmit={(formValues) => createNote(formValues)}/>
        </div>
    )
}
