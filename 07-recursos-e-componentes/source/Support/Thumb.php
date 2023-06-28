<?php

namespace Source\Support;

use CoffeeCode\Cropper\Cropper;

/**
 * Class Thumb
 * @package Source\Support
 */
class Thumb
{
    /** @var Cropper */
    private $cropper;

    /** @var string */
    private $uploads;
    
    /**
     * __construct
     *
     * @return void
     */
    public function __construct()
    {
        $this->cropper = new Cropper(CONF_IMAGE_CACHE, CONF_IMAGE_QUALITY['jpg'], CONF_IMAGE_QUALITY['png']);
        $this->uploads = CONF_UPLOAD_DIR;
    }
    
    /**
     * make
     *
     * @param  mixed $image
     * @param  mixed $width
     * @param  mixed $height
     * @return string
     */
    public function make(string $image, int $width, int $height = null): string
    {
        return $this->cropper->make("{$this->uploads}/{$image}", $width, $height);
    }
    
    /**
     * flush
     *
     * @param  mixed $image
     * @return void
     */
    public function flush(string $image = null): void
    {
        if ($image) {
            $this->cropper->flush("{$this->uploads}/{$image}");
            return;
        }

        $this->cropper->flush();
        return;
    }
    
    /**
     * cropper
     *
     * @return Cropper
     */
    public function cropper(): Cropper
    {
        return $this->cropper;
    }
}