<?php
namespace Galifax;

// Класс загрузки изображения в файловую систему
class Image
{
    protected static $path; // Путь к директории временного хранение изображения

    protected static $name; // название изображения

    public static function download($url = '')
    {
        if ($url != '') {
            $img_url = $url; // Cсылка на картинку
            $Headers = @get_headers($img_url); // Волучаем заголовки из ответа сервера на HTTP-запрос

            // Проверка на существование картинки
            if (preg_match("|200|", $Headers[0])) {
                // Проверка на существование картинки
                $image = file_get_contents($img_url); // Получение информации об изображении
                $ext = substr($url, -3); // Получение формата изображения

                self::$name = uniqid() . '.' . $ext;
                // Проверка доступного фррмата изображения
                if ($ext == 'png' || $ext == 'jpg' || $ext == 'gif') {
                    // Путь для временного хранения изображения
                    $path = __DIR__ . '/../static/' . self::$name;
                    // Сохранение картинки на диск
                    file_put_contents($path, $image);
                    // Заставляем браузерпоказать окно сохранения файла
                    header('Content-Description: File Transfer');
                    header('Content-Type: application/octet-stream');
                    header('Content-Disposition: attachment; filename=' . basename(self::$name));
                    header('Content-Transfer-Encoding: binary');
                    header('Expires: 0');
                    header('Cache-Control: must-revalidate');
                    header('Pragma: public');
                    header('Content-Length: ' . filesize($path));
                    // Чтение изображения
                    readfile($path);
                    // Удаление мзображение с диска
                    unlink($path);
                    // Прекращение выполнение скрипта
                    return true;
                    exit;

                } else {
                    throw new \Exception('Недоступный формат');
                }
            } else {
                // Ошибка, если картинка не найдена
                throw new \Exception('Изображение не найдено');
            }
        } else {
            throw new \Exception('Cсылка не должна быть пустой');
        }
    }

}
