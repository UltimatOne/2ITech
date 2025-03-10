import { useSelector } from "react-redux";
import s from "./style.module.css";

export function ExpenseTotal(props) {
    const expensesList = useSelector((store) => store.EXPENSES.expensesList)
    const income = useSelector((store) => store.EXPENSES.income)

    const totalExpenses = expensesList.reduce((a, b) => {
        return a + b.price
    }, 0)
    const remainingMoney = income - totalExpenses

    return (
        <div>
            <div className="row">
                <div className={`col ${s.label}`}>Total expenses</div>
                <div className={`col ${s.amount}`}>{totalExpenses} $</div>
            </div>
            <div className="row">
                <div className={`col ${s.label}`}>Remaining money</div>
                <div className={`col ${s.amount}`}>{remainingMoney} $</div>
            </div>
        </div>
    );
}
