import styles from "./ButtonPrimary.module.css"

export default function ButtonPrimary({onClick = () => {}, children}) {
    return (
        <button type="button" onClick={onClick} className={`btn btn-primary ${styles.button}`}>
          {children}
        </button>
    )
}