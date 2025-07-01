import React from 'react';
import styles from "./TVShowList.module.css"
import TVShowListItem from '../../containers/TVShowListItem/TVShowListItem';

export default function Recommandations({ TVShowList, title }) {

    const list = []
    if (TVShowList) {
        for (let i = 0; i < TVShowList.length; i++) {
            list.push(<TVShowListItem className={styles.tv_show_list_item} key={`item-${title}-` + i} TVShow={TVShowList[i]}/>)
        }
    }

    return (
        <div className={title === "Populars" ? styles.populars : styles.otherTitle}>
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
