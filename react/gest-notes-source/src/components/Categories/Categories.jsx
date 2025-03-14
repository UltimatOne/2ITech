import styles from "./Categories.module.css"

export default function Categories({ categories, onClick = () => { }, selectedCategory }) {

    return (
        <aside className={`card" ${styles.container}`}>
            {selectedCategory === ""
                ? <p onClick={() => onClick("")} style={{ color: "black", textDecoration: "underline" }} >Toutes les catégories</p>
                : <p onClick={() => onClick("")} className={styles.category}>Toutes les catégories</p>
            }
            {categories?.map((category, key) => {
                if (category.id === selectedCategory) {
                    return <p key={key}  onClick={() => onClick(category.id)} style={{ color: "black", textDecoration: "underline" }}>{category.title}</p>
                } else {
                    return <p key={key} className={styles.category} onClick={() => onClick(category.id)}>{category.title}</p>
                }
            })}
        </aside>
    );
}
