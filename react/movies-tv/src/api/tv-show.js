import axios from "axios"
import { API_KEY_PARAM, BASE_URL } from "./config"

export class TVShowAPI {

    // Movies
    static async fetchMovies() {
        const response = await axios.get(`${BASE_URL}movie/now_playing${API_KEY_PARAM}`)
        return response.data.results
    }

    //Obtenir la liste des acteurs d'un film.
    static async fetchCurrentMovieCredits(tvShowId) {
        const response = await axios.get(`${BASE_URL}movie/${tvShowId}/credits${API_KEY_PARAM}`)
        return response.data
    }

    static async fetchCurrentMovieVideos(tvShowId) {
        const response = await axios.get(`${BASE_URL}movie/${tvShowId}/videos${API_KEY_PARAM}`)
        return response.data.results;
    }

    static async fetchRecommendationsMovies(movie_id) {
        const response = await axios.get(`${BASE_URL}movie/${movie_id}/recommendations${API_KEY_PARAM}`)
        return response.data.results
    }

    static async fetchByTitleMovie(title) {
        const response = await axios.get(`${BASE_URL}search/movie${API_KEY_PARAM}&query=${title}&include_adult=false&language=en-US&page=1`)
        return response.data.results
    }



    // Series
    static async fetchSeries() {
        const response = await axios.get(`${BASE_URL}tv/popular${API_KEY_PARAM}`)
        return response.data.results
    }

    //Obtenir la liste des acteurs d'une série.
    static async fetchCurrentSeriesCredits(tvShowId) {
        const response = await axios.get(`${BASE_URL}tv/${tvShowId}/credits${API_KEY_PARAM}`)
        return response.data
    }

    static async fetchCurrentSeriesVideos(tvShowId) {
        const response = await axios.get(`${BASE_URL}tv/${tvShowId}/videos${API_KEY_PARAM}`)
        return response.data.results
    }

    static async fetchRecommendationsSeries(series_id) {
        const response = await axios.get(`${BASE_URL}tv/${series_id}/recommendations${API_KEY_PARAM}`)
        return response.data.results
    }

    static async fetchByTitleSeries(title) {
        const response = await axios.get(`${BASE_URL}search/tv${API_KEY_PARAM}&query=${title}&include_adult=false&language=en-US&page=1`)
        return response.data.results
    }

}
