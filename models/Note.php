<?php
//Обрабатываемая модель - логика записи
class Note
{
    public $edit = false; //Отметка о редактировании модели
    public static $keys = ['id' => 'id', 'name' => "Название", 'create_at' => "Дата создания", 'modify_at' => 'Дата изменения', 'complite_at' => "Дата завершения"]; //Хранимые ключи и их названия
    public static $visible = ['name', 'complite_at']; //Редактируемые пользователями поля
    public static $default = ['id' => 'id', 'name' => "Новая заметка", 'create_at' => "Дата создания", 'modify_at' => 'Дата изменения', 'complite_at' => "Дата завершения"]; //Значения полей по умолчанию
    public $values = []; //Хранимые значения

    function __construct($values = null)
    {
        if ($values) {
            $this->values = $values;
        }
        foreach (Note::$keys as $key => $value) {
            if (!isset($this->values[$key])) {
                switch ($key) {
                    case 'id':
                        $this->values[$key] = uniqid();
                        break;
                    case 'create_at':
                    case 'modify_at':
                        $this->values[$key] = date("U");
                        break;
                    case 'complite_at':
                        $this->values[$key] = date("U", strtotime("+ 2 day"));
                        break;
                    default:
                        $this->values[$key] = (isset(Note::$default[$key])) ? Note::$default[$key] : "";
                        break;
                }
            }
        }
    }
}
