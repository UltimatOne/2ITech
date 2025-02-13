import React from 'react';
import styles from "./SearchBar.module.css";
import { Search } from 'react-bootstrap-icons';

export default function SearchBar({searchTitle}) {

    return (
        <div className={`col-md-12 col-lg-4 ${styles.container}`}>
            <Search className={styles.icon} />
            <input className={styles.input} type="text" onChange={(e) => searchTitle(e)} />
        </div>
    );
}
