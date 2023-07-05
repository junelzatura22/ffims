<!-- /.content-wrapper -->
<footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 3.2.0
    </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->



<script src='https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js'></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>

<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>


<script src={{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}></script>
<script src={{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}></script>
<script src={{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}></script>
<script src={{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}></script>
<script src={{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}></script>


<script src={{ asset('plugins/chart.js/Chart.min.js') }}></script>
<!-- Sparkline -->
<script src={{ asset('plugins/sparklines/sparkline.js') }}></script>
<!-- JQVMap -->
<script src={{ asset('plugins/jqvmap/jquery.vmap.min.js') }}></script>
<script src={{ asset('plugins/jqvmap/maps/jquery.vmap.usa.js') }}></script>
<!-- jQuery Knob Chart -->
<script src={{ asset('plugins/jquery-knob/jquery.knob.min.js') }}></script>
<!-- daterangepicker -->
<script src={{ asset('plugins/moment/moment.min.js') }}></script>
<script src={{ asset('plugins/daterangepicker/daterangepicker.js') }}></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src={{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}></script>
<!-- Summernote -->
<script src={{ asset('plugins/summernote/summernote-bs4.min.js') }}></script>
<!-- overlayScrollbars -->
<script src={{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}></script>
<!-- AdminLTE App -->
<script src={{ asset('dist/js/adminlte.js') }}></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src={{asset("dist/js/demo.js")}}></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src={{ asset('dist/js/pages/dashboard.js') }}></script>

<!-- ChartJS -->
{{-- for the position script  --}}
<script>
    $(function() {
        $("#add_position_form").validate({
            rules: {
                p_desc: {
                    required: true,
                },
                rank: {
                    required: true,
                }
            },
            message: {
                p_desc: {
                    required: "Please enter description",
                },
                rank: {
                    required: "Please enter rank",
                }
            }
        });
        $("#edit_position_form").validate({
            rules: {
                p_desc: {
                    required: true,
                },
                rank: {
                    required: true,
                }
            },
            message: {
                p_desc: {
                    required: "Please enter description",
                },
                rank: {
                    required: "Please enter rank",
                }
            }
        });
        $("#addFormDesignation").validate({
            rules: {
                d_abr: {
                    required: true,
                },
                d_description: {
                    required: true,
                }
            },
            message: {
                d_abr: {
                    required: "Please enter abbreviation",
                },
                d_description: {
                    required: "Please enter description",
                }
            }
        });
        // add new employee ajax request
        $("#add_position_form").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            $("#add_position_btn").text('Adding...');
            $.ajax({
                url: '{{ url('admin/management/position') }}',
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                        Swal.fire(
                            'Added!',
                            'Position Added Successfully!',
                            'success'
                        )
                        fetchAllEmployees();
                    }
                    $("#add_position_btn").text('Save Position');
                    $("#add_position_form")[0].reset();
                    $("#addPositionModal").modal('hide');
                }
            });

        });





        // delete employee ajax request
        $(document).on('click', '.deleteIcon', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            let csrf = '{{ csrf_token() }}';
            var url = '{{ url('admin/management/delete') }}';
            var dltUrl = url + "/" + id;
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: dltUrl,
                        method: 'get',
                        data: {
                            _token: csrf
                        },
                        success: function(response) {
                            console.log(response);
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            fetchAllEmployees();
                        }
                    });
                }
            })
        });


        // edit employee ajax request
        $(document).on('click', '.editIcon', function(e) {
            e.preventDefault();
            let id = $(this).attr('id');
            let rank = $(this).parents('table tr').find('.rank').html();
            let p_desc = $(this).parents('table tr').find('.p_desc').html();
            $("#edit_position_form").find("#rank").val(rank);
            $("#edit_position_form").find("#p_desc").val(p_desc);
            $("#edit_position_form").find("#p_id").val(id);

        });
        //edit designation
        $(document).on('click', '.editBtn', function(e) {
            e.preventDefault();
            let id = $(this).parents('table tr').attr('id');
            let d_abr = $(this).parents('table tr').find('.d_abr').html();
            let d_description = $(this).parents('table tr').find('.d_description').html();
            $("#editFormDesignation").find("#d_abr").val(d_abr);
            $("#editFormDesignation").find("#d_description").val(d_description);
            $("#editFormDesignation").find("#d_id").val(id);
        });

        //edit designation
        $(document).on('click', '.deleteDesignation', function(e) {
            e.preventDefault();
            let id = $(this).parents('table tr').attr('id');
            let d_abr = $(this).parents('table tr').find('.d_abr').html();

            $("#deletFormDesignation").find("#d_id").val(id);
            $("#deletFormDesignation").find("#theDesignation").val(d_abr);

        });

        // update employee ajax request
        $("#edit_position_form").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            $("#edit_position_btn").text('Updating...');
            var url = '{{ url('admin/management/update') }}';
            $.ajax({
                url: url,
                method: 'post',
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function(response) {
                    if (response.status == 200) {
                        Swal.fire(
                            'Updated!',
                            'Position Updated Successfully!',
                            'success'
                        )
                        fetchAllEmployees();
                    }
                    $("#edit_position_btn").text('Update Position');
                    $("#edit_position_form")[0].reset();
                    $("#editPositionModal").modal('hide');
                }
            });
        });


        // fetch all employees ajax request
        fetchAllEmployees();

        function fetchAllEmployees() {
            $.ajax({
                url: '{{ url('admin/management/fetchall') }}',
                method: 'get',
                success: function(response) {
                    $("#show_position").html(response);
                    var t = $("#positionTable").DataTable({
                        order: [2, 'asc'],
                        "responsive": true,
                    });
                    t.on('order.dt search.dt', function() {
                        t.column(0, {
                            search: 'applied',
                            order: 'applied'
                        }).nodes().each(function(cell, i) {
                            cell.innerHTML = i + 1;
                        });
                    }).draw();
                }
            });
        }

        var tab = $('#designationTable').DataTable({
            search: {
                return: true,
            },
            order: [4, 'desc'],
            "responsive": true,

        });

        tab.on('order.dt search.dt', function() {
            tab.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();

        $('.alert').on('click', function() {
            $(this).hide();
        });

    });
</script>

{{-- for the designation script  --}}
</body>

</html>
