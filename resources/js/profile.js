document.addEventListener("DOMContentLoaded", function() {
    const photoInput = document.querySelector('#profile-photo');
    if (photoInput) {
        photoInput.addEventListener('change', function(e) {
            if (this.value != '' && e.target.files.length > 0) {
                this.parentNode.previousElementSibling.textContent = 'Выбрано фото ' + e.target.files[0].name;
                const photoUrl = URL.createObjectURL(e.target.files[0]);
                const preview = document.querySelector('#profile-photo-preview');
                preview.src = photoUrl;
            } else {
                this.parentNode.previousElementSibling.textContent = 'Выберите фото...';
            }
        });
    }
}, false);