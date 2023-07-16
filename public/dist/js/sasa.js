$(document).ready(function () {
    $("#success-alert").delay(2000).fadeIn("slow", function () {
        $("#success-alert").fadeOut(1500);
    });
    // validation for farmer
    $("#registerFarmer").validate({
        rules: {
            reg_type: {
                required: true,
            },
            fname: "required",
            lname: "required",
            dob: "required",
            pob: "required",
            gender: "required",
            cstatus: "required",
            contactno: {
                required: true,
                minlength: 10,
                maxlength: 11,
            },
            c_purok: "required",
            c_street: "required",
            c_region: "required",
            c_province: "required",
            c_citymun: "required",
            c_barangay: "required",
            p_purok: "required",
            p_street: "required",
            p_region: "required",
            p_province: "required",
            p_citymun: "required",
            p_barangay: "required",
        },
        messages: {
            reg_type: {
                required: "Select Category",
            },
            fname: "Firstname is empty",
            lname: "Lastname is empty",
            dob: "Date of Birth is empty",
            pob: "Place of Birth is empty",
            gender: "Select Gender",
            cstatus: "Select Civil Status",
            contactno: {
                required: "No contact no.",
                minlength: "Minimum of 10",
                maxlength: "Maximum of 11",
            },
            c_purok: "This field is empty",
            c_street: "This field is empty",
            c_region: "Region is empty",
            c_province: "Province is empty",
            c_citymun: "City/Municipality is empty",
            c_barangay: "Barangay is empty",
            p_purok: "This field is empty",
            p_street: "This field is empty",
            p_region: "Region is empty",
            p_province: "Province is empty",
            p_citymun: "City/Municipality is empty",
            p_barangay: "Barangay is empty",
        },
    });

    $("#registerFarmer #fname").bind(
        "keyup blur",
        function () {
            var node = $(this);
            node.val(node.val().replace(/[^A-Za-z_\s]/, ""));
        } // (/[^a-z]/g,''
    );
    $("#registerFarmer #lname").bind(
        "keyup blur",
        function () {
            var node = $(this);
            node.val(node.val().replace(/[^A-Za-z_\s]/, ""));
        } // (/[^a-z]/g,''
    );

    $("#add_position_form").validate({
        rules: {
            p_desc: {
                required: true,
            },
            rank: {
                required: true,
            },
        },
        message: {
            p_desc: {
                required: "Please enter description",
            },
            rank: {
                required: "Please enter rank",
            },
        },
    });
    $("#edit_position_form").validate({
        rules: {
            p_desc: {
                required: true,
            },
            rank: {
                required: true,
            },
        },
        message: {
            p_desc: {
                required: "Please enter description",
            },
            rank: {
                required: "Please enter rank",
            },
        },
    });
    $("#addFormDesignation").validate({
        rules: {
            d_abr: {
                required: true,
            },
            d_description: {
                required: true,
            },
        },
        message: {
            d_abr: {
                required: "Please enter abbreviation",
            },
            d_description: {
                required: "Please enter description",
            },
        },
    });
    $("#addCommodityForm").validate({
        rules: {
            commodity: {
                required: true,
            },
        },
        message: {
            commodity: {
                required: "Please enter commodity/program",
            },
        },
    });
    $("#editCommodityForm").validate({
        rules: {
            commodity: {
                required: true,
            },
        },
        message: {
            commodity: {
                required: "Please enter commodity/program",
            },
        },
    });

    $("#addFarmingActivityForm").validate({
        rules: {
            fa_name: {
                required: true,
            },
            commodity_id: {
                required: true,
            },
        },
        message: {
            fa_name: {
                required: "Please enter commodity/program",
            },
            commodity_id: {
                request: "Please select commodity",
            },
        },
    });

    $("#addCommodityForm #commodity").bind(
        "keyup blur",
        function () {
            var node = $(this);
            node.val(node.val().replace(/[^A-Za-z_\s]/, ""));
        } // (/[^a-z]/g,''
    );
    $("#addFarmingActivityForm #fa_name").bind(
        "keyup blur",
        function () {
            var node = $(this);
            node.val(node.val().replace(/[^A-Za-z_\s]/, ""));
        } // (/[^a-z]/g,''
    );
});
