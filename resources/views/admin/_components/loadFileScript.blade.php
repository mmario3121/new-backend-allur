<script>
    let loadFile = function (event) {
        let reader = new FileReader();
        reader.onload = function () {
            let output = document.getElementById('image-preview');
            output.style.display = 'block'
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };

    let loadFile2 = function (event, name) {
        let reader = new FileReader();
        reader.onload = function () {
            let output = document.getElementById('image-preview-' + name);
            output.style.display = 'block'
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };
</script>
