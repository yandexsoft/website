<?php

require_once __DIR__.'/_backend/preload.php';

$page['title'] = 'Reference Devices &sdot; elementary';

include $template['header'];
include $template['alert'];
?>

<div class="row">
    <h1>
        <?php
            // Embed the SVG to fix scaling in WebKit 1.x,
            // while preserving CSS options for the image.
            include __DIR__.'/images/logotype-os.svg';
        ?>
        Reference Devices
    </h1>
    <h4>What we use to develop</h4>
</div>

<div class="row devices">
    <div class="column third">
        <img src="https://system76.com/assets/products/galp2/feature.jpg" />
        <h3>Laptop</h3>
        <p>Thin and light aluminum with a HiDPI display, backlit keyboard, and lots of ports.</p>
    </div>

    <div class="column third">
        <img src="https://system76.com/assets/products/meer3/feature.jpg" />
        <h3>Desktop</h3>
        <p>Compact and efficient while packing a surprising punch.</p>
    </div>

    <div class="column third">
        <img src="http://i.dell.com/is/image/DellContent//content/dam/global-site-design/product_images/peripherals/output_devices/dell/monitors/u2715h/global_spi/monitor-u2715h-right-generic-hero-504x350.psd?fmt=png-alpha" />
        <h3>Display</h3>
        <p>Big, bright, beautiful, and accurate.</p>
    </div>
</div>

<div class="row features">
    <div class="column half">
        <h2>Features You Expect</h2>
        <p>As a reference platform, each device includes the modern features you'd expect from a new consumer device. Both feature a compact size, aluminum construction, built-in WiFi and Bluetooth, and USB Type-C standard. The laptop adds a HiDPI display, backlit keyboard, HD webcam, and multitouch trackpad.</p>
    </div>
    <div class="column half">
        <img src="https://system76.com/assets/products/galp3/right.jpg" />
    </div>
</div>

<div class="row engineering">
    <div class="column half">
        <img src="https://system76.com/assets/products/meer3/feature.jpg" />
    </div>
    <div class="column half">
        <h2>Quality Engineering</h2>
        <p>We chose each reference device for its build quality and compatibility with elementary OS (and the underlying Linux kernel). The manufacturers follow existing specs and work to ensure compatibility, making development and support easier.</p>
    </div>
</div>

<div class="row fast">
    <div class="column half">
        <h2>Insanely Fast</h2>
        <p>elementary OS is built to be fast, and it deserves insanely fast, modern hardware to let it really shine. We pair the fastest flash storage with the latest Intel Core processors and 16GB of memory for the snappiest experience.</p>
    </div>
    <div class="column half">
        <img src="https://system76.com/assets/products/meer3/small-but-fierce_wide_1280.jpg" />
    </div>
</div>

<div class="row tested">
    <div class="column half">
        <img src="https://system76.com/assets/products/galp3/pickup-1_2560.jpg" />
    </div>
    <div class="column half">
        <h2>Battle Tested</h2>
        <p>Use the same hardware we do to build elementary OS. Rest assured that it's going to last, be supported, and stay supported through updates.</p>
    </div>
</div>

<style>
    .row.devices img {

    }
</style>

<?php
include $template['footer'];
?>
