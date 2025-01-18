<div
    x-data="{
        show: false,
        message: 'default notification text',
        init() {
            window.addEventListener('show-notification', (e) => {
                this.message = e.detail.message;
                this.show = true;

                setTimeout(() => {
                    this.show = false;
                }, 1000)
            });
        }
    }"
    class="mt-4 bg-primaryWhite"
    x-cloak
>
    <p
        :class="show ? 'inline-block' : 'hidden'"
        class="bg-primaryGreen text-white min-w-[200px] px-4 py-2 rounded-lg"
        x-text="message"
    ></p>
</div>

