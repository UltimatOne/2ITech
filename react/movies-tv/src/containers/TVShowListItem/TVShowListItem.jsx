import React from 'react';
import styles from "./TVShowListItem.module.css"
import { SMALL_BACKDROP_BASE_URL } from '../../api/config';
import FiveStarRating from '../../components/FiveStarRating/FiveStarRating';
import { useDispatch, useSelector } from 'react-redux';
import { setCurrentMovie, setCurrentSeries } from '../../store/movies/movies-slice';

export default function TVShowListItem({TVShow}) {
    const showMovie = useSelector((store) => store.MOVIES.showMovies)
    const dispatch = useDispatch()

    return (
        <div className={styles.container} onClick={() => showMovie ? dispatch(setCurrentMovie(TVShow)) : dispatch(setCurrentSeries(TVShow))}>
            <img className={styles.img} src={TVShow.backdrop_path ? SMALL_BACKDROP_BASE_URL + (TVShow.backdrop_path) : "https://placehold.co/300x170?text=No+Image"} alt={TVShow.name || TVShow.original_title} />
            <p className={styles.title}>{TVShow.name || TVShow.original_title}</p>
            <FiveStarRating className={styles.starRating} rating={TVShow.vote_average / 2}/>
        </div>
    );
}
