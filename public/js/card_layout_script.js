var stamp_icon_name = "";
var unstamp_icon_name = "";
var stamp_options = [];

multi_reward_check();
qr_check_on_load();

function addClassInClass(className, value) {
    $("." + className).html(""); // Clear the existing content
    this.stamp_icon_name = value;
    $("." + className).html(getIcon(this.stamp_icon_name)); // Set the new content
    $("." + className + "_display").html(getIcon(this.stamp_icon_name)); // Set the new content
    captureImage('stamp_area', 'strip_image_value', 'strip_image_preview');
}

function addClassInClassStamp(className, value) {
    $("." + className).html(""); // Clear the existing content
    this.stamp_icon_name = value;
    $("." + className).html(getStampIcon(this.stamp_icon_name)); // Set the new content
    $("." + className + "_display").html(getStampIcon(this.stamp_icon_name)); // Set the new content
    rander_stamps();
    rander_rewarded_stamps();
    captureImage('stamp_area', 'strip_image_value', 'strip_image_preview');
}

function addClassInClassUnstamp(className, value) {
    $("." + className).html(""); // Clear the existing content
    this.unstamp_icon_name = value;
    $("." + className).html(getUnstampIcon(this.unstamp_icon_name)); // Set the new content
    $("." + className + "_display").html(getUnstampIcon(this.unstamp_icon_name)); // Set the new content
    rander_rewarded_stamps();
    captureImage('stamp_area', 'strip_image_value', 'strip_image_preview');
}


function getIcon(value) {
    return `<i class='${value}'></i>`;
}
function getStampIcon(value) {
    const pickedStampsImage = $('.img-stamped');
    const srcAttributeValue = pickedStampsImage.attr('src');
    if (pickedStampsImage.length > 0 && srcAttributeValue !== "" && !srcAttributeValue.includes("img/logo.png")) {
        return pickedStampsImage[0].outerHTML;
    } else {
        return `<i class='${value} stamped'></i>`;
    }
}
function getUnstampIcon(value) {
    const pickedStampsImage = $('.img-unstamp');
    const srcAttributeValue = pickedStampsImage.attr('src');
    if (pickedStampsImage.length > 0 && srcAttributeValue !== "" && !srcAttributeValue.includes("img/logo.png")) {
        return pickedStampsImage[0].outerHTML;
    } else {
        return `<i class='${value} unstamped'></i>`;
    }
}

function rander_stamps() {
    var stamp_area = $("#stamp_area");
    var num = parseInt($('select[name="no_of_stamps"]').val());
    var reward_check = $('input[name="reward_type"]:checked').val(); //single or multi
    var reward_bg_color = $('input[name="reward_bg_color"]').val();
    var reward_border_color = $('input[name="reward_border_color"]').val();

    var return_data = [];
    if (reward_check == 'multi') {
        var reward_at_stamp_nos = $('[name="reward_at_stamp_no[]"]');
        for (var x = 1; x <= reward_at_stamp_nos.length; x++) {
            return_data[x] = parseInt(reward_at_stamp_nos[0].value);
        }
    }

    multi_reward_check();

    stamp_area.empty();
    for (let i = 1; i <= num; i++) {
        var class_name = "";
        if (return_data.includes(i)) {
            class_name = `circle w-[40px] h-[40px] rounded-[50%] border-[2px] flex justify-center`;
            style_tag = `background-color: ${reward_bg_color}; border-color: ${reward_border_color}`;
        }
        else {
            class_name = `circle w-[40px] h-[40px] rounded-[50%] border-[2px] flex justify-center bg-transparant`;
            style_tag = ``;
        }

        if (i <= num / 2) {
            stamp_area.append(
                `<div class="${class_name} stamped_circle" style="${style_tag}">
                ${getStampIcon(this.stamp_icon_name)}
                </div>`
            );
        } else {
            stamp_area.append(
                `<div class="${class_name} unstamped_circle" style="${style_tag}">
                ${getUnstampIcon(this.unstamp_icon_name)}
                </div>`
            );
        }
    }

    captureImage('stamp_area', 'strip_image_value', 'strip_image_preview');

    // stamped
    // =======
    // <div class="w-[40px] h-[40px] rounded-[50%] border-[2px] border-white flex items-center justify-center bg-transparant">
    // <img src="{{asset('user-dashboard/img/coffee-cup-light.svg')}}" alt="" class="rounded-[50%] h-[25px]">
    // </div>

    // unstamped
    // =========
    // <div class="w-[40px] h-[40px] rounded-[50%] border-[2px] border-white flex items-center justify-center bg-transparant">
    // <img src="{{asset('user-dashboard/img/coffee-cup-dull.svg')}}" alt="" class="rounded-[50%] h-[25px]">
    // </div>
}

function rander_rewarded_stamps() {
    var stamp_area = $("#stamp_area");
    var num = parseInt($('select[name="no_of_stamps"]').val());
    var reward_check = $('input[name="reward_type"]:checked').val(); //single or multi
    var reward_bg_color = $('input[name="reward_bg_color"]').val();
    var reward_border_color = $('input[name="reward_border_color"]').val();
    var stamp_image_color = $('input[name="stamp_image_color"]').val();
    var unstamp_image_color = $('input[name="unstamp_image_color"]').val();
    var stamps_circle_color = $('input[name="stamps_color"]').val();
    var stamps_circle_border_color = $('input[name="stamps_border_color"]').val();

    var selected_stamps = [];
    if (reward_check == 'multi') {
        var reward_at_stamp_nos = $('[name="reward_at_stamp_no[]"]');
        // if there is any dupblication in "reward_at_stamp_nos" in selected value then return the value in console
        // Check for duplicates in reward_at_stamp_nos array
        var seen = {};
        var hasDuplicates = false;

        for (var x = 0; x < reward_at_stamp_nos.length; x++) {
            var value = parseInt(reward_at_stamp_nos[x].value);

            if (seen[value]) {
                toastr.error(`Stamp number ${value} already selected`);
                var duplicate_stamp_object = $('[name="reward_at_stamp_no[]"]').filter(function () {
                    // Assuming you are working with a select element, use the :selected selector
                    return $(this).val() == value;
                });
                removeReward(duplicate_stamp_object[duplicate_stamp_object.length - 1]);
                hasDuplicates = true;
            } else {
                selected_stamps.push(value);
                seen[value] = true;
            }
        }

        for (var x = 1; x <= reward_at_stamp_nos.length; x++) {
            selected_stamps[x] = parseInt(reward_at_stamp_nos[x - 1].value);
        }
    }

    stamp_area.empty();
    for (let i = 1; i <= num; i++) {
        var class_name = "";
        var style_tag = "";
        if (selected_stamps.includes(i)) {
            class_name = `circle w-[40px] h-[40px] rounded-[50%] border-[2px] flex justify-center`;
            style_tag = `background-color: ${reward_bg_color}; border-color: ${reward_border_color}`;
        }
        else {
            class_name = `circle w-[40px] h-[40px] rounded-[50%] border-[2px] flex justify-center`;
            style_tag = `background-color:${stamps_circle_color};border-color:${stamps_circle_border_color};`;
        }

        if (i <= num / 2) {
            stamp_area.append(
                `<div class="${class_name} stamped_circle" style="${style_tag}; color:${stamp_image_color}">
                ${getStampIcon(this.stamp_icon_name)}
                </div>`
            );
        } else {
            stamp_area.append(
                `<div class="${class_name} unstamped_circle" style="${style_tag}; color:${unstamp_image_color}">
                ${getUnstampIcon(this.unstamp_icon_name)}
                </div>`
            );
        }
    }

    captureImage('stamp_area', 'strip_image_value', 'strip_image_preview');
}

function changeBgImage(from_id, to_class) {
    $("." + to_class).attr("src", "");
    var fileInput = $("#" + from_id)[0];

    if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $("." + to_class).attr("src", e.target.result);
        };

        reader.readAsDataURL(fileInput.files[0]);
    }
}

function change_circle_image(from_id, to_class) {
    $("." + to_class).empty();
    var fileInput = $("#" + from_id)[0];
    if (fileInput.files && fileInput.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $("." + to_class).append("<img class='h-[100%] w-[100%] rounded-full' src='" + e.target.result + "'>");
            captureImage('stamp_area', 'strip_image_value', 'strip_image_preview');
        };

        reader.readAsDataURL(fileInput.files[0]);

    }

    if (from_id == 'picked_stamps_image') {
        $("select[name='picked_stamps_icon']").prop('disabled', true);
    }
    else if (from_id == 'un_stamps_image') {
        $("select[name='un_stamps_icon']").prop('disabled', true);
    }
}

function changeBgImageSrc(from_id, to_class) {
    var src = $("#" + from_id).attr("src");
    $("." + to_class).attr("src", src);
}

function hexToRgb(hex) {
    // Remove the hash if it's there
    hex = hex.replace(/^#/, "");

    // Parse the hex value to RGB
    var bigint = parseInt(hex, 16);
    var r = (bigint >> 16) & 255;
    var g = (bigint >> 8) & 255;
    var b = bigint & 255;

    // Return the RGB representation
    return `rgb(${r}, ${g}, ${b})`;
}

// getting file name of stamp image

const handlestampImageChange = (image, image_name, cross_icon) => {

    const stampInput = document.getElementById(image)
    const stamp_Upload_Image_Name = document.getElementById(image_name)
    const stamp_Upload_cross_icon = document.getElementById(cross_icon)

    const crossIcon = document.createElement('i')

    crossIcon.className = 'bi bi-x';

    const stampFileName = stampInput.files[0].name

    stamp_Upload_Image_Name.innerHTML = stampFileName

    stamp_Upload_cross_icon.innerHTML = '';

    stamp_Upload_cross_icon.appendChild(crossIcon)

}


// delete uploaded stamp image



const delete_upload_stamp_image = (cross_icon, file_name_div, uploaded_img, circle, select_name) => {
    const stamp_Upload_cross_icon = document.getElementById(cross_icon)
    const stamp_Upload_Image_Name = document.getElementById(file_name_div)
    const stampedImageSrc = document.querySelectorAll('.' + uploaded_img);
    const stamped_circle = document.querySelectorAll('.' + circle);
    stamped_circle.forEach(circle => {
        circle.innerHTML = '';
    });
    captureImage('stamp_area', 'strip_image_value', 'strip_image_preview');



    stamp_Upload_cross_icon.innerHTML = '';
    stamp_Upload_Image_Name.innerHTML = '';

    stampedImageSrc.forEach(item => {
        item.src = '/img/logo.png';
    });



    $("select[name='" + select_name + "']").prop('disabled', false);

}

function empty_hero_bg() {
    $(".hero-bg").css({
        'background-image': 'url()'
    });
    captureImage('stamp_area', 'strip_image_value', 'strip_image_preview');

}




// function updateBgColorValueOfId(get_from, change_to_id, change_to_class) {
//     // Get the selected color value from the color picker
//     var selectedColor = document.getElementById(get_from).value;

//     // Convert the color from hex to RGB
//     var rgbColor = hexToRgb(selectedColor);

//     // Display the selected color value in the input field
//     document.getElementById(change_to_id).value = rgbColor;

//     $("." + change_to_class).css("background-color", rgbColor);
//     captureImage('stamp_area','strip_image_value', 'strip_image_preview');
// }

// function updateBgImage(input) {
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();

//         reader.onload = function (e) {
//             var imageUrl = e.target.result;

//             // Set background image and cover properties
//             $(".hero-bg").css({
//                 'background-image': 'url(' + imageUrl + ')',
//                 'background-size': 'cover',
//                 'background-position': 'center',
//             });

//             // You can store the image URL in a hidden input if needed
//             $("input[name='strip_bg_image']").val(imageUrl);
//         };

//         reader.readAsDataURL(input.files[0]);
//     }
// }

function updateBgColorValueOfId(get_from, change_to_id, change_to_class) {

    // Get the selected color value from the color picker
    var selectedColor = document.getElementById(get_from).value;

    // Convert the color from hex to RGB
    var rgbColor = hexToRgb(selectedColor);

    // Display the selected color value in the input field
    document.getElementById(change_to_id).value = rgbColor;

    // Remove background image
    $("." + change_to_class).css("background-image", "none");

    // Set background color
    $("." + change_to_class).css("background-color", rgbColor);

    // Clear the input type file value to allow reselection
    $("input[name='change_strip_bg_image']").val('');
    $("input[name='strip_bg_image']").val('');
    rander_rewarded_stamps();
    captureImage('stamp_area', 'strip_image_value', 'strip_image_preview');
}



function updateBgImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            var imageUrl = e.target.result;

            // Remove background color
            $(".hero-bg").css("background-color", "");

            // Set background image and cover properties
            $(".hero-bg").css({
                'background-image': 'url(' + imageUrl + ')',
                'background-size': 'cover',
                'background-position': 'center',
            });

            // You can store the image URL in a hidden input if needed
            $("input[name='strip_bg_image']").val(imageUrl);

            // Clear the color input value
            $("#strip_bg_color").val('');

            // Call captureImage after setting the background image
            captureImage('stamp_area', 'strip_image_value', 'strip_image_preview');
            changeBgImage('change_strip_bg_image', 'img-unstamped')
        };

        reader.readAsDataURL(input.files[0]);

        // Prevent form submission
        return false;
    }
}



function updateColorValueOfId(get_from, change_to_id, change_to_class) {
    // Get the selected color value from the color picker
    var selectedColor = document.getElementById(get_from).value;

    // Convert the color from hex to RGB
    var rgbColor = hexToRgb(selectedColor);

    // Display the selected color value in the input field
    document.getElementById(change_to_id).value = rgbColor;

    $("." + change_to_class).css("color", rgbColor);
    captureImage('stamp_area', 'strip_image_value', 'strip_image_preview');
}

function updateBorderColorValueOfId(get_from, change_to_id, change_to_class) {
    // Get the selected color value from the color picker
    var selectedColor = document.getElementById(get_from).value;

    // Convert the color from hex to RGB
    var rgbColor = hexToRgb(selectedColor);

    // Display the selected color value in the input field
    document.getElementById(change_to_id).value = rgbColor;

    $("." + change_to_class).css("border", "2px solid");
    $("." + change_to_class).css("border-color", rgbColor);
    rander_rewarded_stamps();
    captureImage('stamp_area', 'strip_image_value', 'strip_image_preview');
}

// function updateColorValueOfId(get_from, change_to_id, change_to_class) {
//     // Get the selected color value from the color picker
//     var selectedColor = document.getElementById(get_from).value;

//     // Convert the color from hex to RGB
//     var rgbColor = hexToRgb(selectedColor);

//     // Display the selected color value in the input field
//     document.getElementById(change_to_id).value = rgbColor;

//     $("." + change_to_class).css("color", rgbColor);
// }

function getValueFromInputIdToInnerHTML(input_id, inner_html_class) {
    const input = $("#" + input_id);
    const fillable_class = $("." + inner_html_class);
    fillable_class.html(input.val());
}

function updateExpiryDate() {
    const unitSelector = $("#unitSelector").val();
    const expiryNumber = parseInt($("#expiryNumber").val()) || 0;

    if ((unitSelector === 'month' && expiryNumber > 12) || (unitSelector === 'day' && expiryNumber > 31)) {
        $("#expiryNumber").val("");
        return;
    }

    const currentDate = new Date();

    switch (unitSelector) {
        case 'year':
            currentDate.setFullYear(currentDate.getFullYear() + expiryNumber);
            break;
        case 'month':
            currentDate.setMonth(currentDate.getMonth() + expiryNumber);
            break;
        case 'day':
            currentDate.setDate(currentDate.getDate() + expiryNumber);
            break;
        default:
            console.error('Invalid unit type');
            return;
    }

    const newDateString = currentDate.toISOString().split('T')[0];

    $("#expiryNumber").val(expiryNumber);
    $("#expiryDate").val(newDateString);
    $(".expiryDate").html(newDateString);
}

function navigateToSection(sectionId) {
    var section = document.getElementById(sectionId);

    if (section) {
        section.scrollIntoView({
            behavior: 'smooth',
            block: 'start',
            inline: 'nearest'
        });
    }
}


function captureImage(from_id, to_input_class, to_src_class) {
    html2canvas(document.querySelector("#" + from_id), {
        scale: 10
    }).then(canvas => {
        // Convert canvas to data URL
        var dataURL = canvas.toDataURL();

        // Set value of input element
        $("." + to_input_class).val(dataURL);

        // Set source of image element
        $("." + to_src_class).attr("src", dataURL);
    });
}

function captureImageForm(form, from_id, to_input_class, to_src_class) {
    html2canvas(document.querySelector("#" + from_id), {
        scale: 10
    }).then(canvas => {
        // Convert canvas to data URL
        var dataURL = canvas.toDataURL();

        // Set value of input element
        $("." + to_input_class).val(dataURL);

        // Set source of image element
        $("." + to_src_class).attr("src", dataURL);
        // $("#"+form).submit();
    });
}

function reward_type_check() {
    var inputValue = $('input[name="reward_type"]:checked').val();
    reward_type = inputValue;
    multi_reward_check();
}

function multi_reward_check() {
    reward_options();
    let no_of_stamps = $('input[name="no_of_stamps"]').val();
    var inputValue = $('input[name="reward_type"]:checked').val();
    reward_type = inputValue;
    if (reward_type == 'multi') {
        $('#multi_reward').show();
        $('#accordion-collapse-heading-4').show();
        if (no_of_stamps == null && no_of_stamps <= 0) {
            $("#multi_reward_msg").show();
            $("#multi_reward_input").hide();
            $("#multi_reward_input_add_button").hide();
        }
        else {
            $("#multi_reward_msg").hide();
            $("#multi_reward_input").show();
            $("#multi_reward_input_add_button").show();
        }
    }
    else {
        $('#multi_reward').hide();
        $('#accordion-collapse-heading-4').hide();
    }
    rander_rewarded_stamps();
}

function reward_options() {
    let no_of_stamps = $('select[name="no_of_stamps"]').val();
    if (no_of_stamps != null && no_of_stamps > 0) {
        var optionsData = [];
        for (var i = 1; i <= no_of_stamps; i++) {
            optionsData.push({
                value: i,
                text: i
            });
            this.stamp_options.push({
                value: i,
                text: i
            });
        }

        // Assuming this.stamp_options is your array
        this.stamp_options = this.stamp_options.filter((option, index, self) =>
            index === self.findIndex((o) => o.value === option.value)
        );

        var selectElement = $('.reward_options');
        selectElement.empty();
        $.each(this.stamp_options, function (index, option) {
            selectElement.append($('<option>', {
                value: option.value,
                text: option.text
            }));
        });

        // Select the last index
        selectElement.prop('selectedIndex', this.stamp_options.length - 1);
    }
}

function addReward() {
    // Clone the original div
    var originalDiv = $('#reward_input').first().clone(true);
    var selected_rewards = $('select[name="reward_at_stamp_no[]"]');
    let no_of_stamps = $('select[name="no_of_stamps"]').val();

    // Calculate the default value for the cloned select tag
    var defaultValue = Math.max(1, no_of_stamps - selected_rewards.length);

    // Set the default value for the cloned select tag
    originalDiv.find('select[name="reward_at_stamp_no[]"]').val(defaultValue);


    originalDiv.append(`<td><span class="btn btn-danger float-end" onclick="removeReward(this)"><i class="bi bi-trash3"></i></span></td>`);

    // Append the cloned div to the container
    $('#selected_rewards').append(originalDiv);

    var selected_rewards = $('select[name="reward_at_stamp_no[]"]');
    if (selected_rewards.length >= 4) {
        $("#multi_reward_input_add_button").hide();
    }
    else {
        $("#multi_reward_input_add_button").show();
    }

    rander_rewarded_stamps();
}

function removeReward(element) {
    // Remove the parent div of the clicked "Remove" button
    $(element).closest('tr').remove();

    var count = $('select[name="reward_at_stamp_no[]"]');
    if (count.length >= 4) {
        $("#multi_reward_input_add_button").hide();
    }
    else {
        $("#multi_reward_input_add_button").show();
    }

    rander_rewarded_stamps();
}

function qr_check_on_load() {
    let qr_type = $('input[name="qr_type"]:checked').val();
    switch (qr_type) {
        case "qr_code":
            changeBgImageSrc('qr_code_image', 'barcode_img_2');
            $('[data-qr="qr_code"]').addClass('active');
            break;
        case "aztec":
            changeBgImageSrc('AZTEC_img', 'barcode_img_2');
            $('[data-qr="aztec"]').addClass('active');
            break;
        case "pdf_417":
            changeBgImageSrc('pdf417_image', 'barcode_img_2');
            $('[data-qr="pdf417"]').addClass('active');
            break;
        case "code_128":
            changeBgImageSrc('Code128_image', 'barcode_img_2');
            $('[data-qr="Code128"]').addClass('active');
            break;
    }
}

const changeImage = async (img) => {
    try {
        let image = $(img).attr('data-img');
        $(img).hasClass('stamp-icons') ? $('#picked_stamps').attr('src', `${image}`) : $('#unpicked_stamps').attr('src', `${image}`);

        $(img).hasClass('stamp-icons') ? $('#stamped_icon').val(`${image}`) : $('#unstamped_icon').val(`${image}`);

    } catch (error) {
        console.log(error);
    }
}
