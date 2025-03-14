import NoteForm from "components/NoteForm/NoteForm"
import styles from "./NoteCreate.module.css"
import { NotesAPI } from "api/note-api";
import { useDispatch, useSelector } from "react-redux";
import { useNavigate } from "react-router-dom";
import { addNote } from "store/note/note-slice";


export default function NoteCreate() {
    const dispatch = useDispatch()
    const navigate = useNavigate()

    const categories = useSelector((store) => store.NOTES.categories)

    const createNote = async (note) => {
        const createdNote = await NotesAPI.createNote({
            ...note, created_at: new Date().toLocaleDateString()
        })
        dispatch(addNote(createdNote))
        navigate("/")
    }

    return (
        <div className={styles.container}>
            <NoteForm title={"Create a note"} categories={categories} onSubmit={(formValues) => createNote(formValues)} close={() => navigate("/")}/>
        </div>
    )
}
