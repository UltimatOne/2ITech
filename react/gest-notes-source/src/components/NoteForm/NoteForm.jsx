import ButtonPrimary from "components/ButtonPrimary/ButtonPrimary"
import styles from "./NoteForm.module.css"
import { ArrowLeft, PencilFill, TrashFill, XCircleFill } from "react-bootstrap-icons"
import { useState } from "react";

export default function NoteForm({ isEditable = true, note, categories, title, onClickEdit, onClickTrash, onSubmit, close, closeArrow }) {
    const [isCloseHovered, setIsCloseHovered] = useState(false)
    const [isPencilHovered, setIsPencilHovered] = useState(false)
    const [isTrashHovered, setIsTrashHovered] = useState(false)
    const [isArrowLeftHovered, setIsArrowLeftHovered] = useState(false)
    console.log("note", note)
    console.log("categories", categories)

    const [formValues, setFormValues] = useState(note || { title: "", content: "", category_id: "" })
    const [formError, setformError] = useState({ title: "", content: "", category_id: "" })

    const updateFormValues = (e) => {
        const { name, value } = e.target
        setFormValues({ ...formValues, [name]: value })
        validateField(name, value)
    }

    const validateField = (name, value) => {
        let error = ""
        if (value.trim() === "") {
            error = "Ce champs est nécessaire"
        } else if (value.length < 3 && name !== "category_id") {
            error = "Ce champs doit contenir 3 caractères minimum"
        }
        setformError((prevError) => ({ ...prevError, [name]: error }))
    }

    const actionIcons = (
        <>
            <div onClick={closeArrow} className="col-1">
                <ArrowLeft
                    size={20}
                    className={styles.icon}
                    onMouseEnter={() => setIsArrowLeftHovered(!isArrowLeftHovered)}
                    onMouseLeave={() => setIsArrowLeftHovered(!isArrowLeftHovered)}
                    color={isArrowLeftHovered ? "#00000" : "#b8b8b8"}
                />
            </div>
            {onClickEdit && <div onClick={onClickEdit} className="col-1">
                <PencilFill
                    className={styles.icon}
                    onMouseEnter={() => setIsPencilHovered(!isPencilHovered)}
                    onMouseLeave={() => setIsPencilHovered(!isPencilHovered)}
                    color={isPencilHovered ? "#00000" : "#b8b8b8"}
                />
            </div>}
            {onClickTrash && <div onClick={onClickTrash} className="col-1">
                <TrashFill
                    className={styles.icon}
                    onMouseEnter={() => setIsTrashHovered(!isTrashHovered)}
                    onMouseLeave={() => setIsTrashHovered(!isTrashHovered)}
                    color={isTrashHovered ? "#FF7373" : "#b8b8b8"}
                />
            </div>}
        </>
    )

    const titleInput = (
        <div>
            <label className="form-label">Title</label>
            <input defaultValue={formValues.title} type="text" name="title" onChange={updateFormValues} className="form-control" />
            {formError.title && <p className="text-danger">{formError.title}</p>}
        </div>
    )

    const contentInput = (
        <div>
            <label className="form-label">Content</label>
            <textarea defaultValue={formValues.content} type="text" name="content" onChange={updateFormValues} className="form-control" row="5" />
            {formError.content && <p className="text-danger">{formError.content}</p>}
        </div>
    )

    const categorySelect = (
        <div>
            <label className="form-label">Category</label>
            <select defaultValue={formValues.category_id} type="text" name="category_id" onChange={updateFormValues} className="form-control">
                {!note
                    ? <>
                        <option value="" selected>-----------</option>
                        {categories?.map((category, key) => {
                            return <option key={key} value={category.id}>{category.title}</option>
                        })}
                    </>
                    : <>
                        <option value="">-----------</option>
                        {categories?.map((category, key) => {
                            if (category.id === note.category_id) {
                                return <option key={key} value={category.id} selected>{category.title}</option>
                            } else {
                                return <option key={key} value={category.id}>{category.title}</option>
                            }
                        })}
                    </>
                }
            </select>
            {formError.category_id && <p className="text-danger">{formError.category_id}</p>}
        </div>
    )

    const submitButton = (
        <div className={styles.submit_btn}>
            <ButtonPrimary onClick={() => onSubmit(formValues)}>Submit</ButtonPrimary>
        </div>
    )

    return (
        <div className={styles.container}>
            <div className="row justify-content-space-between">
                <div className="col-9">
                    <h2 className="mb-3">{title}</h2>
                </div>
                {isEditable
                    ? <div onClick={close} className="col-1">
                        <XCircleFill
                            onMouseEnter={() => setIsCloseHovered(!isCloseHovered)}
                            onMouseLeave={() => setIsCloseHovered(!isCloseHovered)}
                            color={isCloseHovered ? "#FF7373" : "#b8b8b8"}
                            size={40}
                            className={styles.close}
                        />
                    </div>
                    : actionIcons
                }
            </div>
            {isEditable && <div className={`mb-3 ${styles.title_input_container}`}>{titleInput}</div>}
            {isEditable && <div className={`mb-3 ${styles.title_input_container}`}>{categorySelect}</div>}
            <div className="mb-3">{isEditable ? contentInput : <pre className={styles.content}>{note.content}</pre>}</div>
            {onSubmit && !formError.title && !formError.content && formValues.title && formValues.content && submitButton}
        </div>
    )
}
