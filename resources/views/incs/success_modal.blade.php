@if(session()->has('success'))
    <div id="modal" class="modal">
        <div class="modal__window">
            <div class="modal__close-wrapper">
                <button id="modalClose" class="modal__close-btn"></button>
            </div>
            <div class="modal__body">
                <p class="modal_message">{{ session('success') }}</p>
            </div>
        </div>
    </div>
    @endif