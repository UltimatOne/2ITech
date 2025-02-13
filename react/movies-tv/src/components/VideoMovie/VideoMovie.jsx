import React from 'react';
import styles from "./VideoMovie.module.css"

export default function VideoMovie({ videos }) {
    console.log("videos", videos);
    return (
        <>
            <h2 className={styles.sectionTitle}>Videos</h2>
            <div className={styles.videoList}>
                <div className={styles.slider}>
                    {videos.map((video) => (
                        <div key={video.id} className={styles.videoItem}>
                            <h3 className={styles.videoTitle}>{ }</h3>
                            <div className={styles.videoFrame}>
                                <iframe
                                    src={`https://www.youtube.com/embed/${video.key}`}
                                    title={video.name}
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    referrerPolicy="strict-origin-when-cross-origin"
                                    allowFullScreen
                                ></iframe>
                            </div>
                        </div>
                    ))}
                </div>
            </div>
        </>
    );
}
