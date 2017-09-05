<?php

namespace App\Lib\Html;

/**
 * _backend/Lib/Html/Image.php
 * Creates html source tags for responsive images.
 *
 * @example
 * ```
 * <picture>
 *     <?php echo Image::from('/images/screenshots/appcenter@2x-320.webp'); ?>
 *     <?php echo Image::from('/images/screenshots/appcenter@2x-640.webp'); ?>
 *     <?php echo Image::from('/images/screenshots/appcenter@2x-1280.webp'); ?>
 *     <?php echo Image::from('/images/screenshots/appcenter@2x.webp'); ?>
 *     <?php echo Image::from('/images/screenshots/appcenter-320.webp'); ?>
 *     <?php echo Image::from('/images/screenshots/appcenter-640.webp'); ?>
 *     <?php echo Image::from('/images/screenshots/appcenter.webp'); ?>
 *     <img src="images/screenshots/appcenter.png" alt="AppCenter Screenshot">
 * </picture>
 * ```
 */
class Image
{
    /**
     * Image path from project root.
     *
     * @var string
     */
    protected $path;

    /**
     * The width of the original image.
     *
     * @var int|null
     */
    protected $width;

    /**
     * The density of the image.
     *
     * @var int
     */
    protected $density;

    /**
     * Creates a new html image from a path. Uses magic to find other values.
     *
     * @param string   $path    Path from image directory
     * @param int|null $width   Number of pixels in width the original image is
     * @param int      $density
     *
     * @return static
     */
    public static function from($path, $width = null, $density = null)
    {
        if ($density == null) {
            $density = 1;
            $densityPos = strpos($path, '@');
            if ($densityPos !== false) {
                $density = (int) substr($path, $densityPos + 1, 1);
            }
        }

        if ($width == null) {
            preg_match('/-([0-9]{2,4})\./', $path, $matches);
            if (isset($matches[1]) !== false) {
                $width = (int) $matches[1];
            }
        }

        return new static($path, $width, $density);
    }

    /**
     * Creates a new html image.
     *
     * @param string   $path    Path from image directory
     * @param int|null $width   Number of pixels in width the original image is
     * @param int      $density
     */
    public function __construct($path, $width = null, $density = 1)
    {
        $this->path = $path;
        $this->width = $width;
        $this->density = $density;
    }

    /**
     * Returns the HTML source tag for the image.
     *
     * @return string
     */
    public function html()
    {
        $html = "<source srcset=\"{$this->path}\" media=\"";

        if ($this->density !== 1) {
            foreach (range(2, $this->density) as $density) {
                $adjuestedWidth = floor($this->width / $density);
                $dpi = ($density * 96);

                $minHtml = '';
                if ($this->width != null) {
                    $minHtml = "(max-width: {$adjuestedWidth}px) and ";
                }

                $html .= "{$minHtml} (-webkit-min-device-pixel-ratio: 2),";
                $html .= "{$minHtml} (min-resolution: {$density}dppx),";
                $html .= "{$minHtml} (min-resolution: {$dpi}dpi),";
            }
        } elseif ($this->width != null) {
            $html .= "(max-width: {$this->width}px)";
        }

        if (substr($html, -1) === ',') {
            $html = substr($html, 0, -1);
        }

        $html .= '">';

        return $html;
    }

    /**
     * Returns the HTML tag for the image.
     * NOTE: This is a PHP magic function.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->html();
    }
}
