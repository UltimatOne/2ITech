import { createSlice } from "@reduxjs/toolkit"

export const expensesSlice = createSlice({
    name: "expensesSlice",
    initialState: {
        expensesList: []
    },
    reducers: {
        addExpense: (currentSlice, action) => {
            currentSlice.expensesList.push(action.payload)
            console.log("addExpense()", action);
        }
    }
})

export const { addExpense } = expensesSlice.actions