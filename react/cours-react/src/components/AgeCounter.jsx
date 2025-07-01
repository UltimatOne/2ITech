import React, { useState } from 'react';
import "./style.modules.css"

export default function AgeCounter() {
    const [age, setAge] = useState(30)

    const increaseAge = () => {
        if (age === 99) return
        setAge(age + 1)
    }

    const decreaseAge = () => {
        if (age === 30) return 
        setAge(age - 1)
    }

    return (
        <div>
            <button onClick={decreaseAge}>Decrease age</button>
            <button onClick={increaseAge}>Incrase age</button>
            <p className="title">Vous avez {age} ans</p>
        </div>
    )
}
