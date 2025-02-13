import React from 'react';
import styles from "./FiveStarRating.module.css"
import { StarFill, Star as StarEmpty, StarHalf } from "react-bootstrap-icons";

export default function FiveStarRating({className, rating}) {

    // Etoiles à afficher - tableau de composants jsx
    const starList = []

    // Nombre d'étoiles pleines 
    const starFillCount = Math.floor(rating)

    // determine si il y a une demi-étoile à afficher
    const hasStarHalf = rating - starFillCount >= 0.5

    // Nombre d'étoiles vides
    const emptyStarCount = 5 - starFillCount - (hasStarHalf ? 1 : 0)

    // Pousse le nombre d'étoiles pleines
    for(let i = 0; i < starFillCount; i++) {
        starList.push(<StarFill color='gold' key={"star-fill-" + i}/>)
    }

    // Pousse la demi-étoile si il y en a une
    if(hasStarHalf) {
        starList.push(<StarHalf color='gold' key={"star-half"}/>)
    }

    // Pousse les étoiles vides
    for(let i = 0; i < emptyStarCount; i++) {
        starList.push(<StarEmpty color='gold' key={"star-empty-" + i}/>)
    }

    return (
        <div className={className || styles.starRating}>
            {starList}
            {rating}
        </div>
    );
}
