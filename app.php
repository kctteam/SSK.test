<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');

// NOTE: Импорт моделей
include("models/Notes.php"); //Хранилище и действия над содержимым
include("models/Note.php"); //Обрабатываемая модель - логика записи

//Загрузка содержимого
Notes::load();

//Обработка сохранения
if ($_POST) {
    $editNote = new Note($_POST);
    if ($_POST['complite_at']) {
        $editNote->values['complite_at'] = date('U', strtotime($_POST['complite_at']));
    }
    $editNote->values['modify_at'] = date('U');
    Notes::$notes[$editNote->values['id']] = $editNote;
    Notes::save();
    if (isset($_GET) && $_GET['type'] == "api") {
        echo Notes::json();
        exit();
    }
    header('Location: /');
    exit;
}

//Обработка действий
if ($_GET && isset($_GET['action'])) {
    switch ($_GET['action']) {
            //Обработка удаления
        case 'delete':
            Notes::delete($_GET['id']);
            if (isset($_GET) && $_GET['type'] == "api") exit();
            header('Location: /');
            exit;
            break;
            //Обработка редактирование
        case 'edit':
            $editNote = Notes::$notes[$_GET['id']];
            $editNote->edit = true;
            break;
        case 'list':
            echo Notes::json();
            break;
    }
} else {
    //Подготовка базовой модели
    $editNote = new Note();
}
