<template>
    <div id="app">
        <p>Amount of time since January 1, 1970</p>
        <div>
            <p>{{ days }} Days</p>
        </div>
        <div>
            <p>{{ hours }} Hours</p>
        </div>
        <div>
            <p>{{ minutes }} Minutes</p>
        </div>
        <div>
            <p>{{ seconds }} Seconds</p>
        </div>
    </div>
</template>

<script>
    export default {

        mounted() {
            window.setInterval(() => {
                this.now = Math.trunc((new Date()).getTime() / 1000);
            }, 1000);
        },
        data() {
            return {
                now: Math.trunc((new Date()).getTime() / 1000)
            }
        },
        computed: {
            seconds() {
                return (this.now) % 60;
            },

            minutes() {
                return Math.trunc((this.now) / 60) % 60;
            },

            hours() {
                return Math.trunc((this.now) / 60 / 60) % 24;
            },

            days() {
                return Math.trunc((this.now) / 60 / 60 / 24);
            }
        }
      }
</script>