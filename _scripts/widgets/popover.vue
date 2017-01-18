<!--
 - _scripts/widgets/popover.js
 - Creates a generaic togglable popover
 -
 - @exports {Object} default - vue popover component
-->

<script>
    export default {
        props: {
            placement: {
                type: String,
                default: 'north',
                validator: (value) => ['north', 'south'].indexOf(value) !== -1
            },

            // margin is the number of pixels to offset the popover from the
            // trigger
            margin: {
                type: Number,
                default: 20
            }
        },

        data () {
            return {
                'visible': false,

                'top': false,
                'right': false,
                'bottom': false,
                'left': false
            }
        },

        computed: {
            // classObject dynamicly adds classes to the popover class based on
            // calculated values
            classObject () {
                const classes = {}

                // creates a class like `popover--north` or `popover--south`
                classes[`popover--${this.placement}`] = true

                return classes
            },

            // styleObject dynamicly adds styles to the popover. This is mostly
            // used for setting alignment
            styleObject () {
                const styles = {}

                styles['top'] = this.top
                styles['right'] = this.right
                styles['bottom'] = this.bottom
                styles['left'] = this.left

                return styles
            }
        },

        methods: {
            toggle () {
                if (this.visible) {
                    this.hide()
                } else {
                    this.show()
                }
            },

            show () {
                this.visible = true
                document.body.style.overflow = 'hidden'

                this.getAlignment()
            },

            hide () {
                this.visible = false
                document.body.style.overflow = 'visible'
            },

            // getAlignment calculates what the top and left style values should
            // be. It is called on resize and scroll.
            getAlignment () {
                const trigger = this.$el
                const content = this.$el.querySelector('.popover__content')

                // setTimeout gives enough time for the element to change `display`
                // and get a width calculcated from the browser
                setTimeout(() => {
                    switch (this.placement) {
                        case 'north':
                            this.top = false
                            this.right = false
                            this.bottom = Math.floor(trigger.offsetHeight + this.margin) + 'px'
                            this.left = Math.floor(-(content.offsetWidth / 2) + (trigger.offsetWidth / 2)) + 'px'
                            break

                        case 'south':
                            this.top = Math.floor(trigger.offsetHeight + this.margin) + 'px'
                            this.right = false
                            this.bottom = false
                            this.left = Math.floor(-(content.offsetWidth / 2) + (trigger.offsetWidth / 2)) + 'px'
                            break
                    }
                }, 0)
            },

            // onGlobalClick handles any browser clicks to determine if the
            // popover should hide or not.
            onGlobalClick (e) {
                if (!this.$el.contains(e.target)) {
                    this.hide()
                }
            }
        },

        created () {
            document.addEventListener('click', this.onGlobalClick)
        },

        beforeDestroy () {
            document.removeEventListener('click', this.onGlobalClick)
        }
    }
</script>

<template>
    <div class="popover" v-bind:class="classObject">
        <div class="popover__trigger" v-on:click="toggle">
            <slot name="trigger">
                <a href="#">toggle</a>
            </slot>
        </div>

        <transition name="slide-fade">
            <div class="popover__container" v-bind:style="styleObject" v-show="visible">
                <div class="popover__content">
                    <slot name="content"></slot>
                </div>
            </div>
        </transition>
    </div>
</template>

<style>
    /*************************
    * Default popover styles *
    *************************/
    .popover {
        display: inline-block;
        position: relative;
    }

    .popover__trigger {
        cursor: pointer;
    }

    .popover__container {
        background: white;
        border-radius: 5px;
        border: 1px solid rgba(0, 0, 0, 0.2);
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        color: #333;
        overflow: visible;
        position: absolute;
        text-align: left;
        z-index: 2;
    }

    .popover__container::before,
    .popover__container::after {
        border: 10px outset transparent;
        content: "";
        display: block;
        height: 0;
        position: absolute;
        width: 0;
    }

    .popover__content {
        overflow: auto;
    }

    /*****************************
    * Popover transition classes *
    *****************************/
    .slide-fade-enter-active,
    .slide-fade-leave-active {
        opacity: 1;
        transition: opacity 250ms ease;
    }

    .slide-fade-enter,
    .slide-fade-leave-active {
        opacity: 0;
    }

    /****************************
    * Popover alignment classes *
    ****************************/
    .popover--north .popover__container::before,
    .popover--north .popover__container::after,
    .popover--south .popover__container::before,
    .popover--south .popover__container::after {
        left: 50%;
        margin-left: -5px;
    }

    .popover--north .popover__container::before {
        border-top: 10px solid rgba(0, 0, 0, 0.2);
        bottom: -20px;
    }

    .popover--north .popover__container::after {
        border-top: 10px solid white;
        bottom: -18px;
    }

    .popover--south .popover__container::before {
        border-bottom: 10px solid rgba(0, 0, 0, 0.2);
        top: -20px;
    }

    .popover--south .popover__container::after {
        border-bottom: 10px solid white;
        top: -18px;
    }
</style>
