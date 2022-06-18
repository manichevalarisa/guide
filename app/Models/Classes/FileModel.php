<?php

namespace App\Models\Classes;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;

class FileModel extends Model
{
    /**
     * The location of the place where file should be stored.
     *
     * @var string
     */
    protected $location = 'layouts';

    /**
     * The location of the place where view should be stored (in view format).
     *
     * @var string
     */
    protected $locationView = 'layouts';

    /**
     * Get content from file.
     *
     * @param string $defaultLocation
     * @return string
     */
    public function getContent(string $defaultLocation = null)
    {
        $content = is_null($defaultLocation) ? '' : file_get_contents(Config::get('view.paths')[0] . $defaultLocation);
        try {
            $content = file_get_contents($this->file_name);
        } catch (\Exception $exception) {
        }
        $content = $content ?? '';
        return $content;
    }

    /**
     * Save the new model to the database & save the file with html.
     *
     * @param string $content
     * @return void
     */
    public function createNew(string $content)
    {
        $fileName = $this->slug ?? ($this->name . '_' . time());
        $view = $this->locationView . '.' . $fileName;
        $path = Config::get('view.paths')[0] . '/' . $this->location;
        $fileName = $path . '/' . $fileName . '.blade.php';

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        file_put_contents($fileName, $content);

        $this->view_name = $view;
        $this->file_name = $fileName;
    }

    /**
     * Save the model to the database.
     *
     * @param array $options
     * @return bool
     */
    public function save(array $options = [])
    {
        $changes = $this->getDirty();
        if (key_exists('content', $changes)) {
            if ($this->id && $this->file_name) file_put_contents($this->file_name, $changes['content']);
            else $this->createNew($changes['content']);
        }
        unset($this->content);
        return parent::save($options);
    }

    /**
     * Delete the model from the database.
     *
     * @return bool|null
     *
     * @throws \Exception
     */
    public function delete()
    {
        try {
            unlink($this->file_name);
        } catch (\Exception $e) {
        }
        return parent::delete();
    }
}
