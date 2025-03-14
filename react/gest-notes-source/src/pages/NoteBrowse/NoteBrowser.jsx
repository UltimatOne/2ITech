import SearchBar from "components/SearchBar/SearchBar"
import styles from "./NoteBrowser.module.css"
import NotesList from "components/Containers/NotesList/NotesList"
import { useEffect, useState } from "react"
import { useSelector } from "react-redux"
import Categories from "components/Categories/Categories"

export default function NoteBrowser() {
    // Récupère les données depuis le store
    const notesList = useSelector((store) => store.NOTES.notesList)
    const categories = useSelector((store) => store.NOTES.categories)

    const [filteredNotesList, setFilteredNotesList] = useState()
    const [selectedCategory, setSelectedCategory] = useState("")
    const [searchText, setSearchText] = useState()

    useEffect(() => {
        if (!selectedCategory) {
            if (!searchText) {
                setFilteredNotesList(notesList)
                return
            } else {
                const filteredNotesListTmp = notesList.filter((note) => {
                    return note.title?.toLowerCase().includes(searchText.toLowerCase()) || note.content?.toLowerCase().includes(searchText.toLowerCase())
                })
                setFilteredNotesList(filteredNotesListTmp)
            }
            return
        }
        const filteredNotesListTmp = notesList.filter((note) => {
            if (!searchText) {
                return note.category_id === selectedCategory
            } else {
                return note.category_id === selectedCategory && (note.title?.toLowerCase().includes(searchText.toLowerCase()) || note.content?.toLowerCase().includes(searchText.toLowerCase()))
            }
        })
        setFilteredNotesList(filteredNotesListTmp)

    }, [searchText, selectedCategory, notesList])

    return (
        <div id="noteBrowser" className={styles.container}>
            <SearchBar onTextChange={setSearchText} placeholder="Search your notes..." />
            <div className={styles.bodyContainer}>
                <Categories categories={categories} onClick={(category) => setSelectedCategory(category)} selectedCategory={selectedCategory} />
                <NotesList notesList={filteredNotesList} />
            </div>
        </div>
    )
}
