import s from "./style.module.css";

export function ListItem({ item }) {

    return (
        <tr className={s.item}>
            <th>{item.name || ""}</th>
            <td className={s.price}>{item.price || ""} $</td>
        </tr>
    );
}
