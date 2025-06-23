<div>
    <div>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div>
        <div class="container mb-3">
            <div class="row mt-5">
                <label for="qr_code" class="col-md-6 p-2 "  onclick="changeBgImageSrc('qr_code_image','barcode_img_2')">
                    <div class="box qr_box text-center p-2 cursor_pointer change_qr rounded-lg" data-qr="qr_code" data-type="big" >
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('img/qr_A.png') }}" alt="" class="img-fluid" id="qr_code_image" />
                        </div>
                        <div class="text-pink">
                            <span>Qr Code</span>
                        </div>
                    </div>
                </label>
                <label for="aztec" class="col-md-6 p-2" onclick="changeBgImageSrc('AZTEC_img','barcode_img_2')" >
                    <div class="box qr_box text-center p-2 cursor_pointer change_qr rounded-lg" data-qr="aztec" data-type="big" >
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('img/qr_B.png') }}" alt="" class="img-fluid" id="AZTEC_img" />
                        </div>
                        <div class="text-pink">
                            <span>AZTEC</span>
                        </div>
                    </div>
                </label>
                <label for="pdf_417" class="col-md-6 p-2" onclick="changeBgImageSrc('pdf417_image','barcode_img_2')" >
                    <div class="box qr_box text-center p-2 cursor_pointer change_qr rounded-lg" data-qr="pdf417" data-type="small" >
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('img/b1.png') }}" alt="" class="img-fluid" id="pdf417_image" />
                        </div>
                        <div class="text-pink">
                            <span>PDF 417</span>
                        </div>
                    </div>
                </label>
                <label for="code_128" class="col-md-6 p-2" onclick="changeBgImageSrc('Code128_image','barcode_img_2')" >
                    <div class="box qr_box text-center p-2 cursor_pointer change_qr rounded-lg" data-qr="Code128"
                        data-type="small" >
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('img/b2.png') }}" alt="" class="img-fluid" id="Code128_image" />
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="text-pink">
                                <span>CODE 128</span>
                            </div>
                        </div>
                    </div>
                </label>
            </div>

            <input type="radio" name="qr_type" value="qr_code" {{ old('qr_type') == 'qr_code' ? 'checked':'checked' }} id="qr_code" class="d-none">
            <input type="radio" name="qr_type" value="aztec" {{ old('qr_type') == 'aztec' ? 'checked':'' }} id="aztec" class="d-none">
            <input type="radio" name="qr_type" value="pdf_417" {{ old('qr_type') == 'pdf_417' ? 'checked':'' }} id="pdf_417" class="d-none">
            <input type="radio" name="qr_type" value="code_128" {{ old('qr_type') == 'code_128' ? 'checked':'' }} id="code_128" class="d-none">
        </div>
    </div>
</div>

@push('style')
<style>
    .box.active {
    background-color: rgba(0, 0, 0,0.2);
    }

    </style>
@endpush
@push('script')
<script>

document.addEventListener("DOMContentLoaded", function () {
    let labels = document.querySelectorAll('.box');


    labels.forEach(function (label) {
        label.addEventListener('click', function () {

            let qrType = label.getAttribute('data-qr');
            let qrSize = label.getAttribute('data-type');

            changeBgImageSrc(qrType + '_image', 'barcode_img_2');

            labels.forEach(function (label) {
                label.classList.remove('active');
            });

            label.classList.add('active');
        });
    });
});

function changeBgImageSrc(imageId, newSrc) {
    let image = document.getElementById(imageId);
    if (image) {
        image.src = newSrc;
    }
}
</script>

@endpush

