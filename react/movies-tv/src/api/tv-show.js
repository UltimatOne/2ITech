import axios from "axios"
import { API_KEY_PARAM, BASE_URL } from "./config";

export class TVShowAPI {

    // Series
    static async fetchPopularsSeries() {
        const response = await axios.get(`${BASE_URL}tv/popular${API_KEY_PARAM}`)
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

    static async fetchTVShowVideosSeries(tvShowId) {
        const response = await axios.get(`${BASE_URL}tv/${tvShowId}/videos${API_KEY_PARAM}`);
        return response.data.results;
    }

    // Movies
    static async fetchMoviesTVShow() {
        const response = await axios.get(`${BASE_URL}movie/now_playing${API_KEY_PARAM}`);
        console.log("response.data.results", response.data.results);
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

    static async fetchTVShowVideosMovies(tvShowId) {
        const response = await axios.get(`${BASE_URL}movie/${tvShowId}/videos${API_KEY_PARAM}`);
        return response.data.results;
    }

    //Obtenir la liste des acteurs d'une série.
    static async fetchTVShowCast(tvShowId) {
        const response = await axios.get(`${BASE_URL}tv/${tvShowId}/credits${API_KEY_PARAM}`);
        return response.data.cast;
    }
}

