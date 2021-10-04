<?php

namespace App\View;

use App\Exception\ApplicationException;

class View implements Renderable
{
    /*
     * Пример использования этого класса в контроллере:
     * return new View('homepage', ['title' => 'Index Page']);
     */
    private string $view;

    private array $data;

    /**
     * @param string $view
     * @param array $data
     */

    public function __construct(string $view, array $data)
    {
        $this->view = $view;
        $this->data = $data;
    }

    public function render()
    {
        extract($this->data);

        include $this->getIncludeTemplate($this->view);
        /*
         * метод должен выводить необходимый шаблон.
         * Внутри метода нужно распаковать данные свойства $data в переменные
         * (для этого просто примените функцию extract())
         *, а затем подключить страницу шаблона,
         * получив полный путь к ней с помощью другого метода этого класса getIncludeTemplate().
         */
    }

    private function getIncludeTemplate($view)
    {
        //var_dump($view);
        $file = VIEW_DIR . '/layout/' . str_ireplace('.', DIRECTORY_SEPARATOR, $view) . '.php';
        if (file_exists($file)){
            return $file;
        } else {

            throw new ApplicationException(sprintf('%s шаблон не найден', $view));
        }
        //$template =
        /*
         * метод должен сформировать абсолютный путь к файлу шаблона,
         * указанного в свойстве $view с использованием константы VIEW_DIR.
         * При этом в качестве шаблона можно указать строку personal.messages.show,
         * в этом случае метод должен подключить файл шаблона personal/messages/show.php,
         * который должен располагаться в директории view.
         */
    }
}