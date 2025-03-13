import styles from "./PageNotFound.module.css"

export default function PageNotFound(props) {
    return (
        <div className={styles.container}>
            <h1>Page non trouvée</h1>
            <p>erreur 404</p>
        </div>
    )
}
