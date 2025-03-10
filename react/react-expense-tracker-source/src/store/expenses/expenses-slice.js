import { createSlice } from "@reduxjs/toolkit"

export const expensesSlice = createSlice({
    name: "expensesSlice",
    initialState: {
        expensesList: [],
        income: 1000,
    },
    reducers: {
        addExpense: (currentSlice, action) => {
            currentSlice.expensesList.push({...action.payload, price: Number.parseFloat(action.payload.price)})
            console.log("addExpense()", action);
        },
        setIncome: (currentSlice, action) => {
            currentSlice.income = Number.parseFloat(action.payload)
            console.log("addIncome()", action);
        }
    }
})

export const { addExpense, setIncome } = expensesSlice.actions