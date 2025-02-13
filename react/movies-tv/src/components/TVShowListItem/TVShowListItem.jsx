import React from 'react';
import styles from "./TVShowListItem.module.css"
import { SMALL_BACKDROP_BASE_URL } from '../../api/config';
import FiveStarRating from '../FiveStarRating/FiveStarRating';

export default function TVShowListItem({TVShow, setCurrentTVShow}) {
    return (
        <div className={styles.container} onClick={() => setCurrentTVShow(TVShow)}>
            <img className={styles.img} src={TVShow.backdrop_path ? SMALL_BACKDROP_BASE_URL + (TVShow.backdrop_path) : "https://placehold.co/300x170?text=No+Image"} alt={TVShow.name} />
            <p className={styles.title}>{TVShow.name || TVShow.original_title}</p>
            <FiveStarRating className={styles.starRating} rating={TVShow.vote_average / 2}/>
        </div>
    );
}
