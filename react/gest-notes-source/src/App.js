import styles from "./App.module.css"
import { NotesAPI } from "api/note-api";
import Header from "components/Header/Header";
import { useEffect } from "react";
import { useDispatch/*, useSelector*/ } from "react-redux";
import { Outlet } from "react-router-dom";
import { setCategories, setNotesList } from "store/note/note-slice";

export function App() {
    // Méthode pour envoyer les données dans le store Redux
    const dispatch = useDispatch()


    // Récupère les données depuis la BDD et envoi dans le store à l'aide de dispatch
    const getNotesList = async () => {
        const notesListTmp = await NotesAPI.fetchNotes()
        if (notesListTmp.length > 0) {
            dispatch(setNotesList(notesListTmp))
        }
    }

    const getCategories = async () => {
        const categoriesTmp = await NotesAPI.fetchCategories()
        if (categoriesTmp.length > 0) {
            dispatch(setCategories(categoriesTmp))
        }
    }

    // Récupère les données depuis le store
    // const notesList = useSelector((store) => store.NOTES.notesList)
    // const categories = useSelector((store) => store.NOTES.categories)

    // Lance la récupération des données dans la BDD
    useEffect(() => {
        getNotesList()
        getCategories()
    }, [])

    return (
        <div className={styles.container}>
            <Header />
            <Outlet />
        </div>
    )
}