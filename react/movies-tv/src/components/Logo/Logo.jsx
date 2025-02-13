import React from 'react';
import styles from "./Logo.module.css"

export default function Logo({image, description, title, subtitle}) {
    return (
        <>
            <div className={styles.container}>
                <img className={styles.img} src={image} alt={description} />
                <span className={styles.title}>{title}</span>
            </div>
            <span className={styles.subtitle}>{subtitle}</span>
        </>
    );
}
