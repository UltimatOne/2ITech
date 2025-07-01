import React from 'react';
import style from "./Details.module.css"
import FiveStarRating from '../FiveStarRating/FiveStarRating';

export default function Details({TVShow, credits}) {
    const castDetails = credits?.cast?.slice(0, 10)

    return (
        <div className={style.tv_show_detail}>
            <p className={style.title}>{TVShow.name || TVShow.original_title}</p>
            <FiveStarRating rating={TVShow.vote_average / 2}/>
            <p className={style.overview}>{TVShow.overview && TVShow.overview}</p>
            {castDetails &&
                <p>Cast : {
                    castDetails.map((actor, key)=>{
                        if (key < (castDetails.length - 1)) {
                            return(<span key={key}>{actor.name}, </span>)
                        } else {
                            return(<span key={key}>{actor.name}.</span>)
                        }
                    })
                }</p>
            }
        </div>
    );
}
