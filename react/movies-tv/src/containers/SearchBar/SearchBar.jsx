import styles from "./SearchBar.module.css";
import { Search } from 'react-bootstrap-icons';
import { useDispatch, useSelector } from 'react-redux';
import { setSearchTerms, setSearchResults, setCurrentMovie, setCurrentSeries } from '../../store/movies/movies-slice';

export default function SearchBar({onSubmit}) {

    const showMovies = useSelector((store) => store.MOVIES.showMovies)
    const searchTerms = useSelector((store) => store.MOVIES.searchTerms)
    const searchResults = useSelector((store) => store.MOVIES.searchResults)

    const dispatch = useDispatch()

    function handleChange(e) {
        dispatch(setSearchTerms(e.target.value))
        onSubmit(e);
    }

    function handleResultClick(tvShow) {
        dispatch(setSearchTerms(""))
        dispatch(showMovies ? setCurrentMovie(tvShow) : setCurrentSeries(tvShow));
        dispatch(setSearchResults([]));
    }

    return (
        <div className={`col-md-12 col-lg-4 ${styles.container}`}>
            <Search className={styles.icon} />
            <input
                id="searchTerm"
                value={searchTerms}
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
                                dispatch(setSearchTerms(""))
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
