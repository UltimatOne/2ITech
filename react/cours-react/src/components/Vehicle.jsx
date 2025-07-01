import React from 'react';

export default function Vehicle({props}) {
    console.log("props", props);

    if (props.year >= 2026) {
        return (
            <p>La voiture n'est pas encore disponnible</p>
        )
    } else {
        return (
            <div className={props.className || "vehicle"}>
                <p>{props.marque} {props.modele} {props.vehiculeColor} année {props.year}</p>
            </div>
        )
    }
}
