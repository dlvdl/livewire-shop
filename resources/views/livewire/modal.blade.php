<dialog
    x-data="{
        init() {
            Livewire.on('open-modal', () => {
                const modal = document.getElementById('my_modal_1');
                modal.showModal();
            });
        },
        handleCloseButtonClick() {
            window.location.pathname = '/';
        }
    }"
    id="my_modal_1" class="modal">
    <div class="modal-box bg-primaryGreen">
        <h3 class="text-lg font-bold">Your order ok</h3>
        <p class="py-4">Press ESC key or click the button below to close</p>
        <div class="modal-action">
            <form method="dialog">
                <button @click="handleCloseButtonClick" class="btn">Return to shopping</button>
            </form>
        </div>
    </div>
</dialog>
