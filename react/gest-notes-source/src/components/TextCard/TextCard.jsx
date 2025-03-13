import { Trash } from "react-bootstrap-icons"
import styles from "./TextCard.module.css"
import { useState } from "react";

export default function TextCard(
    {
        key,
        title = "test title",
        subtitle = "test subtitle",
        content = "test content",
        onClickTrash = () => { },
        onClick = () => { }
    }
) {
    const [isTrashHovered, setIsTrashHovered] = useState(false)
    const [isCardHovered, setIsCardHovered] = useState(false)

    function handleClickTrash(e) {
        e.stopPropagation()
        onClickTrash()
    }

    function handleClick(e) {
        e.stopPropagation()
        onClick()
    }

    return (
        <div
            key={key}
            onMouseEnter={() => setIsCardHovered(true)}
            onMouseLeave={() => setIsCardHovered(false)}
            style={{ borderColor: isCardHovered ? "#0d6efd" : "transparent" }}
            onClick={(e) => handleClick(e)}
            className={`card ${styles.container}`}
        >
            <div className="card-body">
                <div className={styles.title_row}>
                    <h5 className="card-title">{title}</h5>
                    <Trash
                        onClick={(e) => handleClickTrash(e)}
                        onMouseEnter={() => setIsTrashHovered(true)}
                        onMouseLeave={() => setIsTrashHovered(false)}
                        style={{ color: isTrashHovered ? "#FF7373" : "#b8b8b8" }}
                        size={20} />
                </div>
                <h6 className="card-subtitle mb-2 text-muted">{subtitle}</h6>
                <p className={`card-text ${styles.text_content}`}>{content}</p>
            </div>
        </div>
    )
}

