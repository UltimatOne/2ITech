import ReactDOM from 'react-dom/client'
import './index.css'
import { App } from "App"
import { store } from "./store"
import { Provider } from 'react-redux'
import { BrowserRouter, Route, Routes } from 'react-router-dom'
import NoteBrowser from 'pages/NoteBrowse/NoteBrowser'
import NoteCreate from 'pages/NoteCreate/NoteCreate'
import PageNotFound from 'pages/PagenoteFound/PageNotFound'
import Note from 'pages/Note/Note'

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
    <Provider store={store}>
        <BrowserRouter>
            <Routes>
                <Route path='/' element={<App />}>
                    <Route path='/' element={<NoteBrowser />} />
                    <Route path='/note/:id' element={<Note />} />
                    <Route path='/note/new' element={<NoteCreate />} />
                    <Route path='*' element={<PageNotFound />} />
                </Route>
            </Routes>
        </BrowserRouter>
    </Provider>
);