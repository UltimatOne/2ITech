import { ListItem } from "../ListItem/ListItem";

export function List({ list }) {

    return (
        <div style={{ overflowY: "scroll", height: "40%" }}>
            <table className="table table-hover table-borderless">
                <tbody>
                    {list.map((item, key) => {
                        return (
                            <ListItem item={item} key={"item-" + key} />
                        )
                    })}
                </tbody>
            </table>
        </div>
    );
}
