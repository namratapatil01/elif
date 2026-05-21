<link rel="stylesheet" type="text/css" href="<?php echo base_url('backend/toast-alert/toastr.css'); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/23.1.0/css/intlTelInput.css"
    integrity="sha512-OkSoWyaoScjXhOm87XO5hDz1E5buvm2aAkq+5zJmaYpylA0OKJ5no5qc4ZRrmApoaXEgXc3n0iyVS1q5FgiJjg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
    .badge-danger-soft {
        background-color: rgba(220, 53, 69, .1);
        color: #dc3545;
    }

    .badge {
        font-size: 13px;
        padding: 5px 20px;
        margin: 5px;
        line-height: 1.6;
    }

    .badge-success-soft {
        background-color: rgba(0, 128, 0, .1);
        color: #006622;
    }

    .user-slot-container .slot-details {
        padding: 10px 10px;
        border: 1px solid #f6f6f6;
        margin: 5px;
        cursor: pointer;
        vertical-align: middle;
        background: #fff;
        box-shadow: 0 2px 15px -10px rgba(102, 69, 142, 1);
    }

    .doctor-box img {
        width: 100px;
        position: relative;
        z-index: 1;
        background: #fff;
    }

    .display-inline {
        display: inline-block !important;
    }

    .theme-modal-header {
        background-color: #006a8a;
        padding: 10px 15px;
        color: #fff;
        border-radius: 5px 5px 0px 0px;
    }

    .close-white {
        opacity: 100;
        text-shadow: none;
        padding-top: 5px !important;
        color: #fff;
    }

    .bg__lightgray {
        background: #f1f1f1;
    }

    .req {
        color: #fc2d42;
    }

    @media (min-width: 1300px) {
        .container {
            width: 1310px;
        }
    }

    .appointment .select2-container .select2-selection--single,
    .appointment .select2-container--default .select2-selection--single .select2-selection__arrow {
        border-radius: 7px !important;
    }

    .form-control {
        border-radius: 7px !important;

    }

    .input-group-addon {
        border-radius: 7px !important;
        border-top-left-radius: 0px 0px !important;
        border-bottom-left-radius: 0px 0px !important;
    }

    .spaceb50 {
        padding-bottom: 0px !important;
    }

    .social_links a span i {
        border-radius: 20%;
        padding: 9px;
        color: white;
        margin: 3px;
    }

    @media only screen and (max-width: 600px) {
        #vifi_logo {
            display: none;
        }

        #elif_logo {
            display: none;
        }

        .main_row {
            padding: 0px !important;
        }

        .main_form_div {
            padding: 40px 10px !important;
            box-shadow: 0 0px 0px 0 rgba(0, 0, 0, 0.2) !important;
            width: 100%;
        }

        #consult_img_div {
            display: none;
        }

        /* .small_slot_div{
        width: 20%;
    } */
    }

    .text_color {
        color: #fff;
    }

    .border_radius_20 {
        border-radius: 20px !important;
        background-color: #36786E26 !important;
    }

    .border_radius_6 {
        border-radius: 6px !important;
        /* border: 1px solid black; */
    }

    .main_title {
        font-weight: 600;
        color: #005447C9;
        font-size: 28px;
    }

    .form-check-inline {
        display: inline-block;
        margin-right: 10px;
    }

    .form-check-label {
        font-weight: 400;
    }

    .padding_5 {
        padding: 10px;
        margin: 5px;
    }

    .form-group.country_id .iti {
        width: 100%;
    }

    .iti__selected-country-primary {
        display: none
    }

    #iti-0__dropdown-content {
        z-index: 1000;
        width: auto !important;
    }

    .iti__selected-dial-code::after {
        content: "\25BC";
        font-size: 0.6em;
        margin-left: 1px;
        pointer-events: none;
    }

    .iti__country-container button {
        background-color: #CFF3ED26 !important;
        border-radius: 20px;
        padding: 10px;
        font-size: 16px;
        width: 70px;
    }

    .iti .iti__selected-dial-code {
        color: #000;
        font-size: 14px;
        font-weight: 400;
    }

    #row_of_slots {
        padding: 0px 10px;
    }

    .bg-slot {
        background-color: #0808ff;
        color: #fff;

    }

    .text_white {
        color: #fff;
    }

    .bg-avail {
        background-color: #36786E26;
    }

    .bg-not-avail {
        background-color: #E1EBE9;
        color:#C2C2C2;
        opacity: 0.9;
    }

    #country_id {
        width: 5px;
    }

    .country_parent {
        display: flex;
        /* justify-content: space-between; */
        gap: 3px;
    }

    .country_child {
        padding: 0px 13px 0px 0px;
        /* padding: 0px 0px 0px 0px; */
        /* width: 67%; */

    }

    #appointment_form {
        padding: 10px 5px;
    }
    .country_parent_paddind{
        padding: 0px 0px 0px 0px;
    }

    #row_of_slots{
        display: flex;
        /* justify-content: center; */
        gap: 2px;
        flex-wrap: wrap;
    }

    .gender_div{
        padding-left:20px;
    }

    @media (min-width: 768px) {
        .country_child {
            padding: 0px 13px 0px 30px;
        }

        #appointment_form {
            padding: 10px 40px;
        }

        .country_parent_paddind{
        padding: 0px 0px 0px 17px;
        }

 
       
    }

    @media (max-width: 768px) {
        #row_of_slots{
        justify-content: center;
    }

    .country_child {
        /* padding: 0px 13px 0px 0px; */
        padding: 0px 0px 0px 0px;
        width: 65%;

    }

    .country_id {
           margin-left: 10px;
    }

    }

    @media (min-width: 992px) {
    #row_of_slots .col-md-4 {
        width: 30.333%;
    }
    }

    #loader {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 9999;
            width: 10%;
            height: 50%;
            top: 30%;
            left: 45%;
            /* background-color: rgba(0, 0, 0, 0.5); */
            mix-blend-mode: multiply;
        }

        #loader img {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 50%;
        }
</style>


<div id="loader">
    <img src="https://i.gifer.com/ZZ5H.gif" alt="Loading..." >
</div>
<div class="row upper_div" style="align-items: stretch;  display: flex;margin:20px 0px">
    <?php 
    
        $this->load->model(array('onlineappointment_model','charge_model'));
        $charges_array = $this->charge_model->getChargeDetailsById(1);
        if(isset($charges_array->standard_charge)){
            $charge = $charges_array->standard_charge + ($charges_array->standard_charge*$charges_array->percentage/100);
        }else{
            $charge=0;
        }
    ?>
    
    <input type="hidden" name="charges" id="charges" value="<?php echo number_format($charge,2); ?>">


    <div class="col-12 col-md-6 main_form_div"
        style="border: 1px solid #fff;padding: 60px;border-radius: 10px; box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2); transition: 0.3s;">
        <h2 class="text-center main_title">Book Appointment </h2>
        <form class="form appointment" id="appointment_form" method="POST" autocomplete="off">
            <input type="hidden" name="live_consult" value="yes">
            <input type="hidden" name="doctor" value="2">
            <input type="hidden" name="global_shift" id="global_shift" value="2">
            <input type="hidden" id="slot_id" name="slot" value="" form="appointment_form" />

            <div class="col-md-12">
                <div class="form-group ">
                    <input form="appointment_form" type="text" name="patient_name" class="form-control border_radius_20"
                        id="patient_name" value="<?php echo set_value('patient_name') ?>"
                        placeholder="Enter your name">
                </div>
            </div>
            <div class="col-md-12 gender_div">
                <div class="form-group">
                    <label class="form-check-label" for="gender"><?php echo $this->lang->line('gender'); ?></label><br>
                    <div class="form-check form-check-inline">
                        <input form="appointment_form" class="form-check-input" type="radio" name="gender"
                            id="gender_male" value="male" <?php echo set_radio('gender', 'male'); ?>>
                        <label class="form-check-label"
                            for="gender_male"><?php echo $this->lang->line('male'); ?></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input form="appointment_form" class="form-check-input" type="radio" name="gender"
                            id="gender_female" value="female" <?php echo set_radio('gender', 'female'); ?>>
                        <label class="form-check-label"
                            for="gender_female"><?php echo $this->lang->line('female'); ?></label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input form="appointment_form" class="form-check-input" type="radio" name="gender"
                            id="gender_other" value="other" <?php echo set_radio('gender', 'other'); ?>>
                        <label class="form-check-label"
                            for="gender_other"><?php echo $this->lang->line('other'); ?></label>
                    </div>
                </div>
            </div>






            <div class="col-12 col-md-12 ">
                <div class="row  country_parent">
                    <div class="col-md-2 country_parent_paddind" >
                        <div class="form-group country_id">
                            <input form="appointment_form" type="tel" name="country_id" id="country_id"
                                class="form-control w-25 border_radius_20" id="patient_name" value="">
                        </div>
                    </div>
                    <div class="col-md-10 pe-4  ps-md-5 country_child">
                        <div class="form-group">
                            <input form="appointment_form" type="text" name="phone"
                                class="form-control border_radius_20" id="phone"
                                value="<?php echo set_value('phone') ?>"
                                placeholder="Enter mobile number">
                        </div>
                    </div>
                </div>
            </div>




            <div class="col-md-12">
                <div class="form-group">
                    <input form="appointment_form" type="email" name="email" class="form-control border_radius_20"
                        id="email" value="<?php echo set_value('email') ?>"
                        placeholder="<?php echo $this->lang->line('enter_email'); ?>">
                    <small>(You'll get the meeting link on the entered email.)</small>
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group formgroup <?php if (form_error('date')) {
                    echo 'has-error';
                } ?>">
                    <div class='input-group date'>
                        <input type='text' class="form-control border_radius_20" id='datetimepicker1' name="date"
                            autocomplete="off"
                            style="border-top-right-radius: 0px 0px !important;border-bottom-right-radius: 0px 0px !important;" />
                        <span class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                        </span>
                    </div>

                </div>
            </div>
            <div class="col-md-12" id="shift" style="margin-bottom:20px">
                <div class="alert alert-danger text-center" role="alert">
                    <?php echo $this->lang->line('no_slot_available'); ?>
                </div>
            </div>
            <div class="text-center">
                <button form="appointment_form" type="submit" id="submitbtn" class="btn btn-primary theme-btn"
                    style="border-radius:20px; background-color:#387A70">Pay Now</button>
            </div>
        </form>
    </div>
    <div class="col-md-6" id="consult_img_div">
        <img src="<?php echo base_url('uploads/gallery/consult.png'); ?>" alt=""
            style="width:100%;max-width:100%;opacity:0.7;height:100%;" />
    </div>
</div>

<!-- <div class="row">
    <div class="container">
        <h2 class="text-center" style="font-size: 50px;color:#387A70;padding: 40px 0px 40px 0px;font-weight:500">
            Elevate your executive performance through mental well-being.
        </h2>
    </div>
</div>
<div class="row">
    <div class="container">
        <h2 class="text-center" style="font-size: 18px;padding: 40px 0px 40px 0px;font-weight:600">
            Corporate mental health is paramount for employee well-being and organizational success.
            Prioritizing mental health fosters a supportive work culture, enhances productivity, and reduces
            absenteeism.
            It promotes resilience, creativity, and collaboration among employees.
            By investing in mental health initiatives, companies cultivate a happier, healthier, and more engaged
            workforce, driving long-term sustainability.
        </h2>
    </div>
</div> -->

<!-- <div class="row" style="background:#357b71">
    <div class="container" style="display: flex;align-items: center;">
        <div class="col-md-4" id="dubai_logo">
            <img src="https://elif.in/wp-content/uploads/2024/05/dfs-24-Nav-logo-1.svg" alt="" srcset="">
        </div>
        <div class="col-md-4 d-none d-md-block" id="vifi_logo">
            <img src="https://elif.in/wp-content/uploads/2024/05/vifi-300x214.png" alt="" srcset="">
        </div>
        <div class="col-md-4 d-none d-md-block" id="elif_logo">
            <img src="<?php echo base_url($front_setting->logo); ?>" style="height:100px"
                alt="" srcset="">
        </div>
    </div>
</div> -->

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header theme-modal-header">
                <button type="button" class="close close-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title display-inline" id="exampleModalLabel">
                    <?php echo $this->lang->line("slots_available"); ?>
                </h4>
            </div>
            <div class="modal-body pt0 pb0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="doctor-box ptt10">
                                <img class="col-md-4" id="staff_image"
                                    src="<?php echo base_url("uploads/staff_images/no_image.png"); ?>">
                                <div class="col-md-8">
                                    <div class="col-md-6"><?php echo $this->lang->line("doctor_name"); ?> </div>
                                    <div id="doctor_name" class="col-md-6"></div>
                                    <div class="col-md-6"><?php echo $this->lang->line("specialist"); ?> </div>
                                    <div id="doctor_speciality" class="col-md-6"></div>
                                    <div class="col-md-6"><?php echo $this->lang->line("consultation_fees"); ?> </div>
                                    <div id="fees" class="col-md-6"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <hr>
                            </div>
                            <!-- <input type="hidden" id="slot_id" name="slot" form="appointment_form" /> -->
                            <div class="col-md-12" id="slot"></div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button form="appointment_form" type="submit" id="submitbtn"
                    class="btn btn-primary theme-btn"><?php echo $this->lang->line('submit'); ?></button>
                <button type="button" class="btn btn-default"
                    data-dismiss="modal"><?php echo $this->lang->line('close'); ?></button>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="<?php echo base_url() ?>backend/plugins/select2/select2.min.css">
<script src="<?php echo base_url() ?>backend/plugins/select2/select2.full.min.js"></script>
<script src="<?php echo base_url('backend/toast-alert/toastr.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>backend/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/23.1.0/js/intlTelInput.min.js"
    integrity="sha512-nSv4TmHKiFdWKcAEKs+OW4rd9OPo4ZNNVHxhpIQj/dZwLSDrjO8Lq6YJn5AzFeFwqXaA+u9xdVvRbfkfExTkLg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    var date_format = '<?php echo $result = strtr($this->customlib->getHospitalDateFormatFrontCMS(), ['d' => 'dd', 'm' => 'mm', 'Y' => 'yyyy']) ?>';
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();
    });

    $(document).ready(function () {
        var input = document.querySelector("#country_id");

        let cc = window.intlTelInput(input, {

            separateDialCode: true,
            initialCountry: 'IN',
            // allowDropdown:false,
        })

        //console.log('check getShift log...');
        getDoctorShift()
        getSlotByShift();

        toastr.options = {
            "closeButton": true,

        };
        $(function () {
            var datetime_format = '<?php echo $result = strtr($this->customlib->getHospitalDateFormatFrontCMS(true), ['d' => 'DD', 'm' => 'MM', 'Y' => 'YYYY']) ?>';

            $('#datetimepicker1').datetimepicker({
                format: datetime_format,
                minDate: moment().startOf('day') 
            });
        });


        $(function () {
            $('input[type=radio][name=patient_type]').change(function () {
                updatePatientID(this.value);
            });

            $("#datetimepicker1").on("dp.change", function (e) {
                // console.log('check log...');
                $("#submitbtn").button('reset');
                getSlotByShift();
            });


        });
    });

    function updatePatientID(patient_type) {
        if (patient_type == 'old patient') {
            $('#login_form').removeClass("hide");
            $('#signup_form').addClass("hide");
        } else if (patient_type == 'new patient') {
            $('#signup_form').removeClass("hide");
            $('#login_form').addClass("hide");
        }
    }

    function getdoctor(id, doc = '') {
        if (id != '') {
            var div_data = "";
            $('#doctor').html("<option value='l'><?php echo $this->lang->line('loading') ?></option>");
            $.ajax({
                url: '<?php echo base_url(); ?>site/getdoctor',
                type: "POST",
                data: { id: id, active: 'yes' },
                dataType: 'json',
                success: function (res) {
                    $.each(res, function (i, obj) {
                        var sel = "";
                        if ((doc != '') && (doc == obj.id)) {
                            sel = "selected";
                        }
                        div_data += "<option value=" + obj.id + " " + sel + ">" + obj.name + "</option>";
                    });
                    $("#doctor").html("<option value=''><?php echo $this->lang->line('select'); ?></option>");
                    $('#doctor').append(div_data);
                    $("#doctor").select2().select2('val', doc);
                }
            });
        } else {
            $("#doctor").html("<option value=''><?php echo $this->lang->line('select'); ?></option>");
        }
        $("#slot").html("");
    }

</script>

<script>
    function getSlotByShift(shift) {
        $("#shift_id").val(shift);
        // $("#exampleModal").modal("show");
        $("#slot_id").val("");
        var div_data = "";
        var today = new Date();
        // Get the day, month, and year from the date object
        var day = String(today.getDate()).padStart(2, '0');
        var month = String(today.getMonth() + 1).padStart(2, '0'); // Months are zero-based, so we add 1
        var year = today.getFullYear();

        // Combine the parts into the desired format
        var formattedDate = day + '-' + month + '-' + year;

        var date = $("#datetimepicker1").val() ? $("#datetimepicker1").val() : formattedDate;
        // console.log('date', date);
        // var doctor = $("#doctor").val();
        var doctor = 2;
        // var global_shift = $("#global_shift").val();
        if (shift != '') {
            $.ajax({
                url: '<?php echo base_url(); ?>site/getSlotByShift',
                type: "POST",
                data: { shift: shift, doctor: doctor, date: date, shift: shift },
                dataType: 'json',
                success: function (res) {
                    console.log('res.res',res);
                    
                    $("#shift").html("<h5>Select Time Slot</h5>");
                    var row = document.createElement('div');
                    row.classList = 'row text-center ';
                    row.id = 'row_of_slots';
                    $.each(res.result, function (i, obj) {
                        div_data += "<div id='main_slot_" + i + "' onclick = 'setSlot(" + i + ")' style='cursor:pointer;' class='col-6 col-sm-6 col-md-4 padding_5 border_radius_6 small_slot_div " + obj.class + "'><span id='slot_" + i + "'  data-filled='" + obj.filled + "' >" + obj.time + "</span></div>";
                    });
                    if (div_data == "") {
                        div_data = '<div class="alert alert-danger text-center" role="alert"><?php echo $this->lang->line('no_slot_available'); ?></div>';
                    }
                    document.getElementById("shift").appendChild(row);
                    $('#row_of_slots').html(div_data);

                    // document.getElementById("row_of_slots").appendChild(div_data);

                    // $("#slot").html("");
                    // $('#slot').html(div_data);
                    // $("#shift").html("");
                    // $('#shift').html(div_data);

                    $("#doctor_name").html(res.doctor_name);
                    let speciality = "";
                    $.each(res.doctor_speciality, function (i, list) {
                        if (speciality != "") {
                            speciality += ", ";
                        }
                        speciality += list.specialist_name;
                    });
                    $("#doctor_speciality").html(speciality);
                    $("#fees").html(res.fees);
                    $("#duration").html(res.duration);
                    $("#imgdiv").attr("src", res.image);
                    refreshCaptcha();
                    if (res.image != '') {
                        $("#staff_image").attr('src', res.image);;
                    }
                }
            });
        }
    }

    function setSlot(id) {
        let charges = $('#charges').val();
        // console.log('charges',charges);
        if ($("#slot_" + id).data("filled") === "filled") {
            alert("<?php echo $this->lang->line('not_available'); ?>");
        } else {
            $("#submitbtn").text(`Pay ₹ ${charges}`);
            $("#slot_id").val('');
            $("#slot_id").val(id);
            $('#row_of_slots .bg-slot').each(function() {
                $(this).removeClass('bg-slot').addClass('bg-avail');
            });
            $(".bg-primary").addClass("badge-success-soft");
            $(".bg-primary").removeClass(".bg-primary");
            $("#slot_" + id).removeClass("bg-avail");
            $("#main_slot_" + id).removeClass("bg-avail").addClass("bg-slot");
        }
    }
</script>

<script>
    function getShift(date = $("#datetimepicker1").val()) {
        var div_data = "";
        // var doctor = $("#doctor").val();
        var doctor = 2;
        $("#shift").html("<div class='alert alert-danger text-center' role='alert'><?php echo $this->lang->line('no_slot_available'); ?></div>");
        // var global_shift = $("#global_shift").val();
        if (date == '') {
            return;
        }
        $.ajax({
            url: '<?php echo base_url(); ?>site/getShift',
            type: "POST",
            data: { doctor: doctor, date: date },
            dataType: 'json',
            success: function (res) {
                if (res.length) {
                    $("#shift").html("<h5>Select Time Slot</h5>");
                    var row = document.createElement('div');
                    row.classList = 'row text-center';

                    $.each(res, function (i, obj) {
                        var elemm = document.createElement('div');
                        elemm.classList = 'col-md-4 border_radius_20 padding_5';
                        var span = document.createElement('span');
                        span.onclick = function () { getSlotByShift(obj.id); validateTime(obj.id); };
                        span.appendChild(document.createTextNode(obj.start_time + " - " + obj.end_time));
                        elemm.appendChild(span);
                        row.appendChild(elemm)
                    });
                    document.getElementById("shift").appendChild(row);
                }
            }
        });
    }
</script>
<script>


    function errorMsg(msg) {
        toastr.error(msg);
    }
    $("#appointment_form").submit(function () {
        $("#submitbtn").button('loading');
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>' + 'welcome/bookAppointment',
            data: $('#appointment_form').serialize(),
            dataType: 'json',
            beforeSend: function () {

            },
            success: function (data) {
                refreshCaptcha();
                if (data.status == 1) {
                    // console.log('here', data);
                    // window.location.replace(`<?php echo site_url('patient/onlineappointment/checkout/index/') ?>${data.appointment_id}`);
                    // window.location.replace("<?php echo site_url('patient/onlineappointment/razorpay') ?>");
                  
                    $.ajax({
                        type: 'GET',
                        url: "<?php echo base_url("patient/onlineappointment/checkout/index/"); ?>"+ data.appointment_id,
                        dataType: 'json',
                        success: function (res) {
                            if(res.status)
                            {
                                pay(res.data);
                                $("#submitbtn").button('reset');
                            }
                            else{
                                alert("something went wrong!");
                                $("#submitbtn").button('reset');
                            }

                        }
                    });
                } else {
                    var list = $('<ul/>');
                    $.each(data.error, function (key, value) {

                        if (value != "") {
                            list.append(value);
                        }
                    });
                    errorMsg(list);
                }
            },
            error: function (xhr) { // if error occured
                // console.log(xhr);
                $("#submitbtn").button('reset');
            },
            complete: function () {
                $("#submitbtn").button('reset');
            }
        });
    });

    function getDoctorShift(prev_val = 0) {
        // var doctor_id = $("#doctor").val();
        var doctor_id = 2;
        var select_box = "<option value=''><?php echo $this->lang->line('select'); ?></option> ";
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url("site/doctorshiftbyid"); ?>",
            data: { doctor_id: doctor_id },
            dataType: 'json',
            success: function (res) {
                $.each(res, function (i, list) {
                    selected = list.id == prev_val ? "selected" : "";
                    select_box += "<option value='" + list.id + "' " + selected + ">" + list.name + "</option>";
                });
                // $("#global_shift").html(select_box);
                // $("#global_shift").select2().select2('val', "");

            }
        });
    }
</script>
        <script>
            var SITEURL = "<?php echo base_url() ?>";
            function pay(res) {
            // $("#submitbtn").button('loading');

            var totalAmount = res.total;
            var product_id = res.merchant_order_id;
            var options = {
                    "key": res.key_id,
                    "amount": res.total, // 2000 paise = INR 20
                    "name": res.name,
                    'prefill': {"contact" : res.mobileno},
                    "description": res.title,
                    "currency": res.currency_code,
                    "image": "",
                    "handler": function (response) {
                        document.getElementById('loader').style.display = 'block';
                        $.ajax({
                            url: res.return_url,
                            type: 'post',
                            data: {
                                razorpay_payment_id: response.razorpay_payment_id, totalAmount: totalAmount, product_id: product_id,
                            },
                            success: function (msg) {
                                // console.log('msg',msg);
                                const parsedMsg = JSON.parse(msg);
                                // window.location.assign(SITEURL + 'patient/onlineappointment/checkout/successinvoice/' + parsedMsg.appointment_id)
                                $("#submitbtn").button('reset');
                                window.location.replace(SITEURL + 'patient/onlineappointment/checkout/successinvoice/' + parsedMsg.appointment_id);
                            },
                            complete: function () {
                                $("#submitbtn").button('reset');
                            }
                        });

                    },
                    "theme": {
                        "color": "#528FF0"
                    }
                };
                // console.log(options);
                var rzp1 = new Razorpay(options);
                rzp1.open();

            }
        </script>

<script type="text/javascript">
    function refreshCaptcha() {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('site/refreshCaptcha'); ?>",
            data: {},
            success: function (captcha) {
                $(".captcha_image").html(captcha);
                $("#captcha").val("");
                $("#captcha_register").val("");
            }
        });
    }


    function validateTime(id) {
        let date = $("#datetimepicker1").val();
        if (id) {
            $.ajax({
                url: '<?php echo base_url(); ?>' + 'welcome/getShiftById',
                type: "POST",
                data: { id: id, date: date },
                dataType: 'json',
                success: function (res) {
                    if (res.status) {
                        alert("<?php echo $this->lang->line("appointment_time_is_expired"); ?>");
                    }
                }
            });
        }
    }    
</script>