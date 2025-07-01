import React from 'react';
import s from "./MenuList.module.css"
import MenuListItem from '../menuListItem/MenuListItem';
import { menuListValues } from '../menuListItem/menuListValues';

export default  function MenuList({className, difficulty, updateDifficulty}) {

    return (
        <div className={className || s.menuList}>
            {menuListValues.map((item, key) => {
                return <MenuListItem key={key} difficulty={item} isSelected={difficulty === item} updateDifficulty={updateDifficulty}/>
            })}
        </div>
    );
}
