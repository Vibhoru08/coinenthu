var d = new Date();
var time = d.getTime();

function updateReviewReply() {
    $("#reviewLoader").show();
    $('#successMsg').html('');
    $('#updateReviewReplys').formValidation().on('success.form.fv', function(e) {
        e.stopImmediatePropagation();
        var crr_id = $("#crr_id").val();
        var crr_decript = $("#crr_decript").val();
        $.ajax({
            type: "POST",
            cache: false,
            dataType: 'json',
            url: baseUrl + '/Reviews/updateReviewReply?srch=' + time,
            data: { crr_id: crr_id, crr_decript: crr_decript },
            success: function(res) {
                if (res.status == '1') {
                    $("#reviewLoader").hide();
                    $('#successMsg').html('Reply successfully updated.');
                    reportsReplies('replies');
                    setTimeout(function() {
                        $("#editReviewReply").modal("hide");
                    }, 1000);
                }
            }
        });
        e.preventDefault();
    });
}

function updateReview() {
    $("#reviewLoader").show();
    $('#successMsg').html('');
    $('#updateReviews').formValidation().on('success.form.fv', function(e) {
        e.stopImmediatePropagation();
        var re_id = $("#hid_reid").val();
        var re_rating = $("#re_rating").val();
        var re_decript = $("#re_decript").val();
        var re_cmid = $("#hid_re_cmid").val();
        $.ajax({
            type: "POST",
            cache: false,
            dataType: 'json',
            url: baseUrl + '/Reviews/updateReview?srch=' + time,
            data: { re_id: re_id, re_rating: re_rating, re_decript: re_decript, re_cmid: re_cmid },
            success: function(res) {
                if (res.status == '1') {
                    $("#reviewLoader").hide();
                    $('#successMsg').html('Review successfully updated.');
                    reportsReplies('reviews');
                    setTimeout(function() {
                        $("#editReview").modal("hide");
                    }, 1000);
                }
            }
        });
        e.preventDefault();
    });
}

function editReply(id) {
    $('#successMsg').html('');
    $.ajax({
        type: "GET",
        cache: false,
        dataType: 'json',
        url: baseUrl + '/Reviews/editReviewReply?crr_id=' + id + '&srch=' + time,
        success: function(res) {
            if (res.status == '1') {
                console.log(res.reviewDeatils);
                $("#crr_id").val(res.reviewDeatils.crr_id);
                $("#crr_decript").val(res.reviewDeatils.crr_decript);
                $("#editReviewReply").modal("show");
            }
        }
    });
}

function editReview(id) {
    $('#successMsg').html('');
    $.ajax({
        type: "GET",
        cache: false,
        dataType: 'json',
        url: baseUrl + '/Reviews/editReview?re_id=' + id + '&srch=' + time,
        success: function(res) {
            if (res.status == '1') {
                $("#hid_reid").val(res.reviewDeatils.re_id);
                var re_rating = 0;
                var twice_re_rating = 2;
                if (res.reviewDeatils.re_rating != "" && res.reviewDeatils.re_rating != 0 && res.reviewDeatils.re_rating != 'undefined') {
                    re_rating = parseInt(twice_re_rating) * res.reviewDeatils.re_rating;
                } else {
                    re_rating = '';
                }
                $("#re_rating").val(re_rating);
                $("#re_decript").val(res.reviewDeatils.re_decript);
                $("#hid_re_cmid").val(res.reviewDeatils.re_cmid);
                $("#editReview").modal("show");
            }
        }
    });
}

function reportsReplies(typemode) {
    var cmid = $("#select_company").val();
    var rVal = $("#reports_replies").val();
    if (cmid == 0) {
        cmid = "all";
    } else {
        cmid = cmid;
    }
    if (rVal == 0) {
        rVal = "all";
    } else {
        rVal = rVal;
    }
    if (typemode == 'replies') {
        loadCompanyReview(cmid, rVal);
    } else {
        loadreportsReviews(cmid, rVal);
    }
}

function replyReportStatus(ids, rstatus, page) {
    $("#confrm_u_id").val(ids);
    $("#confrm_type").val(rstatus);
    $("#whitchPage").val(page);
    $("#myModalLabels").html('Report Confirmation');
    if (page == 'repliesReports') {
        if (rstatus == 1) {
            $("#statusmesg").html('We approve the report. We are deleting reply.');
        } else {
            $("#statusmesg").html('We found reply proper. We disapprove the report.');
        }
    } else {
        if (rstatus == 1) {
            $("#statusmesg").html('We approve the report. We are deleting review.');
        } else {
            $("#statusmesg").html('We found review proper. We disapprove the report.');
        }
    }
    $("#confirmationDeleteModal").modal('show');
}

function reportsReview(typemode) {
    var cmid = $("#select_company").val();
    var rVal = $("#reports_replies").val();
    if (cmid == 0) {
        cmid = "all";
    } else {
        cmid = cmid;
    }
    if (rVal == 0) {
        rVal = "all";
    } else {
        rVal = rVal;
    }
    if (typemode != 'replies') {
        loadReviewReports(cmid, rVal);
    } else {
        loadReplyReports(cmid, rVal);
    }
}

function loadReplyReports(cmid, reportState) {
    $("#reviewsList").html("Please wait loading...");
    $.ajax({
        type: 'GET',
        cache: false,
        dataType: 'json',
        url: baseUrl + '/Reviews/repliesReports?reportState=' + reportState + '&cmid=' + cmid + '&sRch=' + time,
        success: function(data) {
            $('#reviewsList').html('<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">' +
                '<thead>' +
                '<tr>' +
                '<th> User Name </th>' +
                '<th> Review  </th>' +
                '<th> Reply  </th>' +
                '<th> Company Name </th>' +
                '<th> Report Reason </th>' +
                '<th>Actions</th>' +
                '</tr>' +
                '</thead>' +
                '<tbody></tbody></table>');
            var oTable = $('#example').dataTable({
                "aLengthMenu": [
                    [25, 50, 75, 100, -1],
                    [25, 50, 75, 100, "All"]
                ],
                "iDisplayLength": 25,
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "aaData": data.aaData,
                "columnDefs": [
                    { "width": "15%", "targets": 0 },
                    { "width": "30%", "targets": 1 },
                    { "width": "30%", "targets": 2 },
                    { "width": "5%", "targets": 3 },
                    { "width": "5%", "targets": 4 },
                    { "width": "5%", "targets": 5 },
                    { "width": "5%", "targets": 6 },
                    { "width": "5%", "targets": 7 },

                ],
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({ page: 'current' }).nodes();
                    var last = null;
                    var columns = [1, 2];
                    for (c = 1; c <= columns.length; c++) {
                        var colNo = columns[c];
                        api.column(c, { page: 'current' }).data().each(function(group, i) {
                            if (last !== group) {
                                if (c == 2) {
                                    $(rows).eq(i).before(
                                        '<tr class="group"><td colspan="5" style="padding-left:20px;">' + group + '</td></tr>'
                                    );
                                } else {
                                    $(rows).eq(i).before(
                                        '<tr class="group"><td colspan="5">' + group + '</td></tr>'
                                    );
                                }
                                last = group;
                            }
                        });
                    }
                },
                "aoColumns": [
                    { "mData": "u_firstname" },
                    { "mData": "re_decript" },
                    { "mData": "crr_decript" },
                    { "mData": "cm_name" },
                    { "mData": "rrr_report_reponse" },
                    { "mData": "action" },
                ],
                'columnDefs': [
                    { 'orderData': [1, 2], 'targets': 0 },
                    {
                        'targets': [1, 2],
                        'visible': false,
                        'searchable': false
                    },
                ],
            });
        }
    });
}

function loadReviewReports(cmid, reportState) {
    $("#reviewsList").html("Please wait loading...");
    $.ajax({
        type: 'GET',
        cache: false,
        dataType: 'json',
        url: baseUrl + '/Reviews/reviewReports?reportState=' + reportState + '&cmid=' + cmid + '&sRch=' + time,
        success: function(data) {
            $('#reviewsList').html('<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">' +
                '<thead>' +
                '<tr>' +
                '<th> User Name </th>' +
                '<th> Review  </th>' +
                '<th> Company Name </th>' +
                '<th> Report Reason </th>' +
                '<th>Actions</th>' +
                '</tr>' +
                '</thead>' +
                '<tbody></tbody></table>');
            var oTable = $('#example').dataTable({
                "aLengthMenu": [
                    [25, 50, 75, 100, -1],
                    [25, 50, 75, 100, "All"]
                ],
                "iDisplayLength": 25,
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "aaData": data.aaData,
                "columnDefs": [
                    { "width": "15%", "targets": 0 },
                    { "width": "30%", "targets": 1 },
                    { "width": "30%", "targets": 2 },
                    { "width": "5%", "targets": 3 },
                    { "width": "5%", "targets": 4 },
                    { "width": "5%", "targets": 5 },
                    { "width": "5%", "targets": 6 },
                    { "width": "5%", "targets": 7 },

                ],
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({ page: 'current' }).nodes();
                    var last = null;

                    api.column(1, { page: 'current' }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before(
                                '<tr class="group"><td colspan="9">' + group + '</td></tr>'
                            );

                            last = group;
                        }
                    });
                },
                "aoColumns": [
                    { "mData": "u_firstname" },
                    { "mData": "re_decript" },
                    { "mData": "cm_name" },
                    { "mData": "rr_report_reponse" },
                    { "mData": "action" },
                ],
                'columnDefs': [
                    { 'orderData': [1], 'targets': 0 },
                    {
                        'targets': [1],
                        'visible': false,
                        'searchable': false
                    },
                ],
            });
        }
    });
}

function loadreportsReviews(cmid, reportState) {
    $("#reviewsList").html("Please wait loading...");
    $.ajax({
        type: 'GET',
        cache: false,
        dataType: 'json',
        url: baseUrl + '/Reviews/reviewsList?reportState=' + reportState + '&cmid=' + cmid + '&sRch=' + time,
        success: function(data) {
            $('#reviewsList').html('<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">' +
                '<thead>' +
                '<tr>' +
                '<th> User Name </th>' +
                '<th> Company Name </th>' +
                '<th> Review  </th>' +
                '<th> Rating </th>' +
                '<th> Likes </th>' +
                '<th> Dislikes </th>' +
                '<th> Status </th>' +
                '<th>Actions</th>' +
                '</tr>' +
                '</thead>' +
                '<tbody></tbody></table>');
            var oTable = $('#example').dataTable({
                "aLengthMenu": [
                    [25, 50, 75, 100, -1],
                    [25, 50, 75, 100, "All"]
                ],
                "iDisplayLength": 25,
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "aaData": data.aaData,
                "columnDefs": [
                    { "width": "15%", "targets": 0 },
                    { "width": "30%", "targets": 1 },
                    { "width": "30%", "targets": 2 },
                    { "width": "5%", "targets": 3 },
                    { "width": "5%", "targets": 4 },
                    { "width": "5%", "targets": 5 },
                    { "width": "5%", "targets": 6 },
                    { "width": "5%", "targets": 7 },

                ],
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({ page: 'current' }).nodes();
                    var last = null;

                    api.column(1, { page: 'current' }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before(
                                '<tr class="group"><td colspan="9">' + group + '</td></tr>'
                            );

                            last = group;
                        }
                    });
                },
                "aoColumns": [
                    { "mData": "u_firstname" },
                    { "mData": "cm_name" },
                    { "mData": "re_decript" },
                    { "mData": "re_rating" },
                    { "mData": "re_likes_cnt" },
                    { "mData": "re_dislike_cnt" },
                    { "mData": "re_status" },
                    { "mData": "action" },
                ],
                'columnDefs': [
                    { 'orderData': [1], 'targets': 0 },
                    {
                        'targets': [1],
                        'visible': false,
                        'searchable': false
                    },
                ],
            });
        }
    });
}

function loadCompanyReview(cmid, reportState) {
    $("#reviewreplies").html("Please wait loading...");
    $.ajax({
        type: 'GET',
        cache: false,
        dataType: 'json',
        url: baseUrl + '/Reviews/reviewsRepliesList?reportState=' + reportState + '&cmid=' + cmid + '&sRch=' + time,
        success: function(data) {
            $('#reviewreplies').html('<table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">' +
                '<thead>' +
                '<tr>' +
                '<th> User Name </th>' +
                '<th> Review  </th>' +
                '<th> Review Reply </th>' +
                '<th> Rating </th>' +
                '<th> Likes </th>' +
                '<th> Dislikes </th>' +
                '<th> Status </th>' +
                '<th>Actions</th>' +
                '</tr>' +
                '</thead>' +
                '<tbody></tbody></table>');
            var oTable = $('#example').dataTable({
                "aLengthMenu": [
                    [25, 50, 75, 100, -1],
                    [25, 50, 75, 100, "All"]
                ],
                "iDisplayLength": 25,
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "aaData": data.aaData,
                "columnDefs": [
                    { "width": "15%", "targets": 0 },
                    { "width": "30%", "targets": 1 },
                    { "width": "35%", "targets": 2 },
                    { "width": "5%", "targets": 3 },
                    { "width": "5%", "targets": 4 },
                    { "width": "5%", "targets": 5 },
                    { "width": "5%", "targets": 6 },

                ],
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({ page: 'current' }).nodes();
                    var last = null;

                    api.column(1, { page: 'current' }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before(
                                '<tr class="group"><td colspan="9">' + group + '</td></tr>'
                            );

                            last = group;
                        }
                    });
                },
                "aoColumns": [
                    { "mData": "u_firstname" },
                    { "mData": "re_decript" },
                    { "mData": "crr_decript" },
                    { "mData": "crr_rating" },
                    { "mData": "crr_likes_cnt" },
                    { "mData": "crr_dislike_cnt" },
                    { "mData": "crr_status" },
                    { "mData": "action" },
                ],
                'columnDefs': [
                    { 'orderData': [1], 'targets': [0] },
                    {
                        'targets': [1],
                        'visible': false,
                        'searchable': false
                    },
                ],
            });
        }
    });
}

function deleteTopCompany(tm_id, stmode) {
    $("#confrm_u_id").val(tm_id);
    $("#confrm_type").val(stmode);
    $("#whitchPage").val('topcompany');
    $("#myModalLabels").html('Delete Confirmation');
    $("#statusmesg").html('Are you want to delete \n the company from the top companies?');
    $("#confirmationDeleteModal").modal('show');
}

function setTopCompanies(statusMode) {
    $('#errorUsers').html('');
    var topCompanies = "";
    var flag = true;
    topCompanies = $('#companiesList').val();
    if (topCompanies == null) {
        $('#errorUsers').html('Please select a company name.');
        flag = false;
    }
    if (flag == true) {
        $('#statusLoading').show;
        $.ajax({
            type: "POST",
            cache: false,
            url: baseUrl + '/Companies/addTopCompanies?srch=' + time,
            data: { topCompanies: topCompanies },
            success: function(res) {
                $('#errorUsers').html('');
                $('#successMeg').html('Successfully added to top companies.');
                $('#statusLoading').hide();
                if (statusMode == 1) {
                    window.location = baseUrl + '/top-digital-assets';
                } else {
                    window.location = baseUrl + '/top-ico-trckers';
                }
            }
        });
    }
}

function loadTopDigitalAssets(typeCmpny) {
    $("#topAssetsList").html("Please wait loading...");
    $.ajax({
        type: 'GET',
        cache: false,
        dataType: 'json',
        url: baseUrl + '/Companies/getTopCompanies?type=' + typeCmpny + '&sRch=' + time,
        success: function(data) {
            $('#topAssetsList').html('<table id="topAssets" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">' +
                '<thead>' +
                '<tr>' +
                '<th>Name</th>' +
                '<th>Description</th>' +
                '<th>Actions</th>' +
                '</tr>' +
                '</thead>' +
                '<tbody></tbody></table>');
            var oTable = $('#topAssets').dataTable({
                "aLengthMenu": [
                    [25, 50, 75, 100, -1],
                    [25, 50, 75, 100, "All"]
                ],
                "iDisplayLength": 25,
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "aaData": data.aaData,
                "columnDefs": [
                    { "bSortable": false, "aTargets": [2] },
                    { "width": "40%", "targets": 0 },
                    { "width": "55%", "targets": 1 },
                    { "width": "5%", "targets": 2 },
                ],
                "aoColumns": [
                    { "mData": "cm_name" },
                    { "mData": "cm_decript" },
                    { "mData": "action" },
                ]
            });
        }
    });

}

function reviewStatus(reid, actionmode, whitchPage) {
    $("#myModalLabels").html('');
    $("#statusmesg").html('');
    $('#confrm_u_id').val(reid);
    $('#confrm_type').val(actionmode);
    $('#whitchPage').val(whitchPage);
    $("#myModalLabels").html('Status Confirmation');
    if (actionmode == 0) {
        $("#statusmesg").html('Are you sure you want to change the status?');
    } else if (actionmode == 1) {
        $("#statusmesg").html('Are you sure you want to change the status?');
    } else if (actionmode == 2) {
        $("#statusmesg").html('Are you sure you want to delete?');
    }
    $('#confirmationDeleteModal').modal('show');

}

function reviewReplyStatus(crrid, actionmode, whitchPage) {
    $("#myModalLabels").html('');
    $("#statusmesg").html('');
    $('#confrm_u_id').val(crrid);
    $('#confrm_type').val(actionmode);
    $('#whitchPage').val(whitchPage);
    $("#myModalLabels").html('Status Confirmation');
    if (actionmode == 0) {
        $("#statusmesg").html('Are you sure you want to change the status?');
    } else if (actionmode == 1) {
        $("#statusmesg").html('Are you sure you want to change the status?');
    } else if (actionmode == 2) {
        $("#statusmesg").html('Are you sure you want to delete?');
    }
    $('#confirmationDeleteModal').modal('show');
}

function confirmActions() {
    id = $('#confrm_u_id').val();
    statusMode = $('#confrm_type').val();
    whitchPage = $('#whitchPage').val();
    if (whitchPage == "usermanag") {
        $.ajax({
            type: "POST",
            cache: false,
            url: baseUrl + '/User/userActions?srch=' + time,
            data: { id: id, statusMode: statusMode },
            success: function(res) {
                $('#confirmationDeleteModal').modal('hide');
                loadUsers();
            }
        });
    } else if (whitchPage == "topcompany") {
        $.ajax({
            type: "POST",
            cache: false,
            url: baseUrl + '/Companies/userActions?srch=' + time,
            data: { id: id, statusMode: statusMode },
            success: function(res) {
                $('#confirmationDeleteModal').modal('hide');
                if (statusMode == 1) {
                    window.location = baseUrl + '/top-digital-assets';
                } else {
                    window.location = baseUrl + '/top-ico-trckers';
                }
            }
        });
    } else if (whitchPage == "digitalasset") {
        $.ajax({
            type: "POST",
            cache: false,
            url: baseUrl + '/Companies/digitalAssetActions?srch=' + time,
            data: { id: id, statusMode: statusMode },
            success: function(res) {
                $('#confirmationDeleteModal').modal('hide');
                if (statusMode == 1) {
                    loadCompanies(1);
                } else {
                    loadCompanies(1);
                }
            }
        });

    } else if (whitchPage == "icotracker") {
        $.ajax({
            type: "POST",
            cache: false,
            url: baseUrl + '/Companies/digitalAssetActions?srch=' + time,
            data: { id: id, statusMode: statusMode },
            success: function(res) {
                $('#confirmationDeleteModal').modal('hide');
                if (statusMode == 1) {
                    loadCompanies(2);
                } else {
                    loadCompanies(2);
                }
            }
        });
    } else if (whitchPage == "reviewsList") {
        $.ajax({
            type: "POST",
            cache: false,
            url: baseUrl + '/Reviews/reviewStatus?srch=' + time,
            data: { id: id, statusMode: statusMode },
            success: function(res) {
                $('#confirmationDeleteModal').modal('hide');
                reportsReplies('reviews');
            }
        });
    } else if (whitchPage == "eventsList") {
        $.ajax({
            type: "POST",
            cache: false,
            url: baseUrl + '/Companies/EventActions?srch=' + time,
            data: { id: id, statusMode: statusMode },
            success: function(res) {
                $('#confirmationDeleteModal').modal('hide');
                if (statusMode == 1) {
                    loadEventsList(1);
                } else {
                    loadEventsList(1);
                }
            }
        });    
    } else if (whitchPage == "reviewsReply") {
        $.ajax({
            type: "POST",
            cache: false,
            url: baseUrl + '/Reviews/replyStatus?srch=' + time,
            data: { id: id, statusMode: statusMode },
            success: function(res) {
                $('#confirmationDeleteModal').modal('hide');
                reportsReplies('replies');
            }
        });
    } else if (whitchPage == "repliesReports") {
        $.ajax({
            type: "POST",
            cache: false,
            url: baseUrl + '/Reviews/replyReportStatus?srch=' + time,
            data: { id: id, statusMode: statusMode, whitchPage: whitchPage },
            success: function(res) {
                $('#confirmationDeleteModal').modal('hide');
                reportsReview('replies');
            }
        });
    } else if (whitchPage == "reviewsReport") {
        $.ajax({
            type: "POST",
            cache: false,
            url: baseUrl + '/Reviews/replyReportStatus?srch=' + time,
            data: { id: id, statusMode: statusMode, whitchPage: whitchPage },
            success: function(res) {
                $('#confirmationDeleteModal').modal('hide');
                reportsReview('reviews');
            }
        });
    }
}

function userConfirmation(uid, actionmode, whitchPage) {
    $('#confrm_u_id').val(uid);
    $('#confrm_type').val(actionmode);
    $('#whitchPage').val(whitchPage);
    if (actionmode != 2) {
        $("#myModalLabels").html('Status Confirmation');
        $("#statusmesg").html('Are you sure you want to continue?');
    } else {
        $("#myModalLabels").html('Delete Confirmation');
        $("#statusmesg").html('Are you sure you want to delete?');
    }
    $('#confirmationDeleteModal').modal('show');
}

function loadUsers() {
    $("#userManagementList").html("Please wait loading...");
    $.ajax({
        type: 'GET',
        cache: false,
        dataType: 'json',
        url: baseUrl + '/User/usersList?sRch=' + time,
        success: function(data) {
            $('#userManagementList').html('<table id="faqQuestionsU" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">' +
                '<thead>' +
                '<tr>' +
                '<th>Picture</th>' +
                '<th>Name</th>' +
                '<th>Email</th>' +
                '<th>Mobile </th>' +
                '<th>Status</th>' +
                '<th>Actions</th>' +
                '</tr>' +
                '</thead>' +
                '<tbody></tbody></table>');
            var oTable = $('#faqQuestionsU').dataTable({
                "aLengthMenu": [
                    [25, 50, 75, 100, -1],
                    [25, 50, 75, 100, "All"]
                ],
                "iDisplayLength": 25,
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "aaData": data.aaData,
                "columnDefs": [
                    { "bSortable": false, "aTargets": [3] },
                    { "width": "20%", "targets": 0 },
                    { "width": "30%", "targets": 1 },
                    { "width": "45%", "targets": 2 },
                    { "width": "5%", "targets": 3 },
                    { "width": "5%", "targets": 4 },
                ],
                "aoColumns": [
                    { "mData": "u_picture" },
                    { "mData": "u_firstname" },
                    { "mData": "u_email" },
                    { "mData": "u_mobile" },
                    { "mData": "u_status" },
                    { "mData": "action" },
                ]
            });
        }
    });
}

function loadCompanies(companyType) {
    $("#digitalAssetsList").html("Please wait loading...");
    $.ajax({
        type: 'GET',
        cache: false,
        dataType: 'json',
        url: baseUrl + '/Companies/digitalassetsList?type=' + companyType + '&sRch=' + time,
        success: function(data) {
            $('#digitalAssetsList').html('<table id="faqQuestionsU" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">' +
                '<thead>' +
                '<tr>' +
                '<th>Name</th>' +
                '<th>Description</th>' +
                '<th>MarketCap</th>' +
                '<th>Email </th>' +
                // '<th>Mobile </th>'+
                '<th>Status</th>' +
                '<th>Actions</th>' +
                '</tr>' +
                '</thead>' +
                '<tbody></tbody></table>');
            var oTable = $('#faqQuestionsU').dataTable({
                "aLengthMenu": [
                    [25, 50, 75, 100, -1],
                    [25, 50, 75, 100, "All"]
                ],
                "iDisplayLength": 25,
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "aaData": data.aaData,
                "columnDefs": [
                    { "bSortable": false, "aTargets": [3] },
                    { "width": "20%", "targets": 0 },
                    { "width": "30%", "targets": 1 },
                    { "width": "45%", "targets": 2 },
                    { "width": "5%", "targets": 3 },
                    { "width": "5%", "targets": 4 },
                ],
                "aoColumns": [
                    { "mData": "cm_name" },
                    { "mData": "cm_decript" },
                    { "mData": "cm_marketcap" },
                    { "mData": "cm_email" },
                    // { "mData": "cm_mobile" },
                    { "mData": "u_status" },
                    { "mData": "action" },
                ]
            });
        }
    });
}

function loadEventsList(companyType) {
    $("#eventsList").html("Please wait loading...");
    $.ajax({
        type: 'GET',
        cache: false,
        dataType: 'json',
        url: baseUrl + '/Companies/eventsList?type=' + companyType + '&sRch=' + time,
        success: function(data) {
            $('#eventsList').html('<table id="faqQuestionsU" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">' +
                '<thead>' +
                '<tr>' +
                '<th>Name</th>' +
                '<th>Description</th>' +
                '<th>Location</th>' +
                '<th>Start Date</th>' +
                // '<th>Mobile </th>'+
                '<th>Status</th>' +
                '<th>Actions</th>' +
                '</tr>' +
                '</thead>' +
                '<tbody></tbody></table>');
            var oTable = $('#faqQuestionsU').dataTable({
                "aLengthMenu": [
                    [25, 50, 75, 100, -1],
                    [25, 50, 75, 100, "All"]
                ],
                "iDisplayLength": 25,
                "paging": true,
                "lengthChange": true,
                
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "aaData": data.aaData,
                "columnDefs": [
                    { "bSortable": false, "aTargets": [3] },
                    { "width": "20%", "targets": 0 },
                    { "width": "30%", "targets": 1 },
                    { "width": "45%", "targets": 2 },
                    { "width": "5%", "targets": 3 },
                    { "width": "5%", "targets": 4 },
                ],
                "aoColumns": [
                    { "mData": "ev_name" },
                    { "mData": "ev_decript" },
                    { "mData": "ev_loc" },
                    { "mData": "ev_sd" },
                    // { "mData": "cm_mobile" },
                    { "mData": "ev_status" },
                    { "mData": "action" },
                ]
            });
        }
    });
}

function editUser() {
    $('#successMsg').html('');
    $('#edit_user').formValidation().on('success.form.fv', function(e) {
        e.stopImmediatePropagation();
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var u_mobile = $("#u_mobile").val();
        var u_username = $("#u_username").val();
        var uImage = $('#userhidImage').val();
        var u_uid = $('#u_uid').val();
        var file = $("#uploaded_file")[0].files[0];
        var form_data = new FormData();
        form_data.append('u_firstname', fname);
        form_data.append('u_lastname', lname);
        form_data.append('u_username', u_username);
        form_data.append('u_mobile', u_mobile);
        form_data.append('u_picture', uImage);
        form_data.append('u_uid', u_uid);
        form_data.append('uploaded_file', file);
        $('#loadAddUser').show();
        $.ajax({
            url: baseUrl + '/User/editUser?id=' + time,
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            dataType: 'json',
            success: function(data) {
                $('#loadAddUser').hide();
                if (data.output == 'success') {
                    $('#successMsg').html('User update sucessfully.').css("color", "green");
                    setTimeout(function() {
                        window.location = baseUrl + '/user-management';
                    }, 1000);
                } else {
                    $('#successMsg').html('Server Fail.').css("color", "red");
                }
            }
        });
        e.preventDefault();
    });
}

function addUser() {
    $('#successMsg').html('');
    $('#add_user').formValidation().on('success.form.fv', function(e) {
        e.stopImmediatePropagation();
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var p_u_username = $("#p_u_username").val();
        var email = $("#email_address").val();
        var cPwd = $("#confirm_password").val();
        var cPwd = $("#confirm_password").val();
        var u_mobile = $("#u_mobile").val();
        var uImage = $('#userhidImage').val();
        var file = $("#uploaded_file")[0].files[0];
        var form_data = new FormData

        form_data.append('u_firstname', fname);
        form_data.append('u_lastname', lname);
        form_data.append('u_username', p_u_username);
        form_data.append('u_email', email);
        form_data.append('u_password', cPwd);
        form_data.append('u_mobile', u_mobile);
        form_data.append('u_picture', uImage);
        form_data.append('uploaded_file', file);
        $('#loadAddUser').show();
        $.ajax({
            url: baseUrl + '/User/addUser?id=' + time,
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            dataType: 'json',
            success: function(data) {
                $('#loadAddUser').hide();
                if (data.output == 'success') {
                    $('#fname').val('');
                    $('#lname').val('');
                    $('#email_address').val('');
                    $('#u_mobile').val('');
                    $('#confirm_password').val('');
                    $('#userhidImage').val('');
                    var newCatImageFullPath = mainUrl + 'asset/img/no_image.png';
                    $('#image').attr('src', newCatImageFullPath);
                    $("#add_user").trigger('reset');
                    $('#add_user').formValidation('resetForm', true);
                    $('#add_user').data('formValidation').resetForm();
                    $('#successMsg').html('User added successfully.').css("color", "green");
                    setTimeout(function() {
                        window.location = baseUrl + '/user-management';
                    }, 2000);
                } else if (data.output == "emailexists") {
                    $('#email_address').focus();
                    $('#successMsg').html('Entered email is already with us.').css("color", "red");
                } else {
                    $('#successMsg').html('Server Fail.').css("color", "red");
                }
            }
        });
        e.preventDefault();
    });
}

function addDigitalAsset() {
    $('#add_digital_asset').formValidation().on('success.form.fv', function(e) {
        $("#cm_marketcap_error").html('');
        e.stopImmediatePropagation();
        $('#loadAddDigital').show();
        var flag = true;
        var cm_marketcap = $('#cm_marketcap').val();
        var s = cm_marketcap.split(',').join('');
        if (s.length > 16) {
            flag = false;
            $('#cm_marketcap').focus();
            $("#cm_marketcap").css("border-color", "#a94442");
            $("#cm_marketcap").css("box-shadow", "none");
            $("#label_mar").css("color", "#a94442");
            $("#cm_marketcap_error").html('Please enter less than 16 characters');
        } else {
            $("#cm_marketcap").css("border-color", "#00a65a");
            $("#cm_marketcap").css("box-shadow", "none");
            $("#label_mar").css("color", "#00a65a");
            $("#cm_marketcap_error").html('');
        }
        var filesNotGiven = false;
        $("input[id^='cp_picture_']").each(function() {
            var textboxId = parseInt(this.id.replace("cp_picture_", ""));
            userfile = $('#cp_picture_' + textboxId).val()
            if (userfile != "") {
                filesNotGiven = true;
                return;
            }
        });
        if (filesNotGiven) {
            $("input[id^='cp_picture_']").each(function() {
                var textboxId = parseInt(this.id.replace("cp_picture_", ""));
                userfile = $('#cp_picture_' + textboxId).val()

            });
            var ext = userfile.split('.').pop().toLowerCase();
            if ($.inArray(ext, ['pdf', 'doc', 'docx', 'png', 'jpg', 'jpeg']) == -1) {
                $('#upload_files_error').html('Please choose aalowed types only');
                flag = false;
            }
        }

        if (flag == true) {

            var form_data = new FormData($('#add_digital_asset')[0]);
            $.ajax({
                url: baseUrl + '/Companies/addDigitalAssetView?id=' + time,
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                dataType: 'json',
                success: function(data) {
                    if (data != 0) {
                        $('#loadAddDigital').hide();
                        window.location = baseUrl + '/digital-assets';
                    }
                }

            });
        }
        e.preventDefault();
    });
}

function addIcoTracker() {
    $("#cm_marketcap_error").html('');
    $('#add_ico_tracker').formValidation().on('success.form.fv', function(e) {

        e.stopImmediatePropagation();
        $('#loadIcoTracker').show();
        var flag = true;
        var cm_marketcap = $('#cm_marketcap').val();
        var s = cm_marketcap.split(',').join('');
        if (s.length > 16) {
            flag = false;
            $('#cm_marketcap').focus();
            $("#cm_marketcap").css("border-color", "#a94442");
            $("#cm_marketcap").css("box-shadow", "none");
            $("#label_mar").css("color", "#a94442");
            $("#cm_marketcap_error").html('Please enter less than 16 characters');
        } else {
            $("#cm_marketcap").css("border-color", "#00a65a");
            $("#cm_marketcap").css("box-shadow", "none");
            $("#label_mar").css("color", "#00a65a");
            $("#cm_marketcap_error").html('');
        }
        var filesNotGiven = false;
        $("input[id^='cp_picture_']").each(function() {
            var textboxId = parseInt(this.id.replace("cp_picture_", ""));
            userfile = $('#cp_picture_' + textboxId).val()
            if (userfile != "") {
                filesNotGiven = true;
                return;
            }
        });
        if (filesNotGiven) {
            $("input[id^='cp_picture_']").each(function() {
                var textboxId = parseInt(this.id.replace("cp_picture_", ""));
                userfile = $('#cp_picture_' + textboxId).val()

            });
            var ext = userfile.split('.').pop().toLowerCase();
            if ($.inArray(ext, ['pdf', 'doc', 'docx', 'png', 'jpg', 'jpeg']) == -1) {
                $('#upload_files_error').html('Please choose aalowed types only');
                flag = false;
            }
        }
        var cm_ico_start_time = $('#cm_ico_start_time').val();
        var cm_ico_end_time = $('#cm_ico_end_time').val();
        var cm_ico_start_date = $('#cm_ico_start_date').val();
        var cm_ico_end_date = $('#cm_ico_end_date').val();
        if (cm_ico_start_time != '' && cm_ico_start_date == '') {
            $('#date_error_msg').html('Start date is required.');
            alert('Start date is required.');
            flag = false;
        } else if (cm_ico_end_time != '' && cm_ico_end_date == '') {
            $('#date_error_msg').html('End date is required.');
            alert('End date is required.');
            flag = false;
        } else if (cm_ico_end_date != '' && cm_ico_start_date == '') {
            $('#date_error_msg').html('Start date is required.');
            alert('Start date is required.');
            flag = false;
        }
        if (flag == true) {

            var form_data = new FormData($('#add_ico_tracker')[0]);
            $.ajax({
                url: baseUrl + '/Companies/addDigitalAssetView?id=' + time,
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                dataType: 'json',
                success: function(data) {
                    if (data != 0) {
                        $('#loadIcoTracker').hide();
                        window.location = baseUrl + '/ico-trackers';
                    }
                }

            });
        }
        e.preventDefault();
    });
}

function UpdateDigitalAsset() {
    $("#cm_marketcap_error").html('');
    $('#update_digital_asset').formValidation().on('success.form.fv', function(e) {
        e.stopImmediatePropagation();
        var flag = true;
        var cm_marketcap = $('#cm_marketcap').val();
        var s = cm_marketcap.split(',').join('');
        if (s.length > 16) {
            flag = false;
            $('#cm_marketcap').focus();
            $("#cm_marketcap").css("border-color", "#a94442");
            $("#cm_marketcap").css("box-shadow", "none");
            $("#label_mar").css("color", "#a94442");
            $("#cm_marketcap_error").html('Please enter less than 16 characters');
        } else {
            $("#cm_marketcap").css("border-color", "#00a65a");
            $("#cm_marketcap").css("box-shadow", "none");
            $("#label_mar").css("color", "#00a65a");
            $("#cm_marketcap_error").html('');
        }
        var filesNotGiven = false;
        $("input[id^='cp_picture_']").each(function() {
            var textboxId = parseInt(this.id.replace("cp_picture_", ""));
            userfile = $('#cp_picture_' + textboxId).val()
            if (userfile != "") {
                filesNotGiven = true;
                return;
            }
        });
        if (filesNotGiven) {
            $("input[id^='cp_picture_']").each(function() {
                var textboxId = parseInt(this.id.replace("cp_picture_", ""));
                userfile = $('#cp_picture_' + textboxId).val()

            });
            var ext = userfile.split('.').pop().toLowerCase();
            if ($.inArray(ext, ['pdf', 'doc', 'docx', 'png', 'jpg', 'jpeg']) == -1) {
                $('#upload_files_error').html('Please choose allowed types only');
                flag = false;
            }
        }

        if (flag == true) {
            $('#loadUpdateDigital').show();

            var form_data = new FormData($('#update_digital_asset')[0]);
            $.ajax({
                url: baseUrl + '/Companies/updateDigitalAsset?id=' + time,
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                dataType: 'json',
                success: function(data) {
                    if (data != 0) {
                        $('#loadUpdateDigital').hide();
                        window.location = baseUrl + '/digital-assets';
                    }
                }

            });
        }
        e.preventDefault();
    });
}

function UpdateIcoTracker() {
    $("#cm_marketcap_error").html('');

    $('#update_ico_tracker').formValidation().on('success.form.fv', function(e) {
        $("#cm_marketcap_error").html('');
        e.stopImmediatePropagation();
        $('#loadUpdateIco').show();
        var flag = true;
        var cm_marketcap = $('#cm_marketcap').val();
        var s = cm_marketcap.split(',').join('');
        if (s.length > 16) {
            flag = false;
            $('#cm_marketcap').focus();
            $("#cm_marketcap").css("border-color", "#a94442");
            $("#cm_marketcap").css("box-shadow", "none");
            $("#label_mar").css("color", "#a94442");
            $("#cm_marketcap_error").html('Please enter less than 16 characters');
        } else {
            $("#cm_marketcap").css("border-color", "#00a65a");
            $("#cm_marketcap").css("box-shadow", "none");
            $("#label_mar").css("color", "#00a65a");
            $("#cm_marketcap_error").html('');
        }
        var filesNotGiven = false;
        $("input[id^='cp_picture_']").each(function() {
            var textboxId = parseInt(this.id.replace("cp_picture_", ""));
            userfile = $('#cp_picture_' + textboxId).val()
            if (userfile != "") {
                filesNotGiven = true;
                return;
            }
        });
        if (filesNotGiven) {
            $("input[id^='cp_picture_']").each(function() {
                var textboxId = parseInt(this.id.replace("cp_picture_", ""));
                userfile = $('#cp_picture_' + textboxId).val()

            });
            var ext = userfile.split('.').pop().toLowerCase();
            if ($.inArray(ext, ['pdf', 'doc', 'docx', 'png', 'jpg', 'jpeg']) == -1) {
                $('#upload_files_error').html('Please choose allowed types only');
                flag = false;
            }
        }

        if (flag == true) {

            var form_data = new FormData($('#update_ico_tracker')[0]);
            $.ajax({
                url: baseUrl + '/Companies/updateDigitalAsset?id=' + time,
                cache: false,
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                dataType: 'json',
                success: function(data) {
                    if (data != 0) {
                        $('#loadUpdateIco').hide();
                        window.location = baseUrl + '/ico-trackers';
                    }
                }

            });
        }
        e.preventDefault();
    });
}

function saveSpamEmail() {
    $('#loadingStatus').html('');
    $('#spamemail').formValidation().on('success.form.fv', function(e) {
        e.stopImmediatePropagation();
        $('#loadingError').html("Loading...");
        var u_email = $('#u_email').val();
        $.ajax({
            type: 'POST',
            url: baseUrl + '/User/spamEmail?id=' + time,
            data: { u_email: u_email },
            success: function(data) {
                $('#loadingError').html("");
                if (data == '1') {
                    $('#loadingStatus').html('Email setting is successfully changed ').css("color", "green");
                } else {
                    $('#loadingStatus').html('Server Fail').css("color", "red");
                }
            }
        });
        e.preventDefault();
    });
}

function updateAdminProfile() {
    $('#loadingStatus').html('');
    $('#updateprofile').formValidation().on('success.form.fv', function(e) {
        e.stopImmediatePropagation();
        var u_firstname = $('#u_firstname').val();
        var u_lastname = $('#u_lastname').val();
        var u_mobile = $('#u_mobile').val();
        $('#loadingError').html("Loading...");
        $.ajax({
            type: 'POST',
            url: baseUrl + '/User/myDashboard?id=' + time,
            data: { u_firstname: u_firstname, u_lastname: u_lastname, u_mobile: u_mobile },
            success: function(data) {
                $('#loadingError').html("");
                if (data == '1') {
                    $('#loadingStatus').html('Profile updated successfully').css("color", "green");
                } else {
                    $('#loadingStatus').html('Server Fail').css("color", "red");
                }
            }
        });
        e.preventDefault();
    });
}

function changePassword() {
    $('#errMesg').html('');
    $('#success').html('');
    var flag = true;
    $('#uChangePwd').formValidation().on('success.form.fv', function(e) {
        e.stopImmediatePropagation();
        var currentPass = $('#o_u_password').val();
        var newPass = $('#n_u_password').val();
        var confirmPass = $('#u_password').val();
        if (typeof(currentPass) != "undefined" && currentPass != "") {
            if (currentPass == newPass) {
                $('#errMesg').html('Current and new passwords are same');
                flag = false;
            }
            if (newPass != confirmPass) {
                $('#errMesg').html('The new password and its confirm password are not same');
                flag = false;
            }
        }
        if (flag == true) {
            $('#loadingError').show();
            $.ajax({
                type: 'POST',
                url: baseUrl + '/User/updatePassword?id=' + time,
                data: { newPass: newPass, currentPass: currentPass },
                success: function(data) {
                    $('#loadingError').hide();
                    if (data == '1') {
                        $('#o_u_password').val('');
                        $('#n_u_password').val('');
                        $('#u_password').val('');
                        $("#uChangePwd").trigger('reset');
                        $('#uChangePwd').formValidation('resetForm', true);
                        $('#uChangePwd').data('formValidation').resetForm();
                        $('#errMesg').html('');
                        $('#success').html('Password updated successfully');
                    } else {
                        $('#errMesg').html('');
                        $('#errMesg').html('Enter old password is wrong.');
                    }
                }
            });
        }
        e.preventDefault();
    });
}

function logout() {
    $('#logout').modal('show');
}

function logoutConfirm() {
    $.ajax({
        type: "GET",
        cache: false,
        url: baseUrl + '/admin-logout?id=' + time,
        success: function(res) {
            if (res == 1) {
                window.location = baseUrl;
            }
        }
    });
}

function loadCareers() {

    $("#careerManagementList").html("Please wait loading...");
    $.ajax({
        type: 'GET',
        cache: false,
        dataType: 'json',
        url: baseUrl + '/Careers/careerList?sRch=' + time,
        success: function(data) {
            $('#careerManagementList').html('<table id="faqQuestionsU" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">' +
                '<thead>' +
                '<tr>' +
                '<th>JobId</th>' +
                '<th>Posted Date</th>' +
                '<th>Title</th>' +
                '<th>Description </th>' +
                '<th>Qualification</th>' +
                '<th>Status</th>' +
                '<th>Actions</th>' +
                '</tr>' +
                '</thead>' +
                '<tbody></tbody></table>');
            var oTable = $('#faqQuestionsU').dataTable({
                "aLengthMenu": [
                    [25, 50, 75, 100, -1],
                    [25, 50, 75, 100, "All"]
                ],
                "iDisplayLength": 25,
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "aaData": data.aaData,
                "columnDefs": [
                    { "bSortable": false, "aTargets": [3] },
                    { "width": "20%", "targets": 0 },
                    { "width": "20%", "targets": 1 },
                    { "width": "25%", "targets": 2 },
                    { "width": "30%", "targets": 3 },
                    { "width": "10%", "targets": 4 },
                    { "width": "5%", "targets": 4 },
                    { "width": "5%", "targets": 4 },
                ],
                "aoColumns": [
                    { "mData": "bop_job_id" },
                    { "mData": "bop_job_created_at" },
                    { "mData": "bop_job_title" },
                    { "mData": "bop_job_description" },
                    { "mData": "bop_job_qualification" },
                    { "mData": "u_status" },
                    { "mData": "action" },
                ]
            });
        }
    });
}

function addCareer() {
    $('#successMsg').html('');
    $('#add_career').formValidation().on('success.form.fv', function(e) {
        e.stopImmediatePropagation();
        var bop_job_title = $("#bop_job_title").val();
        var bop_job_description = $("#bop_job_description").val();
        var bop_job_qualification = $("#bop_job_qualification").val();
        $('#loadAddUser').show();
        $.ajax({
            url: baseUrl + '/Careers/addCarer?id=' + time,
            data: { bop_job_title: bop_job_title, bop_job_description: bop_job_description, bop_job_qualification: bop_job_qualification },
            type: 'post',
            dataType: 'json',
            success: function(data) {
                $('#loadAddUser').hide();
                if (data.output == 'success') {
                    $('#bop_job_title').val('');
                    $('#bop_job_description').val('');
                    $('#bop_job_qualification').val('');
                    $('#successMsg').html('Career added successfully.').css("color", "green");
                    setTimeout(function() {
                        window.location = baseUrl + '/careers';
                    }, 2000);
                } else {
                    $('#successMsg').html('Data already exists.').css("color", "red");
                }
            }
        });
        e.preventDefault();
    });
}

function editCarer() {
    $('#successMsg').html('');
    $('#edit_career').formValidation().on('success.form.fv', function(e) {
        e.stopImmediatePropagation();
        var bop_job_title = $("#bop_job_title").val();
        var bop_job_description = $("#bop_job_description").val();
        var bop_job_qualification = $("#bop_job_qualification").val();
        var hid_bop_job_id = $("#bop_job_id").val();
        $('#loadAddUser').show();
        $.ajax({
            url: baseUrl + '/Careers/updateCareer?id=' + time,
            data: { bop_job_title: bop_job_title, bop_job_description: bop_job_description, bop_job_qualification: bop_job_qualification, hid_bop_job_id: hid_bop_job_id },
            type: 'post',
            dataType: 'json',
            success: function(data) {
                $('#loadAddUser').hide();
                if (data.output == 'success') {
                    $('#bop_job_title').val('');
                    $('#bop_job_description').val('');
                    $('#bop_job_qualification').val('');
                    $('#successMsg').html('Career updated successfully.').css("color", "green");
                    setTimeout(function() {
                        window.location = baseUrl + '/careers';
                    }, 2000);
                } else {
                    $('#successMsg').html('Data already exists.').css("color", "red");
                }
            }
        });
        e.preventDefault();
    });
}

function careerConforms(id, type) {
    $('#confrm_u_id').val(id);
    $('#confrm_type').val(type);
    if (type == 2) {
        $('#carerconfDeleteModal').modal('show');
    } else {
        $('#carerCfionModal').modal('show');
    }
}

function careerconfActions() {
    var confrm_u_id = $('#confrm_u_id').val();
    var confrm_type = $('#confrm_type').val();
    var flag = true;
    if (flag == true) {
        $('#conftp10').show();
        $.ajax({
            type: "POST",
            cache: false,
            url: baseUrl + '/Careers/careerActions1',
            data: { confrm_u_id: confrm_u_id, confrm_type: confrm_type },
            success: function(res) {
                $('#conftp10').hide();
                if (confrm_type == 2) {
                    $('#carerconfDeleteModal').modal('hide');
                } else {
                    $('#carerCfionModal').modal('hide');
                }
                setTimeout(function() {
                    loadCareers();
                }, 1000);

            }
        });
    }
}

function loadBanners() {
    //alert();return false;
    $("#bannerManagementList").html("Please wait loading...");
    $.ajax({
        type: 'GET',
        cache: false,
        dataType: 'json',
        url: baseUrl + '/Banners/bannerList?sRch=' + time,
        success: function(data) {
            $('#bannerManagementList').html('<table id="faqQuestionsU" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">' +
                '<thead>' +
                '<tr>' +
                '<th>Category</th>' +
                '<th>Image Name</th>' +
                '<th>Link</th>' +
                '<th>Status</th>' +
                '<th>Actions</th>' +
                '</tr>' +
                '</thead>' +
                '<tbody></tbody></table>');
            var oTable = $('#faqQuestionsU').dataTable({
                "aLengthMenu": [
                    [25, 50, 75, 100, -1],
                    [25, 50, 75, 100, "All"]
                ],
                "iDisplayLength": 25,
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "aaData": data.aaData,
                "columnDefs": [
                    { "bSortable": false, "aTargets": [3] },
                    { "width": "20%", "targets": 0 },
                    { "width": "20%", "targets": 1 },
                    { "width": "35%", "targets": 2 },
                    { "width": "10%", "targets": 3 },
                    { "width": "10%", "targets": 4 },
                ],
                "aoColumns": [
                    { "mData": "ct_name" },
                    { "mData": "sb_imagename" },
                    { "mData": "sb_link" },
                    { "mData": "u_status" },
                    { "mData": "action" },
                ]
            });
        }
    });
}

function addBanner() {
    $('#successMsg').html('');
    var _URL = window.URL || window.webkitURL;
    var sb_ct_id = $("#sb_ct_id").val();
    var sb_imagename = $("#sb_imagename").val();
    var sb_link = $("#sb_link").val();
    if (sb_ct_id == "") {
        $("#sb_ct_id_error").html("Company name is required and cannot be empty").css("color", "#a94442");
        $("select").css("border", "1px solid #a94442");
    } else {
        $("#sb_ct_id_error").html(" ");
        $("select").css("border", "");
    }
    if (sb_link == "") {
        $("#sb_link_error").html("Link is required and cannot be empty").css("color", "#a94442");
        $("input").css("border", "1px solid #a94442");
    } else {
        $("#sb_link_error").html(" ");
        $("input").css("border", "");
    }
    if (sb_imagename == "") {
        $("#sb_imagename_error").html("Image name is required and cannot be empty").css("color", "#a94442");
    } else if (sb_imagename != "") {
        var ext = sb_imagename.split('.').pop().toLowerCase();
        if ($.inArray(ext, ['jpg', 'jpeg', 'png']) == -1) {
            $("#sb_imagename_error").html("Image allowed types are png,jpg,jpeg only.").css("color", "#a94442");
            flag = false;
        }
    } else {
        $("#sb_imagename_error").html(" ");
        $("input").css("border", "");
    }
    var file = $("#sb_imagename")[0].files[0];
    img = new Image();
    var imgwidth = 0;
    var imgheight = 0;
    var maxwidth = 700;
    var maxheight = 550;
    img.src = _URL.createObjectURL(file);
    img.onload = function() {
        imgwidth = this.width;
        imgheight = this.height;
        //alert(imgheight);
        if (imgwidth == maxwidth && imgheight == maxheight) {
            //alert(sb_ct_id);
            var form_data = new FormData($('#add_banner')[0]);
            $.ajax({
                url: baseUrl + '/Banners/addBanner?id=' + time,
                dataType: 'json',
                contentType: false,
                processData: false,
                data: form_data,
                type: 'post',
                success: function(data) {
                    if (data.output == 'success') {
                        $('#sb_ct_id').val('');
                        $('#sb_imagename').val('');
                        $('#sb_link').val('');
                        $('#successMsg').html('Banner added successfully.').css("color", "green");
                        setTimeout(function() {
                            window.location = baseUrl + '/banners';
                        }, 2000);
                    }
                }
            });
        } else {
            $("#sb_imagename_error").html("Image size must be " + maxwidth + "X" + maxheight).css("color", "#a94442");
        }
    }


}

function editBanner() {
    $('#successMsg').html('');
    var _URL = window.URL || window.webkitURL;
    var sb_ct_id = $("#sb_ct_id").val();
    var sb_imagename = $("#sb_imagename").val();
    var sb_link = $("#sb_link").val();
    var sb_id = $("#sb_id").val();
    var hid_image = $("#hid_image").val();
    $("#sb_ct_id_error").html(" ");
    $("#sb_imagename_error").html(" ");
    $("#sb_link_error").html(" ");
    if (sb_ct_id == "") {
        $("#sb_ct_id_error").html("Company name is required and cannot be empty").css("color", "#a94442");
    }

    if (sb_link == "") {
        $("#sb_link_error").html("Link is required and cannot be empty").css("color", "#a94442");
    }
    if (sb_imagename != "") {
        var ext = sb_imagename.split('.').pop().toLowerCase();
        if ($.inArray(ext, ['jpg', 'jpeg', 'png']) == -1) {
            $("#sb_imagename_error").html("Image allowed types are png,jpg,jpeg only.").css("color", "#a94442");
            flag = false;
        }
    }
    var file = $("#sb_imagename")[0].files[0];
    if (typeof file != "undefined") {
        img = new Image();
        var imgwidth = 0;
        var imgheight = 0;
        var maxwidth = 700;
        var maxheight = 550;
        img.src = _URL.createObjectURL(file);
        img.onload = function() {
            imgwidth = this.width;
            imgheight = this.height;
            if (imgwidth == maxwidth && imgheight == maxheight) {
                var form_data = new FormData($('#edit_banner')[0]);
                $.ajax({
                    url: baseUrl + '/Banners/editBanner?id=' + time,
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    data: form_data,
                    type: 'post',
                    success: function(data) {
                        if (data.output == 'success') {
                            $('#sb_ct_id').val('');
                            $('#sb_imagename').val('');
                            $('#sb_link').val('');
                            $('#successMsg').html('Banner updated successfully.').css("color", "green");
                            setTimeout(function() {
                                window.location = baseUrl + '/banners';
                            }, 2000);
                        }
                    }
                });
            } else {
                $("#sb_imagename_error").html("Image size must be " + maxwidth + "X" + maxheight).css("color", "#a94442");
            }
        }
    } else {
        var form_data = new FormData($('#edit_banner')[0]);
        $.ajax({
            url: baseUrl + '/Banners/editBanner?id=' + time,
            dataType: 'json',
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(data) {
                if (data.output == 'success') {
                    $('#sb_ct_id').val('');
                    $('#sb_imagename').val('');
                    $('#sb_link').val('');
                    $('#successMsg').html('Banner updated successfully.').css("color", "green");
                    setTimeout(function() {
                        window.location = baseUrl + '/banners';
                    }, 2000);
                }
            }
        });
    }

}

function bannerConforms(id, type) {
    $('#confrm_u_id').val(id);
    $('#confrm_type').val(type);
    if (type == 2) {
        $('#banerconfDeleteModal').modal('show');
    } else {
        $('#banerCfionModal').modal('show');
    }
}

function banerconfActions() {
    var confrm_u_id = $('#confrm_u_id').val();
    var confrm_type = $('#confrm_type').val();
    var flag = true;
    if (flag == true) {
        $('#conftp10').show();
        $.ajax({
            type: "POST",
            cache: false,
            url: baseUrl + '/Banners/banerActions1',
            data: { confrm_u_id: confrm_u_id, confrm_type: confrm_type },
            success: function(res) {
                $('#conftp10').hide();
                if (confrm_type == 2) {
                    $('#banerconfDeleteModal').modal('hide');
                } else {
                    $('#banerCfionModal').modal('hide');
                }
                setTimeout(function() {
                    loadBanners();
                }, 1000);

            }
        });
    }
}

function loademails() {
    //alert(baseUrl);return false;
    $("#subscribeManagementList").html("Please wait loading...");
    $.ajax({
        type: 'GET',
        cache: false,
        dataType: 'json',
        url: baseUrl + '/Subscribe/getSubscribeList?sRch=' + time,
        success: function(data) {
            $('#subscribeManagementList').html('<table id="faqQuestionsU" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">' +
                '<thead>' +
                '<tr>' +
                '<th>Subscribe ID</th>' +
                // '<th>Name</th>' +
                '<th>Email</th>' +
                '<th>Status</th>' +
                '<th>Actions</th>' +
                '</tr>' +
                '</thead>' +
                '<tbody></tbody></table>');
            var oTable = $('#faqQuestionsU').dataTable({
                "aLengthMenu": [
                    [25, 50, 75, 100, -1],
                    [25, 50, 75, 100, "All"]
                ],
                "iDisplayLength": 25,
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "aaData": data.aaData,
                "columnDefs": [
                    { "bSortable": false, "aTargets": [3] },
                    { "width": "20%", "targets": 0 },
                    { "width": "30%", "targets": 1 },
                    { "width": "20%", "targets": 2 },
                    { "width": "10%", "targets": 3 },

                ],
                "aoColumns": [
                    { "mData": "bop_sub_id" },
                    // { "mData": "bop_sub_name" },
                    { "mData": "bop_sub_email" },
                    { "mData": "u_status" },
                    { "mData": "action" },
                ]
            });
        }
    });
}

function addEmail() {
    //alert();
    $('#successMsg').html('');
    $('#add_email').formValidation().on('success.form.fv', function(e) {
        e.stopImmediatePropagation();
        var email = $("#email").val();
        // var name = $("#name").val();
        //alert(email)
        $('#loadAddUser').show();
        $.ajax({
            url: baseUrl + '/Subscribe/addEmails?id=' + time,
            cache: false,
            data: { email: email },
            type: 'post',
            dataType: 'json',
            success: function(data) {
                $('#loadAddUser').hide();
                //alert(data.output);
                if (data.output == 'success') {
                    $('#email').val('');
                    $('#successMsg').html('Email added successfully.').css("color", "green");
                    setTimeout(function() {
                        window.location = baseUrl + '/subscribe';
                    }, 2000);
                } else if (data.output == "emailexists") {
                    $('#email').focus();
                    $('#successMsg').html('Entered email is already with us.').css("color", "red");
                } else {
                    $('#successMsg').html('Server Fail.').css("color", "red");
                }
            }
        });
        e.preventDefault();
    });
}

function editEmails() {
    $('#successMsg').html('');
    $('#edit_email').formValidation().on('success.form.fv', function(e) {
        e.stopImmediatePropagation();
        // var name = $("#name").val();
        var email = $("#email").val();
        var h_subid = $("#h_subid").val();
        //alert(email)
        $('#loadAddUser').show();
        $.ajax({
            url: baseUrl + '/Subscribe/editEmail?id=' + time,
            cache: false,
            data: { email: email, h_subid: h_subid },
            type: 'post',
            dataType: 'json',
            success: function(data) {
                $('#loadAddUser').hide();
                //alert(data.output);
                if (data.output == 'success') {
                    $('#successMsg').html('Email updated sucessfully.').css("color", "green");
                    setTimeout(function() {
                        window.location = baseUrl + '/subscribe';
                    }, 1000);
                } else if (data.output == 'emailexists') {
                    $('#successMsg').html('Email already exists.').css("color", "green");
                    setTimeout(function() {
                        window.location = baseUrl + '/subscribe';
                    }, 1000);
                }
            }
        });
        e.preventDefault();
    });
}

function emailConforms(id, type) {
    $('#email_u_id').val(id);
    $('#email_confrm_type').val(type);
    if (type == 2) {
        $('#emailconfDeleteModal').modal('show');
    } else {
        $('#emailCfionModal').modal('show');
    }
}

function emailconfActions() {
    var email_u_id = $('#email_u_id').val();
    var email_confrm_type = $('#email_confrm_type').val();
    //alert(email_confrm_type);	
    var flag = true;
    if (flag == true) {
        $('#conftp11').show();
        $.ajax({
            type: "POST",
            cache: false,
            url: baseUrl + '/Subscribe/emailActions1',
            data: { email_u_id: email_u_id, email_confrm_type: email_confrm_type },
            success: function(res) {
                $('#conftp11').hide();
                if (email_confrm_type == 2) {
                    $('#emailconfDeleteModal').modal('hide');
                } else {
                    $('#emailCfionModal').modal('hide');
                }
                setTimeout(function() {
                    loademails();
                }, 1000);

            }
        });
    }
}

function loadCheckbox() {
    //alert();return false;
    $("#checkboxManagementList").html("Please wait loading...");
    $.ajax({
        type: 'GET',
        cache: false,
        dataType: 'json',
        url: baseUrl + '/Subscribe/getCheckboxList?sRch=' + time,
        success: function(data) {
            $('#checkboxManagementList').html('<table id="faqQuestionsU" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">' +
                '<thead>' +
                '<tr>' +
                '<th>Select<input type="checkbox" id="mass_select_all" name= "mass_select_all[]"  data-to-table="tasks" class="checkboxClass"></th>' +
                // '<th>Name</th>' +
                '<th>Email</th>' +
                '</tr>' +
                '</thead>' +
                '<tbody></tbody></table>');

            var oTable = $('#faqQuestionsU').dataTable({
                "aLengthMenu": [
                    [25, 50, 75, 100, -1],
                    [25, 50, 75, 100, "All"]
                ],
                "iDisplayLength": 25,
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "aaData": data.aaData,
                "columnDefs": [
                    { "bSortable": false, "aTargets": [1] },
                    { "width": "20%", "targets": 0 },
                    //{ "width": "20%", "targets": 1 },
                    //{ "width": "20%", "targets": 2 },


                ],
                "aoColumns": [
                    { "mData": "check_value" },
                    // { "mData": "bop_sub_name" },
                    { "mData": "bop_sub_email" },

                ]
            });
            $("#mass_select_all").change(function() { //alert(); //"select all" change
                $(".check").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
            });
        }
    });
}

function sendMail() {
    $('#successMsg').html('');
    $('#add_email').formValidation().on('success.form.fv', function(e) {
        e.stopImmediatePropagation();
        var email = $("#email").val();
        var name = $("#name").val();
        //alert(email)
        $('#loadAddUser').show();
        $.ajax({
            url: baseUrl + '/Subscribe/addEmails?id=' + time,
            cache: false,
            data: { email: email, name: name },
            type: 'post',
            dataType: 'json',
            success: function(data) {

            }
        });
        e.preventDefault();
    });
}

function sendMailActions() {
    //alert('hai');return false;
    var article_desc = CKEDITOR.instances["article_desc"].getData();
    var hid_val = $('#hid_val').val();
    //alert(hid_val);
    var flag = true;
    if (flag = true) {
        $.ajax({
            url: baseUrl + '/Subscribe/mailtemplate?id=' + time,
            cache: false,
            data: { hid_val: hid_val, article_desc: article_desc },
            type: 'post',
            dataType: 'json',
            success: function(data) {
                if (data.output == 'success') {
                    $('#successMsg').html('Email send sucessfully.').css("color", "green");
                    setTimeout(function() {
                        window.location = baseUrl + '/subscribe';
                    }, 1000);
                }
            }
        });
    }
}

function addtemplate() {
    //alert('hai');return false;
    var article_desc = CKEDITOR.instances["article_desc"].getData();
    var hid_val = $('#hid_val').val();
    //alert(hid_val);
    var flag = true;
    if (flag = true) {
        $.ajax({
            url: baseUrl + '/Subscribe/addmailtemplate?id=' + time,
            cache: false,
            data: { hid_val: hid_val, article_desc: article_desc },
            type: 'post',
            dataType: 'json',
            success: function(data) {
                if (data.output == 'success') {
                    window.location = baseUrl + '/subscribe';
                } else if (data.output == 'fail') {
                    alert('Plese select user emails.');
                }
            }
        });
    }
}

function addfile() {
    $('#add_file').submit();
    //$('#add_file').formValidation().on('success.form.fv', function(e) {
    // e.stopImmediatePropagation();

    // e.preventDefault();
    //});
}

function exportCompaniesOn() {
    $('#exportCompanies').formValidation().on('success.form.fv', function(e) {
        $("#exportLoader").show();
        $('#exportMsg').html('');
        e.stopImmediatePropagation();
        var type = $("input:radio[name=companyType]:checked").val();
        $.ajax({
            type: "POST",
            cache: false,
            dataType: 'json',
            url: baseUrl + '/ExcelActions/exportCompanies?srch=' + time,
            data: { type: type },
            success: function(res) {
                // console.log(res);
                if (res.status == 1) {
                    $("#exportLoader").hide();
                    $('#exportMsg').html(res.message).css("color", "green");
                    window.location = mainUrl + res.output;

                    setTimeout(function() {
                        $('#exportMsg').html('');
                    }, 5000)
                } else {
                    $("#exportLoader").hide();
                    $('#exportMsg').html(res.message).css("color", "red");
                    setTimeout(function() {
                        $('#exportMsg').html('');
                    }, 2000)
                }
            }
        });
        e.preventDefault();
    });
    // alert(type);
}

function importfile() {
    $('#import_file').formValidation().on('success.form.fv', function(e) {
        $("#importLoader").show();
        $('#importMsg').html('');
        e.stopImmediatePropagation();
        $.ajax({
            url: baseUrl + '/ExcelActions/importCompanies?srch=' + time,
            type: "POST",
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function(res) {
                if (res.status == 1) {
                    $("#importLoader").hide();
                    $('#importMsg').html(res.message).css("color", "green");
                    setTimeout(function() {
                        $('#import_file')[0].reset();
                        $('#importMsg').html('');
                    }, 5000)
                } else {
                    $("#importLoader").hide();
                    $('#importMsg').html(res.message).css("color", "red");
                    setTimeout(function() {
                        $('#import_file')[0].reset();
                        $('#importMsg').html('');
                    }, 5000)
                }
            }
        });
        e.preventDefault();
    });
}