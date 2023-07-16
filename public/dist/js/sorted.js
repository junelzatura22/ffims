jQuery(document).ready(function($) {
   
      
});
 
    
    

  


    // $('#citymun-list').on('change', function() {
    //     // alert(urlFi);
    //     let csrf = '{{ csrf_token() }}';
    //     var citymunCode = this.value;
    //     var queryUrl = '{{ url('admin/user/getBarangay') }}';
    //     var urlFis = queryUrl + "/" + citymunCode;
    //     $("#barangay-list").html(''); //refresh
    //     $.ajax({
    //         url: urlFis,
    //         type: "get",
    //         data: {
    //             _token: csrf
    //         },
    //         dataType: 'json',
    //         success: function(result) {

    //             $.each(result.barangay, function(key, value) {
    //                 // $("#barangay-list").append(value.brgyDesc);

    //                 var output = '<div class="form-group col-3">';
    //                 output += '<div class="form-check form-switch ml-lg-4">';
    //                 output +=
    //                     '<input class="form-check-input" type="checkbox" name="assigned_barangay[]" id="flexSwitchCheckChecked" value=' +
    //                     value.brgyCode + '  {{ is_array(old('assigned_barangay')) && in_array('value.brgyCode', old('assigned_barangay')) ? ' checked' : '' }}>';
    //                 output +=
    //                     '<label class="form-check-label" for="flexSwitchCheckChecked">' +
    //                     value.brgyDesc + '</label>';
    //                 output += "</div>";
    //                 output += "</div>";
    //                 //   $output.='ml-lg-4"><input class="form-check-input" type="checkbox" name="commodity[]" id="flexSwitchCheckChecked" value="'.value.brgyCode.'">';  


    //                 // '<div class="form-group col-3"><div class="form-check form-switch ml-lg-4"><input class="form-check-input" type="checkbox" name="commodity[]" id="flexSwitchCheckChecked" value="'.value.brgyCode.'"><label class="form-check-label" for="flexSwitchCheckChecked">"'.value.brgyDesc.'"</label></div></div>'
    //                 $("#barangay-list").append(output);



    //             });
    //         }
    //     });
    // });

