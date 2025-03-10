import styles from "./ButtonPrimary.module.css"

export default function ButtonPrimary({children}) {
    return (
        <button type="button" className={`btn btn-primary ${styles.button}`}>
          {children}
        </button>
    )
}