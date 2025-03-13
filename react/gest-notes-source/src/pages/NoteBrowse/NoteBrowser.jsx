import SearchBar from "components/SearchBar/SearchBar"
import styles from "./NoteBrowser.module.css"
import NotesList from "components/Containers/NotesList/NotesList"
import { useEffect, useState } from "react"
import { useSelector } from "react-redux"

export default function NoteBrowser() {
    // Récupère les données depuis le store
    const notesList = useSelector((store) => store.NOTES.notesList)

    const [filteredNotesList, setFilteredNotesList] = useState()
    const [searchText, setSearchText] = useState()

    useEffect(() => {
        if (!searchText) {
            setFilteredNotesList(notesList)
            return
        }

        const filteredNotesListTmp = notesList.filter((note) => {
            return note.title?.toLowerCase().includes(searchText.toLowerCase()) || note.content?.toLowerCase().includes(searchText.toLowerCase())
        })
        setFilteredNotesList(filteredNotesListTmp)

    }, [searchText, notesList])

    return (
        <div id="noteBrowser" className={styles.container}>
            <SearchBar onTextChange={setSearchText} placeholder="Search your notes..." />
            <NotesList notesList={filteredNotesList} />
        </div>
    )
}
