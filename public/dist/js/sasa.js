$(document).ready(function () {
    var tooltipTriggerList = [].slice.call(
        document.querySelectorAll('[data-bs-toggle="tooltip"]')
    );
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    $("#success-alert")
        .delay(2000)
        .fadeIn("slow", function () {
            $("#success-alert").fadeOut(1500);
        });
    $("#error-alert")
        .delay(2000)
        .fadeIn("slow", function () {
            $("#error-alert").fadeOut(1500);
        });
    $("#update-alert")
        .delay(2000)
        .fadeIn("slow", function () {
            $("#update-alert").fadeOut(1500);
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
    $("#editFarmer").validate({
        rules: {
            reg_type: {
                required: true,
            },
            fishr_nat: "required",
            fishr_loc: "required",
            rsbsa_nat: "required",
            rsbsa_loc: "required",
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
            fishr_nat: "This field is required!",
            fishr_loc: "This field is required!",
            rsbsa_nat: "This field is required!",
            rsbsa_loc: "This field is required!",
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

    $(
        "#registerFarmer #fname,#registerFarmer #lname,#registerFarmer #mname"
    ).bind(
        "keyup blur",
        function () {
            var node = $(this);
            node.val(node.val().replace(/[^A-Za-z_\s]/, ""));
        } // (/[^a-z]/g,''
    );
    $(
        "#editFarmer #rsbsa_nat,#editFarmer #rsbsa_loc,#editFarmer #fishr_nat,#editFarmer #fishr_loc"
    ).keypress(function (e) {
        var txt = String.fromCharCode(e.which);
        var pattern = /^[0-9\-]+$/;
        if (!(pattern.test(txt) || e.keyCode == 8)) {
            return false;
        }
    });

    $("#editFarmer #fname,#editFarmer #lname,#editFarmer #mname").bind(
        "keyup blur",
        function () {
            var node = $(this);
            node.val(node.val().replace(/[^A-Za-z_\s]/, ""));
        } // (/[^a-z]/g,''
    );

    //VALIDATION
    //VALIDATION

    $("#addFarmArea").validate({
        rules: {
            c_region: "required",
            c_province: "required",
            c_citymun: "required",
            c_barangay: "required",
            c_purok: "required",
            parcel: "required",
            farmsize: "required",
            ownership: "required",
            ownership: "required",
            nameofowner: "required",
        },
        messages: {
            c_region: "This field is required!",
            c_province: "This field is required!",
            c_citymun: "This field is required!",
            c_barangay: "This field is required!",
            c_purok: "This field is required!",
            parcel: "This field is required!",
            farmsize: "This field is required!",
            ownership: "This field is required!",
            nameofowner: "This field is required!",
        },
    });

    $("#addFarmArea #nameofowner").bind("keyup blur", function () {
        var node = $(this);
        node.val(node.val().replace(/[0-9]/, ""));
    });

    $("#addFarmArea #ownership").on("change", function () {
        var data = $(this).val();
        var owner = $("#addFarmArea #owner").val();
        if (data == "Owner") {
            $("#addFarmArea #nameofowner")
                .val(owner)
                .attr("readonly", "readonly");
        } else {
            $("#addFarmArea #nameofowner").val("").removeAttr("readonly");
        }
    });

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

    // let mapOptions = {
    //     center: [6.908245, 126.009111],
    //     zoom: 30,
    // };
    // // var map = L.map('map').setView([6.908245, 126.009111], 4);
    // // var map = L.map('map').setView([0,0], 4);
    // var map = L.map("map", mapOptions);
    // // Creating a Layer object
    // var layer = new L.TileLayer(
    //     "http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
    // );
    // // Adding layer to the map
    // map.addLayer(layer);
    // // Creating a marker
    // var marker = L.marker([6.908245, 126.009111]);
    // // Adding marker to the map
    // marker.addTo(map);

    var map = L.map("map")
    L.tileLayer("http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution:
            'Map data &copy; <a href="http://www.osm.org">OpenStreetMap</a>',
    }).addTo(map);
    // L.tileLayer("http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
    //     attribution:
    //         'Map data &copy; <a href="http://www.osm.org">OpenStreetMap</a>',
    // }).addTo(map);

    var gpx = "/gpx/ADANTE ELIZABETH LARIBA 2.gpx"; // URL to your GPX file or the GPX itself
    // new L.GPX(gpx, { async: true })
    //     .on("loaded", function (e) {
    //         map.fitBounds(e.target.getBounds());
    //     })
    //     .addTo(map);
    new L.GPX(gpx, {
        async: true,
        marker_options: {
          startIconUrl: '/gpx/images/pin-icon-start.png',
          endIconUrl: '/gpx/images/pin-icon-end.png',
          shadowUrl: '/gpx/images/pin-shadow.png'
        }
      }).on('loaded', function(e) {
        map.fitBounds(e.target.getBounds());
      }).addTo(map);
});
