<?php
//Хранилище и действия над содержимым
class Notes
{
    public static $notes = [];
    //Загрузка
    public static function load()
    {
        if (file_exists('save.json')) {
            $json = json_decode(file_get_contents('save.json'), true);
            if ($json) {
                foreach ($json as $key => $value) {
                    Notes::$notes[$value['id']] = new Note($value);
                }
            }
        }
    }
    //Сохранение
    public static function save()
    {
        $json = [];
        foreach (self::$notes as $key => $note) {
            $json[] = $note->values;
        }
        file_put_contents('save.json', json_encode($json, JSON_UNESCAPED_UNICODE));
    }
    //Удаление
    public static function delete($id)
    {
        unset(self::$notes[$id]);
        self::save();
    }
}
