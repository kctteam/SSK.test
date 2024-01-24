const Card = ({ note, setEditNote, setDel }) => {
    const theEdit = () => {
        setEditNote(note);
    };
    const theDelete = () => {
        setDel(note);
    };
    return (
        <div className="col-12 col-lg-6 mb-3">
            <div className="card border-0 shadow-sm p-2 rounded-4">
                <div className="card-body">
                    <h5 className="card-title mb-3">{note.name}</h5>
                    {note.complite_at > 0 ? <p className="card-text small mb-0">Завершить {new Intl.DateTimeFormat("ru-RU", { year: "numeric", month: "2-digit", day: "2-digit", hour: "2-digit", minute: "2-digit", second: "2-digit" }).format(note.complite_at * 1000)}</p> : <></>}
                    {note.create_at > 0 ? <p className="card-text small mb-0">Создано {new Intl.DateTimeFormat("ru-RU", { year: "numeric", month: "2-digit", day: "2-digit", hour: "2-digit", minute: "2-digit", second: "2-digit" }).format(note.create_at * 1000)}</p> : <></>}
                    {note.modify_at > 0 && note.modify_at != note.create_at ? <p className="card-text small mb-0">Изменено {new Intl.DateTimeFormat("ru-RU", { year: "numeric", month: "2-digit", day: "2-digit", hour: "2-digit", minute: "2-digit", second: "2-digit" }).format(note.modify_at * 1000)}</p> : <></>}
                    <div className="mt-3">
                        <a onClick={theEdit} className="card-link cursor-pointer btn btn-sm btn-light me-2">
                            Редактировать
                        </a>
                        <a onClick={theDelete} className="card-link cursor-pointer btn btn-sm btn-light mx-0">
                            Удалить
                        </a>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Card;
