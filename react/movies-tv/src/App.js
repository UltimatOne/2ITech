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

export default function App() {
    
    const [popularsTVShow,setPopularsTVShow] = useState()
    const [recommendationsTVShow, setRecommendationsTVShow] = useState()
    const [currentTVShow, setCurrentTVShow] = useState()
    const description = "Logo Movies TV"
    const siteName = "Movies TV"
    const subtitle = "Find a show you may like"

    const fetchPopulars = async () => {
        const populars = await TVShowAPI.fetchPopulars()
        if(populars.length > 0) {
            setPopularsTVShow(populars.slice(0, 10))
            setCurrentTVShow(populars[0])
        }
    }

    const fetchRecommendations = async(series_id) => {
        const recommendations = await TVShowAPI.fetchRecommendations(series_id)
        if(recommendations.length > 0) {
            return setRecommendationsTVShow(recommendations.slice(0, 10))
        }
        return
    }

    useEffect(() => {
        fetchPopulars()
    }, [])

    useEffect(() => {
        if(!currentTVShow) return
        fetchRecommendations(currentTVShow.id)
    }, [currentTVShow])

    const searchTitle = async (e) => {
        console.log("title", e.target.value)
        const title = e.target.value
        if (!title || title.length < 3 || (title.trim(' ') === "")) return
        const item = await TVShowAPI.fetchByTitle(title)
        console.log("item", item);
        setCurrentTVShow(item[0])
        e.target.value = ""
    }

    return (
        <div className={styles.main_container} style={{ 
            background: currentTVShow && `linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.55)), url("${BACKDROP_BASE_URL + (currentTVShow.backdrop_path || currentTVShow.poster_path)}") no-repeat center / cover`
        }}>
            <div className={styles.header}>
                <div className="row">
                    <div className="col-4">
                        <Logo image={logo} description={description} title={siteName} subtitle={subtitle}/>
                    </div>
                    <SearchBar searchTitle={searchTitle} />
                </div>
            </div>
            {currentTVShow && <Details TVShow={currentTVShow}/>}
            {popularsTVShow && <TVShowList title="Populars" TVShowList={popularsTVShow} setCurrentTVShow={setCurrentTVShow} />}
            {recommendationsTVShow && <TVShowList title="Recommendations" TVShowList={recommendationsTVShow} setCurrentTVShow={setCurrentTVShow} />}
        </div>
    )
}
