import axios from "axios"

const BASE_URL = "http://localhost:3200"

export class NotesAPI {
    static async fetchNotes() {
        const response = await axios.get(`${BASE_URL}/notes`)
        return response.data
    }

    static async createNote(note) {
        const response = await axios.post(`${BASE_URL}/notes`, note)
        return response.data
    }
    
    static async fetchNoteById(noteId) {
        const response = await axios.get(`${BASE_URL}/notes/${noteId}`)
        return response.data
    }
    
    static async deleteNoteById(noteId) {
        const response = await axios.delete(`${BASE_URL}/notes/${noteId}`)
        return response.data
    }
    
    static async updateNoteById(note) {
        const response = await axios.patch(`${BASE_URL}/notes/${note.id}`, note)
        return response.data
    }
    
    static async fetchCategories() {
        const response = await axios.get(`${BASE_URL}/categories`)
        return response.data
    }
}