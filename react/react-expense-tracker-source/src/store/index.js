import { combineReducers, configureStore } from "@reduxjs/toolkit"
import { expensesSlice } from "./expenses/expenses-slice"
import { persistStore, persistReducer } from "redux-persist"
import storage from "redux-persist/lib/storage"
 
const persistConfig = {
    key: "root",
    version: 1,
    storage,
    whitelist: ['EXPENSES']
}

const rootReducers = combineReducers({
    EXPENSES: expensesSlice.reducer
})

const persistReducers = persistReducer(persistConfig, rootReducers)

const store = configureStore({
    reducer: persistReducers,
    middleware: (getDefaultMd) => (
        getDefaultMd({
            serializableCheck: false
        })
    )
})

const persistor = persistStore(store)
export { store, persistor }