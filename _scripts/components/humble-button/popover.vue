/**
 * _scripts/components/humble-button/popover.vue
 * The popover container for humble stuff
 */

<template>
    <div class="container">
        <div class="content">
            <slot></slot>
        </div>
    </div>
</template>

<style scoped>
    .container {
        position: relative;
    }

    .content {
        background: white;
        border-radius: 5px;
        border: 1px solid #b1b1b1;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        color: #333;
        padding: 8px;
        position: absolute;
        right: -10px;
        text-align: left;
        top: 10px;
        width: 300px;
        z-index: 2;
    }

    .content::before,
    .content::after {
        border: 10px outset transparent;
        content: "";
        display: block;
        height: 0;
        left: 50%;
        margin-left: 26px;
        position: absolute;
        width: 0;
    }

    .content::before {
        border-bottom: 10px solid #b1b1b1;
        top: -20px;
    }

    .content::after {
        border-bottom: 10px solid white;
        top: -18px;
    }
</style>
