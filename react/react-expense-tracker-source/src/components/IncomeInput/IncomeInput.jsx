import { useDispatch, useSelector } from "react-redux";
import s from "./style.module.css";
import { setIncome } from "store/expenses/expenses-slice";



export function IncomeInput(props) {
    const dispatch = useDispatch()

    const income = useSelector((store) => store.EXPENSES.income)

    const submit = (e) => {
        e.preventDefault()
        const income = e.target.value
        console.log("***", income)
        dispatch(setIncome(income))
        // e.target.reset()
    }

    return (
        <form onSubmit={submit} className="row justify-content-center mb-2">
            <div className={`col-6 ${s.label}`}>Income</div>
            <div className="col-6">
                <input defaultValue={income} name="income" onBlur={submit} type="number" className="form-control" placeholder="Ex: 3000" />
            </div>
        </form>
    );
}
