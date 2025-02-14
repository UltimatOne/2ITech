import { useEffect, useState } from "react"
import { TVShowAPI } from "./api/tv-show"
import "./global.css"
import styles from './Styles.module.css'
import { BACKDROP_BASE_URL } from "./api/config"
import TVShowList from "./components/TVShowList/TVShowList"
import Details from "./components/Details/Details"
import Logo from "./components/Logo/Logo"
import logo from "./assets/images/Logo.png"
import SearchBar from "./components/SearchBar/SearchBar"
import VideoMovie from "./components/VideoMovie/VideoMovie"

export default function App() {

    const [showMovies, setShowMovies] = useState(false)
    const [popularsSeriesTVShow, setPopularsSeriesTVShow] = useState()
    const [moviesTVShow, setMoviesTVShow] = useState()
    const [recommendationsSeriesTVShow, setRecommendationsSeriesTVShow] = useState()
    const [recommendationsMovies, setRecommendationsMovies] = useState()
    const [currentSeriesTVShow, setCurrentSeriesTVShow] = useState()
    const [currentMovieTVShow, setCurrentMovieTVShow] = useState()
    const [seriesVideosTVShow, setSeriesVideosTVShow] = useState([])
    const [moviesVideosTVShow, setMoviesVideosTVShow] = useState([])
    const [seriesCast, setSeriesCast] = useState([])
    const [movieCast, setMovieCast] = useState([])
    const [searchResults, setSearchResults] = useState([])
    const description = "Logo MoviesTV"
    const siteName = "Movies TV"
    const subtitle = "Find a show you may like"

    // Series
    const fetchPopularsSeries = async () => {
        const popularsSeriesTmp = await TVShowAPI.fetchPopularsSeries()
        if (popularsSeriesTmp.length > 0) {
            setPopularsSeriesTVShow(popularsSeriesTmp.slice(0, 10))
            setCurrentSeriesTVShow(popularsSeriesTmp[0])
        }
    }

    const fetchRecommendationsSeries = async (item_id) => {
        const recommendationsSeriesTmp = await TVShowAPI.fetchRecommendationsSeries(item_id)
        if (recommendationsSeriesTmp.length > 0) {
            return setRecommendationsSeriesTVShow(recommendationsSeriesTmp.slice(0, 10))
        }
        return
    }

    const fetchTVShowSeriesCast = async (item_id) => {
        const seriesCastTmp = await TVShowAPI.fetchTVShowSeriesCast(item_id)
        if (seriesCastTmp.length > 0) {
            setSeriesCast(seriesCastTmp)
        } 
    }

    const fetchTVShowVideosSeries = async (item_id) => {
        const seriesVideosTmp = await TVShowAPI.fetchTVShowVideosSeries(item_id)
        setSeriesVideosTVShow(seriesVideosTmp.slice(0, 10))
    }

    // Movies
    const fetchMoviesTVShow = async () => {
        const moviesTVShowTmp = await TVShowAPI.fetchMoviesTVShow()
        if (moviesTVShowTmp.length > 0) {
            setMoviesTVShow(moviesTVShowTmp.slice(0, 10))
            setCurrentMovieTVShow(moviesTVShowTmp[0])
        }
    }

    const fetchRecommendationsMovies= async (item_id) => {
        const recommendationsMoviesTmp = await TVShowAPI.fetchRecommendationsMovies(item_id)
        if (recommendationsMoviesTmp.length > 0) {
            return setRecommendationsMovies(recommendationsMoviesTmp.slice(0, 10))
        }
        return
    }

    const fetchTVShowMovieCast = async (item_id) => {
        const seriesCastTmp = await TVShowAPI.fetchTVShowMovieCast(item_id)
        if (seriesCastTmp.length > 0) {
            setSeriesCast(seriesCastTmp)
        } 
    }

    const fetchTVShowVideosMovies = async (item_id) => {
        const moviesVideosTmp = await TVShowAPI.fetchTVShowVideosMovies(item_id)
        setMoviesVideosTVShow(moviesVideosTmp.slice(0, 10))
    }

    useEffect(() => {
        fetchPopularsSeries()
        fetchMoviesTVShow()
    }, [])

    useEffect(() => {
        if (!currentSeriesTVShow) return
        fetchRecommendationsSeries(currentSeriesTVShow.id)
        fetchTVShowVideosSeries(currentSeriesTVShow.id)
        fetchTVShowSeriesCast(currentSeriesTVShow.id)
    }, [currentSeriesTVShow])

    useEffect(() => {
        if (!currentMovieTVShow) return
        fetchRecommendationsMovies(currentMovieTVShow.id)
        fetchTVShowVideosMovies(currentMovieTVShow.id)
        fetchTVShowMovieCast(currentSeriesTVShow.id)
    }, [currentMovieTVShow])

    const searchTitleSeries = async (e) => {
        const titleSeriesTmp = e.target.value
        if (!titleSeriesTmp || titleSeriesTmp.length < 3 || (titleSeriesTmp.trim(' ') === "")) {
            setSearchResults([]);
            return
        }
        const items = await TVShowAPI.fetchByTitleSeries(titleSeriesTmp)
        setSearchResults(items)
        return;
    }

    const searchTitleMovie = async (e) => {
        const titleMoviesTmp = e.target.value
        if (!titleMoviesTmp || titleMoviesTmp.length < 3 || (titleMoviesTmp.trim(' ') === "")) {
            setSearchResults([]);
            return
        }
        const items = await TVShowAPI.fetchByTitleMovie(titleMoviesTmp)
        setSearchResults(items)
    }

    function handleResultClickSeries(tvShow) {
      setCurrentSeriesTVShow(tvShow);
      setSearchResults([]);
    }

    function handleResultClickMovies(tvShow) {
      setCurrentMovieTVShow(tvShow);
      setSearchResults([]);
    }

    if (showMovies) {
        return (
            <div className={styles.main_container} style={{
                background: currentMovieTVShow && `linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.55)), url("${BACKDROP_BASE_URL + (currentMovieTVShow.backdrop_path || currentMovieTVShow.poster_path)}") no-repeat center / cover`
            }}>
                <div className={styles.header}>
                    <div className="row">
                        <div className="col-4">
                            <Logo image={logo} description={description} title={siteName} subtitle={subtitle} />
                        </div>
                        <SearchBar onSubmit={searchTitleMovie} searchResults={searchResults} onResultClick={handleResultClickMovies} />
                    </div>
                </div>
                <div className={styles.buttons}>
                    <button onClick={() => setShowMovies(false)}>Series</button>
                    <button className={styles.active} onClick={() => setShowMovies(true)}>Movies</button>
                </div>
                {currentMovieTVShow && <Details TVShow={currentMovieTVShow} movieCast={movieCast}/>}
                {moviesTVShow && <TVShowList title="Movies" TVShowList={moviesTVShow} setCurrentTVShow={setCurrentMovieTVShow} />}
                {moviesVideosTVShow.length > 0 && <VideoMovie videos={moviesVideosTVShow} title="Videos" />}
                {recommendationsMovies && <TVShowList title="Recommendations" TVShowList={recommendationsMovies} setCurrentTVShow={setCurrentMovieTVShow} />}
            </div>
        )
    } else {
        return (
            <div className={styles.main_container} style={{
                background: currentSeriesTVShow && `linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.55)), url("${BACKDROP_BASE_URL + (currentSeriesTVShow.backdrop_path || currentSeriesTVShow.poster_path)}") no-repeat center / cover`
            }}>
                <div className={styles.header}>
                    <div className="row">
                        <div className="col-4">
                            <Logo image={logo} description={description} title={siteName} subtitle={subtitle} />
                        </div>
                        <SearchBar onSubmit={searchTitleSeries} searchResults={searchResults} onResultClick={handleResultClickSeries} />
                    </div>
                </div>
                <div className={styles.buttons}>
                    <button className={styles.active} onClick={() => setShowMovies(false)}>Series</button>
                    <button onClick={() => setShowMovies(true)}>Movies</button>
                </div>
                {currentSeriesTVShow && <Details TVShow={currentSeriesTVShow} seriesCast={seriesCast}/>}
                {popularsSeriesTVShow && <TVShowList className={styles.popular} title="Populars" TVShowList={popularsSeriesTVShow} setCurrentTVShow={setCurrentSeriesTVShow} />}
                {seriesVideosTVShow.length > 0 && <VideoMovie videos={seriesVideosTVShow} title="Videos" />}
                {recommendationsSeriesTVShow && <TVShowList title="Recommendations" TVShowList={recommendationsSeriesTVShow} setCurrentTVShow={setCurrentSeriesTVShow} />}
            </div>
        )
    }
}
