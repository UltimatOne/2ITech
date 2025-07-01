import { useState } from "react";
import s from "./MenuListItem.module.css"

export default function MenuListItem({className, difficulty, isSelected, updateDifficulty}) {
    const [isHovered, setIsHovered] = useState(false);

    function getBackgroundColor() {
        if (isHovered) {
            return "#a5e9ff"
        } else if(isSelected) {
            return "#26baea"
        }
        return "#eff0ef"
    }

    return (
        <div
            style={{ background: getBackgroundColor()}}
            className={className || s.menuListItem}
            onMouseEnter={() => setIsHovered(true)}
            onMouseLeave={() => setIsHovered(false)}
            onClick={() => updateDifficulty(difficulty)}
        >
            Set to : {difficulty}
        </div>
    );
}
