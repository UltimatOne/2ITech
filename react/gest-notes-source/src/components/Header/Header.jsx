import ButtonPrimary from "components/ButtonPrimary/ButtonPrimary";
import styles from "./Header.module.css"
import { Logo } from "components/Logo/Logo";
import logo from "../../assets/images/logo.png"

export default function Header() {
    return (
        <div className={`row ${styles.container}`}>
            <div className="col-xs-12 col-sm-4">
                <Logo title="Note-Gestion" subtitle="Manage your notes" image={logo} />
            </div>
            <div className="col-xs-12 col-sm-8 text-end">
                <ButtonPrimary>Add note +</ButtonPrimary>
            </div>
        </div>
    );
}
