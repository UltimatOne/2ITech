import axios from "axios"
import { API_KEY_PARAM, BASE_URL } from "./config";

export class TVShowAPI {

    static async fetchPopulars() {
        const response = await axios.get(`${BASE_URL}tv/popular${API_KEY_PARAM}`)
        return response.data.results
    }

    static async fetchRecommendations(series_id) {
        const response = await axios.get(`${BASE_URL}tv/${series_id}/recommendations${API_KEY_PARAM}`)
        return response.data.results
    }

    static async fetchByTitle(title) {
        const response = await axios.get(`${BASE_URL}search/tv${API_KEY_PARAM}&query=${title}&include_adult=false&language=en-US&page=1`)
        return response.data.results
    }
}

