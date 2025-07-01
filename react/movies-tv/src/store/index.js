import { configureStore } from "@reduxjs/toolkit"
import { moviesSlice } from "./movies/movies-slice"

const store = configureStore({
    reducer: {
        MOVIES: moviesSlice.reducer,
    }
})

export { store }