import { createSlice } from "@reduxjs/toolkit"

export const notesSlice = createSlice({
    name: "notesSlice",
    initialState: {
        notesList: []
    },
    reducers: {
        setNotesList: (currentSlice, action) => {
            currentSlice.notesList = action.payload
        },
        addNote: (currentSlice, action) => {
            currentSlice.notesList.push(action.payload)
        },
        updateNote: (currentSlice, action) => {
            const index = currentSlice.notesList.findIndex((item) => item.id === action.payload.id)
            currentSlice.notesList[index] = action.payload
        },
        deleteNote: (currentSlice, action) => {
            // const index = currentSlice.notesList.findIndex((item) => item.id === action.payload)
            // currentSlice.notesList.splice(index, 1)
            const filteredNotesList = currentSlice.notesList.filter((item) => item.id !== action.payload)
            currentSlice.notesList = filteredNotesList
        }
    }
})

export const notesReducer = notesSlice.reducer
export const { 
    setNotesList,
    addNote,
    updateNote,
    deleteNote
} = notesSlice.actions