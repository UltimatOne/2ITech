import React from 'react';

export default function Personnes({props}) {
    console.log("props", props);
    return (
        <div>
            <p>Bonjour {props.name}!</p>
        </div>
    )
}

