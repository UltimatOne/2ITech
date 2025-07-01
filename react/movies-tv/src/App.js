import { useEffect } from "react"
import { TVShowAPI } from "./api/tv-show"
import "./global.css"
import styles from './Styles.module.css'
import { BACKDROP_BASE_URL } from "./api/config"
import TVShowList from "./components/TVShowList/TVShowList"
import Details from "./components/Details/Details"
import Logo from "./components/Logo/Logo"
import logo from "./assets/images/Logo.png"
import SearchBar from "./containers/SearchBar/SearchBar"
import VideoMovie from "./components/VideoMovie/VideoMovie"
import { useDispatch, useSelector } from "react-redux"
import {
    setShowMovies,
    setSearchResults,
    setMovies, 
    setCurrentMovie,
    setCurrentMovieCredits,
    setCurrentMovieVideos,
    setRecommendationsMovies,
    setSeries,
    setCurrentSeries,
    setCurrentSeriesCredits,
    setCurrentSeriesVideos,
    setRecommendationsSeries
} from "./store/movies/movies-slice"



export default function App() {

    const dispatch = useDispatch()

    const description = "Logo MoviesTV"
    const siteName = "Movies TV"
    const subtitle = "Find a show you may like"

    const showMovies = useSelector((store) => store.MOVIES.showMovies)

    // Movies
    const movies = useSelector((store) => store.MOVIES.movies)
    const currentMovie = useSelector((store) => store.MOVIES.currentMovie)
    const currentMovieCredits = useSelector((store) => store.MOVIES.currentMovieCredits)
    const currentMovieVideos = useSelector((store) => store.MOVIES.currentMovieVideos)
    const recommendationsMovies = useSelector((store) => store.MOVIES.recommendationsMovies)

    const fetchMovies = async () => {
        const moviesTmp = await TVShowAPI.fetchMovies()
        if (moviesTmp.length > 0) {
            dispatch(setMovies(moviesTmp.slice(0, 10)))
            dispatch(setCurrentMovie(moviesTmp[0]))
        }
    }

    const searchTitleMovie = async (e) => {
        const titleMoviesTmp = e.target.value
        if (!titleMoviesTmp || titleMoviesTmp.length < 3 || (titleMoviesTmp.trim(' ') === "")) {
            return
        }
        const items = await TVShowAPI.fetchByTitleMovie(titleMoviesTmp)
        dispatch(setSearchResults(items))
    }

    useEffect(() => {
        fetchMovies()
    }, [])

    const fetchCurrentMovieCredits = async (item_id) => {
        const currentMovieCreditsTmp = await TVShowAPI.fetchCurrentMovieCredits(item_id)
        dispatch(setCurrentMovieCredits(currentMovieCreditsTmp))
    }

    const fetchCurrentMovieVideos = async (item_id) => {
        const currentMovieVideosTmp = await TVShowAPI.fetchCurrentMovieVideos(item_id)
        dispatch(setCurrentMovieVideos(currentMovieVideosTmp.slice(0, 10)))
    }

    const fetchRecommendationsMovies = async (item_id) => {
        const recommendationsMoviesTmp = await TVShowAPI.fetchRecommendationsMovies(item_id)
        dispatch(setRecommendationsMovies(recommendationsMoviesTmp.slice(0, 10)))
    }

    useEffect(() => {
        if (!currentMovie) return
        fetchCurrentMovieCredits(currentMovie.id)
        fetchCurrentMovieVideos(currentMovie.id)
        fetchRecommendationsMovies(currentMovie.id)
    }, [currentMovie])



    // Series
    const series = useSelector((store) => store.MOVIES.series)
    const currentSeries = useSelector((store) => store.MOVIES.currentSeries)
    const currentSeriesCredits = useSelector((store) => store.MOVIES.currentSeriesCredits)
    const currentSeriesVideos = useSelector((store) => store.MOVIES.currentSeriesVideos)
    const recommendationsSeries = useSelector((store) => store.MOVIES.recommendationsSeries)

    const fetchSeries = async () => {
        const seriesTmp = await TVShowAPI.fetchSeries()
        if (seriesTmp.length > 0) {
            dispatch(setSeries(seriesTmp.slice(0, 10)))
            dispatch(setCurrentSeries(seriesTmp[0]))
        }
    }

    const searchTitleSeries = async (e) => {
        const titleSeriesTmp = e.target.value
        if (!titleSeriesTmp || titleSeriesTmp.length < 3 || (titleSeriesTmp.trim(' ') === "")) {
            return
        }
        const items = await TVShowAPI.fetchByTitleSeries(titleSeriesTmp)
        dispatch(setSearchResults(items))
    }

    useEffect(() => {
        fetchSeries()
    }, [])

    const fetchCurrentSeriesCredits = async (item_id) => {
        const currentSeriesCreditsTmp = await TVShowAPI.fetchCurrentSeriesCredits(item_id)
        dispatch(setCurrentSeriesCredits(currentSeriesCreditsTmp))
    }

    const fetchCurrentSeriesVideos = async (item_id) => {
        const currentSeriesVideosTmp = await TVShowAPI.fetchCurrentSeriesVideos(item_id)
        dispatch(setCurrentSeriesVideos(currentSeriesVideosTmp.slice(0, 10)))
    }

    const fetchRecommendationsSeries = async (item_id) => {
        const recommendationsSeriesTmp = await TVShowAPI.fetchRecommendationsSeries(item_id)
        dispatch(setRecommendationsSeries(recommendationsSeriesTmp.slice(0, 10)))
    }

    useEffect(() => {
        if (!currentSeries) return
        fetchCurrentSeriesCredits(currentSeries.id)
        fetchCurrentSeriesVideos(currentSeries.id)
        fetchRecommendationsSeries(currentSeries.id)
    }, [currentSeries])



        return (
            <div className={styles.main_container} style={showMovies ? {
                background: currentMovie && `linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.55)), url("${BACKDROP_BASE_URL + (currentMovie.backdrop_path || currentMovie.poster_path)}") no-repeat center / cover`
            } : {
                background: currentSeries && `linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.55)), url("${BACKDROP_BASE_URL + (currentSeries.backdrop_path || currentSeries.poster_path)}") no-repeat center / cover`
            }}>
                <div className={styles.header}>
                    <div className="row">
                        <div className="col-4">
                            <Logo image={logo} description={description} title={siteName} subtitle={subtitle} />
                        </div>
                        <SearchBar onSubmit={showMovies ? searchTitleMovie : searchTitleSeries} />
                    </div>
                </div>
                <div className={styles.buttons}>
                    <button className={showMovies ? styles.active : ""} onClick={() => dispatch(setShowMovies(true))}>Movies</button>
                    <button className={!showMovies ? styles.active : ""} onClick={() => dispatch(setShowMovies(false))}>Series</button>
                </div>
                {(currentMovie || currentSeries) && <Details TVShow={showMovies ? currentMovie : currentSeries} credits={showMovies ? currentMovieCredits : currentSeriesCredits} />}
                {(movies || series) && <TVShowList title={ showMovies ? "Movies" : "Series"} TVShowList={showMovies ? movies : series} />}
                <VideoMovie videos={showMovies ? currentMovieVideos : currentSeriesVideos} title="Videos" />
                {(recommendationsMovies || recommendationsSeries) && <TVShowList title="Recommendations" TVShowList={showMovies ? recommendationsMovies : recommendationsSeries} />}
            </div>
        )
}
