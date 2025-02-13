import React, { useEffect, useState } from 'react';
import styles from "./SearchBar.module.css";
import { Search } from 'react-bootstrap-icons';

export default function SearchBar({onSubmit, searchResults, onResultClick}) {
    console.log("searchResults",searchResults)
    const [query, setQuery] = useState("");

    function handleChange(e) {
        setQuery(e.target.value);
        onSubmit(e);
    }
 
    function handleResultClick(tvShow) {
        setQuery("");
        onResultClick(tvShow);
    }

    return (
        <div className={`col-md-12 col-lg-4 ${styles.container}`}>
            <Search className={styles.icon} />
            <input
                id="searchTerm"
                value={query}
                onChange={handleChange}
                className={styles.input}
                type="text"
                placeholder=" Search a TV show you may like"
            />

            {searchResults.length > 0 && (
                <ul className={styles.resultsList}>
                    {searchResults.map((result) => (
                        <li
                            key={result.id}
                            className={styles.resultItem}
                            onClick={(e) => {
                                setQuery("")
                                handleResultClick(result)
                            }}
                        >
                            {result.name || result.original_title}
                        </li>
                    ))}
                </ul>
            )}
        </div>
    );
}
