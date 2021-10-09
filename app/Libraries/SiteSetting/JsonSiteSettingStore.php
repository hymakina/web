<?php
/**
 * Created by PhpStorm.
 * User: emrahar
 * Date: 25.01.2019
 * Time: 22:47
 */

namespace App\Libraries\SiteSetting;

use Illuminate\Filesystem\Filesystem;

class JsonSiteSettingStore extends SiteSettingStore
{

    public function __construct(Filesystem $files, $path)
    {
        $this->files = $files;
        $this->setPath($path);
    }

    /**
     * Set the path for the JSON file.
     *
     * @param string $path
     */
    private function setPath($path)
    {
        // If the file does not already exist, we will attempt to create it.
        if (!$this->files->exists($path)) {
            $result = $this->files->put($path, '{}');
            if ($result === false) {
                throw new \InvalidArgumentException("Could not write to $path.");
            }
        }

        if (!$this->files->isWritable($path)) {
            throw new \InvalidArgumentException("$path is not writable.");
        }

        $this->path = $path;
        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function read()
    {
        $contents = $this->files->get($this->path);

        $data = json_decode($contents, true);

        if ($data === null) {
            throw new \RuntimeException("Invalid JSON in {$this->path}");
        }

        return $data;
    }

    /**
     * {@inheritdoc}
     */
    protected function write(array $data)
    {
        if ($data) {
            $contents = json_encode($data);
        } else {
            $contents = '{}';
        }

        $this->files->put($this->path, $contents);
    }

}