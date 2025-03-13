import { Search } from "react-bootstrap-icons"
import styles from "./SearchBar.module.css"

export default function SearchBar({ onTextChange, placeholder }) {
    return (
        <div className={styles.container}>
            <Search size={25} className={styles.icon} />
            <input
                type="text"
                className={styles.input}
                onChange={(e) => onTextChange(e.target.value)}
                placeholder={placeholder}
            />
        </div>
    )
}
