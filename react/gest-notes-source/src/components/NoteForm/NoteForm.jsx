import ButtonPrimary from "components/ButtonPrimary/ButtonPrimary";
import styles from "./NoteForm.module.css"
import { PencilFill, TrashFill } from "react-bootstrap-icons";
import { useState } from "react";

export default function NoteForm({ isEditable = true, note, title, onClickEdit, onClickTrash, onSubmit}) {
    const [formValues, setFormValues] = useState(note || { title: "", content: ""})

    const updateFormValues = (e) => {
        setFormValues({...formValues, [e.target.name]: e.target.value})
    }

    const actionIcons = (
        <>
            {onClickEdit && <div onClick={onClickEdit} className="col-1">
                <PencilFill className={styles.icon} />
            </div>}
            {onClickTrash && <div onClick={onClickTrash} className="col-1">
                <TrashFill className={styles.icon} />
            </div>}
        </>
    )

    const titleInput = (
        <>
            <label className="form-label">Title</label>
            <input defaultValue={formValues.title} type="text" name="title" onChange={updateFormValues} className="form-control" />
        </>
    )

    const contentInput = (
        <>
            <label className="form-label">Content</label>
            <textarea defaultValue={formValues.content} type="text" name="content" onChange={updateFormValues} className="form-control" row="5" />
        </>
    )

    const submitButton = (
        <div className={styles.submit_btn}>
            <ButtonPrimary onClick={() => onSubmit(formValues)}>Submit</ButtonPrimary>
        </div>
    )
    return (
        <div className={styles.container}>
            <div className="row justify-content-space-between">
                <div className="col-10">
                    <h2 className="mb-3">{title}</h2>
                </div>
                {!isEditable && actionIcons}
            </div>
            {isEditable && <div className={`mb-3 ${styles.title_input_container}`}>{titleInput}</div>}
            <div className="mb-3">{isEditable ? contentInput: <pre className={styles.content}>{note.content}</pre>}</div>
            {onSubmit && submitButton}
        </div>
    )
}
