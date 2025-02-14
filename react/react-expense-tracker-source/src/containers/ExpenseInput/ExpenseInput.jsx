import { useState } from "react";
import s from "./style.module.css";
import { addExpense } from "store/expenses/expenses-slice";
import { useDispatch } from "react-redux";

export function ExpenseInput() {
    const dispatch = useDispatch()

    // Method 1
    // const [inputs, setInputs] = useState({});

    // const handleChange = (e) => {
    //     const name = e.target.name;
    //     const value = e.target.value;
    //     setInputs(values => ({ ...values, [name]: value }))
    // }

    // const handleSubmit = (e) => {
    //     e.preventDefault()
    //     console.log(inputs)
    //     dispatch(addExpense(inputs))
    //     setInputs({})
    // }

    // Method 2
    const submit = (e) => {
        e.preventDefault()
        const formData = new FormData(e.currentTarget)
        const name = formData.get("name")
        const price = formData.get("price")
        console.log("***", name, price)
        dispatch(addExpense({ name, price }))
        e.target.reset()
    }

    return (
        <form onSubmit={/*handleSubmit*/submit}>
            <div className="row justify-content-center">
                <div className="col-12 col-sm-5 col-md-4 col-lg-4 mb-2">
                    <input
                        type="text"
                        className="form-control"
                        placeholder='Ex : "Apple"'
                        name="name"
                        // Method 1
                        // value={inputs.name || ""}
                        // onChange={handleChange}
                    />
                </div>
                <div className="col-12 col-sm-2 col-md-4 col-lg-4 mb-2">
                    <input
                        type="number"
                        step="0.01"
                        className="form-control"
                        placeholder="Ex: 3.99"
                        name="price"
                        // Method 1
                        // value={inputs.price || ""}
                        // onChange={handleChange}
                    />
                </div>

                <div className="col-12 col-sm-2 col-md-4 col-lg-4 mb-2">
                    <button type="submit" className={`btn btn-primary ${s.btn}`}>
                        Add
                    </button>
                </div>
            </div>
        </form>
    );
}
