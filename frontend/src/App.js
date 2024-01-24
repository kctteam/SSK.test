import "./App.css";
import "bootstrap/dist/css/bootstrap.css";
import { getList, getDelete } from "./Api/Todo";
import { useEffect, useState } from "react";
import Card from "./Component/Card";
import Form from "./Component/Form";

function App() {
    const [notes, setNotes] = useState([]);
    const [editNote, setEditNote] = useState(null);
    const [del, setDel] = useState(null);
    useEffect(() => {
        getList()
            .then((res) => {
                setNotes(res.data);
            })
            .catch((err) => {
                console.log(err);
            });
    }, []);
    useEffect(() => {
        if (del) {
            getDelete(del.id).then(() => {
                notes.forEach((elementh, index) => {
                    if (elementh.id === del.id) {
                        let newNotes = [...notes];
                        newNotes.splice(index, 1);
                        setNotes(newNotes);
                    }
                });
            });
            setDel(null);
        }
    }, [del]);
    return (
        <div className="container pt-5">
            <div className="row">
                <div className="col-12 col-lg-8 pe-0 pe-lg-5">
                    <h2 className="mb-4">
                        <b>Todo list</b> <small className="text-muted ms-2">v.react</small>
                    </h2>
                    <div className="row">
                        {notes.length > 0 ? (
                            notes.map((note) => {
                                return <Card key={note.id} note={note} setEditNote={setEditNote} setDel={setDel} />;
                            })
                        ) : (
                            <div>
                                <p className="text-muted">Нет записей</p>
                            </div>
                        )}
                    </div>
                </div>
                <div className="col-12 col-lg-4 start pe-0 pe-lg-5 mt-5 mt-lg-0">
                    <Form editNote={editNote} setEditNote={setEditNote} setNotes={setNotes} />
                </div>
            </div>
        </div>
    );
}

export default App;
