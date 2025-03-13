import { configureStore } from "@reduxjs/toolkit";
import { notesSlice } from "./note/note-slice";

export const store = configureStore({
  reducer: {
    NOTES: notesSlice.reducer,
  },
});
