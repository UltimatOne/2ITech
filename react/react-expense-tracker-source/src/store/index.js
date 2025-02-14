import { configureStore } from "@reduxjs/toolkit"
import { expensesSlice } from "./expenses/expenses-slice"

const store = configureStore({
    reducer: {
        EXPENSES: expensesSlice.reducer
    }
})

export { store }