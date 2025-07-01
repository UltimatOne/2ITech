import React from 'react';
import styles from "./VideoMovie.module.css"

export default function VideoMovie({ videos, title }) {

    if (videos.length > 0) {
        return (
            <>
                <h2 className={styles.sectionTitle}>{title}</h2>
                <div className={styles.videoList}>
                    <div className={styles.slider}>
                        {videos.map((video) => (
                            <div key={video.id} className={styles.videoItem}>
                                <div className={styles.videoFrame}>
                                    <iframe
                                        width="300"
                                        height="150"
                                        src={`https://www.youtube.com/embed/${video.key}`}
                                        title={video.name}
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        referrerPolicy="strict-origin-when-cross-origin"
                                        allowFullScreen
                                    ></iframe>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            </>
        )
    } else {
        return (<></>)
    }

}

