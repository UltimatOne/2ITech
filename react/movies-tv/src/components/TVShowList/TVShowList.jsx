import React from 'react';
import styles from "./TVShowList.module.css"
import TVShowListItem from '../TVShowListItem/TVShowListItem';

export default function Recommandations({ TVShowList, title, setCurrentTVShow}) {
    const list = []
    if (TVShowList) {
        for (let i = 0; i < TVShowList.length; i++) {
            list.push(<TVShowListItem className={styles.tv_show_list_item} key={"movie-" + i} setCurrentTVShow={setCurrentTVShow} TVShow={TVShowList[i]}/>)
        }
    }

    return (
        <div className={title === "Populars" && styles.populars}>
            <div className={styles.title}>
                {title}
            </div>
            <div className={styles.list}>
                <div className={styles.slider}>
                    {list && list}
                </div>
            </div>
        </div>);
}
