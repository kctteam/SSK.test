import { useEffect, useState } from "react";
import { postNote } from "../Api/Todo";

const Form = ({ editNote, setNotes, setEditNote }) => {
    const [note, setNote] = useState({ name: "Новая заметка", complite_at: "122" });
    useEffect(() => {
        clear();
    }, []);
    useEffect(() => {
        if (editNote) {
            var date = new Date(editNote.complite_at * 1000);
            setNote({ ...editNote, complite_at: new Intl.DateTimeFormat("ru-RU", { year: "numeric", month: "2-digit", day: "2-digit", hour: "2-digit", minute: "2-digit", second: "2-digit" }).format(date.getTime()) });
        }
    }, [editNote]);
    const save = () => {
        console.log("save");
        console.log(note);
        postNote(note).then((res) => {
            setNotes(res.data);
            clear();
        });
    };
    const clear = () => {
        var date = new Date();
        date.setDate(date.getDate() + 2);
        setNote({ name: "Новая заметка", complite_at: defaultComplite() });
        setEditNote(null);
    };
    const Header = () => {
        if (note.id) {
            return (
                <h2 class="mb-4">
                    Edit <small class="text-muted">#{note.id}</small>
                </h2>
            );
        } else {
            return <h2 className="mb-4">Create new</h2>;
        }
    };
    const Button = () => {
        if (note.id) {
            return (
                <>
                    <button className="btn btn-primary me-1" onClick={save}>
                        Сохранить
                    </button>
                    <button className="btn btn-primary" onClick={clear}>
                        Отмена
                    </button>
                </>
            );
        } else {
            return (
                <>
                    <button className="btn btn-primary me-1" onClick={save}>
                        Создать
                    </button>
                </>
            );
        }
    };
    const defaultComplite = () => {
        var date = new Date();
        date.setDate(date.getDate() + 2);
        return new Intl.DateTimeFormat("ru-RU", { year: "numeric", month: "2-digit", day: "2-digit", hour: "2-digit", minute: "2-digit", second: "2-digit" }).format(date.getTime());
    };

    return (
        <div>
            <Header />
            <div className="bg-white p-4 rounded-4 shadow-sm">
                <div className="mb-3">
                    <label className="form-label">Название</label>
                    <input
                        type="text"
                        className="form-control"
                        value={note.name}
                        onChange={(e) => {
                            setNote({ ...note, name: e.target.value });
                        }}
                    />
                </div>
                <div className="mb-3">
                    <label className="form-label">Дата завершения</label>
                    <input
                        type="text"
                        className="form-control"
                        value={note.complite_at}
                        onChange={(e) => {
                            setNote({ ...note, complite_at: e.target.value });
                        }}
                    />
                </div>
                <Button />
            </div>
        </div>
    );
};

export default Form;
