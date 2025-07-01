import { createSlice } from "@reduxjs/toolkit"

export const moviesSlice = createSlice({
    name: "moviesSlice",
    initialState: {
        showMovies: true,
        searchTerms: "",
        searchResults: "",
        movies: "",
        currentMovie: "",
        currentMovieCredits: "",
        currentMovieVideos: "",
        recommendationsMovies: "",
        series: "",
        currentSeries: "",
        currentSeriesCredits: "",
        currentSeriesVideos: "",
        recommendationsSeries: "",
    },
    reducers: {
        setShowMovies: (currentSlice, action) => {
            currentSlice.showMovies = action.payload
        },
        setSearchResults: (currentSlice, action) => {
            currentSlice.searchResults = action.payload
        },
        setSearchTerms: (currentSlice, action) => {
            currentSlice.searchTerms = action.payload
        },
        setMovies: (currentSlice, action) => {
            currentSlice.movies = action.payload
        },
        setCurrentMovie: (currentSlice, action) => {
            currentSlice.currentMovie = action.payload
        },
        setCurrentMovieCredits: (currentSlice, action) => {
            currentSlice.currentMovieCredits = action.payload
        },
        setCurrentMovieVideos: (currentSlice, action) => {
            currentSlice.currentMovieVideos = action.payload
        },
        setRecommendationsMovies: (currentSlice, action) => {
            currentSlice.recommendationsMovies = action.payload
        },
        setSeries: (currentSlice, action) => {
            currentSlice.series = action.payload
        },
        setCurrentSeries: (currentSlice, action) => {
            currentSlice.currentSeries = action.payload
        },
        setCurrentSeriesCredits: (currentSlice, action) => {
            currentSlice.currentSeriesCredits = action.payload
        },
        setCurrentSeriesVideos: (currentSlice, action) => {
            currentSlice.currentSeriesVideos = action.payload
        },
        setRecommendationsSeries: (currentSlice, action) => {
            currentSlice.recommendationsSeries = action.payload
        },
    }
})

export const { 
    setShowMovies,
    setSearchTerms,
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
} = moviesSlice.actions