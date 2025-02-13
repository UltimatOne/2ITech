import React from 'react';
import style from "./Details.module.css"
import FiveStarRating from '../FiveStarRating/FiveStarRating';

export default function Details({TVShow}) {
    
    return (
        <div className={style.tv_show_detail}>
            <div className={style.title}>{TVShow.name && TVShow.name}</div>
            <FiveStarRating rating={TVShow.vote_average / 2}/>
            <div className={style.overview}>{TVShow.overview && TVShow.overview}</div>
        </div>
    );
}
