<?php

use \PHPUnit\Framework\TestCase;
use Galifax\Image;

class ImageTest extends TestCase 
{
    protected $backupGlobalsBlacklist = ['globalVariable'];

    /**
     * @runInSeparateProcess
     */
    // Проверка на скачивание изображения с рабочей ссылкой
    public function testDownload()
    {
        $this->assertTrue(Image::download('https://st2.depositphotos.com/2001755/5408/i/450/depositphotos_54081723-stock-photo-beautiful-nature-landscape.jpg'));
    }

    // Тест исключения на пустую ссылку
    public function testExceptionEmptyUrl()
    {
        $this->expectException(Exception::class);
        // Пустая ссылка
        Image::download();
    }

    // Тест исключения на страницу 404
    public function testExceptionNotFoundUrl()
    {
        $this->expectException(Exception::class);
        // // Неверная ссылка
        Image::download('https://st2.depositphotos.com/full-nature-landscape.jpg');
    }

    // Тест исключения неверный формат изобоажения
    public function testExceptionInvalidFormat()
    {
        $this->expectException(Exception::class);
        // // Неверный формат(svg)
        image::download('https://s.cdpn.io/3/kiwi.svg');
    }
    
}