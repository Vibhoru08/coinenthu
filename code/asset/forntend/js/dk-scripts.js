var d = new Date();
var time = d.getTime();
function redirectPage(pageName){
	if(pageName=='home'){
		window.location = baseUrl + 'home';
	}else if(pageName=='abt'){
        window.location = baseUrl + 'about-us';
        localStorage.setItem('type','viewed');
		localStorage.setItem('page_name',1);
	}else if(pageName=='digi'){
		window.location = baseUrl + 'digital-assets';
		localStorage.setItem('type','viewed');
		localStorage.setItem('page_name',2);
	}else if(pageName=='events'){
		window.location = baseUrl + 'events';
		localStorage.setItem('type','viewed');
		localStorage.setItem('page_name',4);
	}else if(pageName=='ico'){
		localStorage.setItem('type','edtA');
		localStorage.setItem('page_name',3);
		window.location = baseUrl + 'ico-tracker';
	}
}
$(document).ready(function() {
    var remember = $.cookie('remember');
    $('#loginErrorMsg').hide();
    $('#loginErrorMsg').removeClass("show").addClass("hide");
    if (remember == 'true') {
        var email = $.cookie('email');
        var password = $.cookie('password');
        $('#u_email').val(email);
        $('#u_password').val(password);
    } else {
        $("#u_email").focus();
    }
    $('#loginForm').formValidation();
    $('#regForm').formValidation();
    $("#o_u_password").val('');
    $('#uChangePwd').formValidation();
    $('#uresetpassword').formValidation();
    $("#n_u_password").val('');
    $('#forgotPwdd').formValidation();
    $("#fg_u_email").focus();
    $('#profile_edit').formValidation();
    $("#p_u_firstname").focus();
});

function userProfileUpdate() {
    $('#successMsg').html('');
    $('#profile_edit').formValidation().on('success.form.fv', function(e) {
        e.stopImmediatePropagation();
        var fname = $("#p_u_firstname").val();
        var lname = $("#p_u_lastname").val();
        var uname = $("#p_u_username").val();
        var about = $("#p_u_about").val();
        var uImage = $('#userhidImage').val();
        var form_data = new FormData();
        form_data.append('u_firstname', fname);
        form_data.append('u_lastname', lname);
        form_data.append('u_username', uname);
        form_data.append('u_about', about);
        form_data.append('u_picture', uImage);
        $('#loadAddUser').show();
        $.ajax({
            url: baseUrl + 'User/updateUserProfile?id=' + time,
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            dataType: 'json',
            success: function(data) {
                $('#loadAddUser').hide();
                if (data.output == 'success') {
                    $('#successMsg').html('Profile updated successfully.').css("color", "green");
                    setTimeout(function() {
                        window.location = baseUrl;
                    }, 3000);
                } else {
                    $('#successMsg').html('Server Fail.').css("color", "red");
                }
            }
        });
        e.preventDefault();
    });
}

function varifiedLink() {
    var uid = $("#hid_uid").val();
    $('#loadingmine').removeClass("hide").addClass("show");
    $.ajax({
        type: 'POST',
        url: baseUrl + '/Login/verifiedAuthReg?expireTime=' + time,
        data: { uid: uid, verifyid: time },
        dataType: 'json',
        success: function(data) {
            $('#loadingmine').removeClass("show").addClass("hide");
            if (data.output == 'success') {
                window.location = baseUrl + 'login';
            } else {
                window.location = baseUrl;
            }
        }
    });
}

function userRegister() {
    $('#regForm').formValidation().on('success.form.fv', function(e) {
        e.stopImmediatePropagation();
        $("#loadingmine").removeClass("hide").addClass("show");
        $('#emailverified').removeClass("show").addClass("hide");
        $('#usernameverified').removeClass("show").addClass("hide");
        var uemail = $("#uemail").val();
        var upassword = $("#upassword").val();
        var username = $("#username").val();
        $.ajax({
            type: 'POST',
            url: baseUrl + '/Login/userRegister?expireTime=' + time,
            data: { uemail: uemail, upassword: upassword, username: username },
            dataType: 'json',
            success: function(data) {
                $('#loadingmine').removeClass("show").addClass("hide");
                if (data.output == 'success') {
                    // var token_uid = data.uid;
                    // window.location = baseUrl+'activate-link?revificationid='+token_uid;
                    $('#myModalLabelw').html('Registration Confirmation');
                    $('#alert-message').html('Thank you for registering with us. Please check your email for confirmation link.');
                    $('#hidden_common').modal('show');
                    $("#uemail").val('');
                    $("#upassword").val('');
                    $("#username").val('');
                    $("#regForm").trigger('reset');
                    $('#regForm').formValidation('resetForm', true);
                    $('#regForm').data('formValidation').resetForm();
                } else if (data.output == 'fail') {
                    $('#emailverified').removeClass("hide").addClass("show");
                } else if (data.output == 'failed') {
                    $('#usernameverified').removeClass("hide").addClass("show");
                }
            }
        });
        e.preventDefault();
    });
}

function resetPassword() {
    $('#errMesg').html('');
    $('#success').html('');
    var flag = true;
    $('#uresetpassword').formValidation().on('success.form.fv', function(e) {
        e.stopImmediatePropagation();
        var confirmPass = $('#u_password').val();
        var u_id = $('#u_id').val();
        $('#loadingError').show();
        $.ajax({
            type: 'POST',
            url: baseUrl + 'Login/resetUpdatePassword?id=' + time,
            data: { confirmPass: confirmPass, u_id: u_id },
            success: function(data) {
                $('#loadingError').hide();
                if (data == '1') {
                    $('#errMesg').html('');
                    $('#success').html('Password resetted successfully');
                    window.location = baseUrl + 'login';
                }
            }
        });
        e.preventDefault();
    });
}


function userlogoutmode() {
    $('#userlogoutmodal').modal('show');
}

function userLogin() {
    $('#loginForm').formValidation().on('success.form.fv', function(e) {
        e.stopImmediatePropagation();
        var uemail = $("#u_email").val();
        var upassword = $("#u_password").val();
        var rememberme = $("#remember").val();
        var redirectPage = $("#redirectPage").val();
        $('#loading').removeClass("hide").addClass("show");
        $.ajax({
            type: 'POST',
            url: baseUrl + '/Login/userLogin?expireTime=' + time,
            data: { uemail: uemail, upassword: upassword },
            dataType: 'json',
            success: function(data) {
                $('#loading').removeClass("show").addClass("hide");
                if (data.output == 'success') {
                    if ($('#remember').is(':checked')) {
                        $.cookie('email', uemail, { expires: 24 });
                        $.cookie('password', upassword, { expires: 24 });
                        $.cookie('remember', true, { expires: 24 });
                    } else {
                        $.cookie('email', null);
                        $.cookie('password', null);
                        $.cookie('remember', null);
                    }
                    if (redirectPage == 1) {
                        window.location = baseUrl + 'add-digital-asset';
                    } else if (redirectPage == 2) {
                        window.location = baseUrl + 'add-ico-tracker';
                    } else if (redirectPage == 3) {
                        window.location = baseUrl + 'add-event';
                    }else {
                        window.location = baseUrl;
                    }
                } else {
                    $('#loginErrorMsg').html('');
                    $('#loginErrorMsg').removeClass("hide").addClass("show");
                    $('#loginErrorMsg').show();
                    $('#loginErrorMsg').html('Please enter valid Email and Password.');
                }
            }
        });
        e.preventDefault();
    });
}

function forgotPasswordd() {
    $('#errMesg').html('');
    $('#success').html('');
    var flag = true;
    $('#forgotPwdd').formValidation().on('success.form.fv', function(e) {
        e.stopImmediatePropagation();
        var u_email = $('#fg_u_email').val();
        $('#loadingError').show();
        $.ajax({
            type: 'POST',
            url: baseUrl + 'Login/forgotPassword?id=' + time,
            data: { u_email: u_email },
            dataType: 'json',
            success: function(data) {
                $('#loadingError').hide();
                if (data.output == 'fail') {
                    $('#errMesg').html('Entered email is not on records.');
                } else {
                    // var token = data.token;
                    $('#fg_u_email').val('');
                    $('#success').html('Password reset link sent to your EmailID,\n Please check your email.');
                    $("#forgotPwdd").trigger('reset');
                    $('#forgotPwdd').formValidation('resetForm', true);
                    $('#forgotPwdd').data('formValidation').resetForm();
                    setTimeout(function() {
                        window.location = baseUrl + 'login';
                    }, 3000);
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
                $('#errMesg').html('');
                flag = false;
            } else {
                flag = true;
            }
            if (newPass != confirmPass) {
                $('#errMesg').html('The new password and its confirm password are not same.');
                flag = false;
            } else {
                flag = true;
            }
        }
        if (flag == true) {
            $('#loadingError').show();
            $.ajax({
                type: 'POST',
                url: baseUrl + 'User/updatePassword?id=' + time,
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
                        $('#errMesg').html('Entered current password is wrong.');
                    }
                }
            });
        }
        e.preventDefault();
    });
}
function filterEvents(type) {
	$("#offsetpage").val(1);
    $("#limitpage").val(12);
    if ($("#pageMode").val() == 'digital' || $("#pageMode").val() == 'mylist_digital') {
        var filterTitle = 'Most reviewed';
        $("#filter_id").val(1);
    } else {
        var filterTitle = 'Ending soon';
        $("#filter_id").val(6);

    }

    var htmlReload = filterTitle + '<div class="arrow_down"><span class="caret"></span></div>';
    $("#filtername").html(htmlReload);
    var offsetpage = 0;
    var limitpage = $("#limitpage").val();
    var pageMode = $("#pageMode").val();
    var filterId = $("#filter_id").val();
		if($("#searchterms1").val() ==""){
				var searchterms = $("#searchterms").val();
			} else {
				var searchterms = $("#searchterms1").val();
			}
    if (searchterms.length >= 3) {
        searchterms = searchterms;
    } else {
        searchterms = "";
    }
    $('.company_list').html('');
    var url = baseUrl + 'Company/loadmoreEvents?expireTime=' + time;
    var relaoding = '<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading'
    $('.company_list').html(relaoding);
    $('#loadingHash1').hide();
    $.ajax({
        type: "POST",
        url: url,
        cache: false,
        data: {
            limitpage: limitpage,
            offsetpage: offsetpage,
            pageMode: pageMode,
            filterId: filterId,
            filter: "filetrfrom",
            searchterms: searchterms
        },
        dataType: "json",
        success: function(data) {

            console.log(data.output);
            if (data.output == 'success') {
                setTimeout(function() {
                    $(".company_list").html(data.resData);
                    $('#loadingHash1').show();
                    if (data.cnt > 12) {
                        $('#loadingHash1').show();
                        $('#loadingHash1').removeClass('mm_bttom hide');
                    }
                    $('#offsetpage').val(parseInt($('#limitpage').val()) + parseInt(offsetpage));
                    var $input = $('.rating-loading');
                    $input.rating();
                    $('.caption').hide();
                    $('.clear-rating').hide();
                }, 1000);

            } else if (data.output == 'norecoreds') {
                setTimeout(function() {
                    $(".company_list").html(data.resData);
                    // $('#offsetpage').val( parseInt($('#limitpage').val()) +parseInt(offsetpage) );
                }, 1000);
            }
        }
    });
    $(".hide_menu").css("display", "none");
}
function filterCompanies(type,pagemode,limit) {
	localStorage.setItem('type',type);
	localStorage.setItem('page_name',pagemode);
	$("#offsetpage").val(1);
	if(limit!=null){
		$("#limitpage").val(limit);
	}else{
    $("#limitpage").val(9);
	}
    if ($("#pageMode").val() == 'digital' || $("#pageMode").val() == 'mylist_digital') {
        var filterTitle = 'Most reviewed';
        $("#filter_id").val(2);
    } else {
        var filterTitle = 'Ending soon';
        $("#filter_id").val(6);

    }
    if (type == 'rating') {
        $("#filter_id").val(1);
	    filterTitle = "Highest rating";
    } else if (type == 'viewed') {
		$("#filter_id").val(2);
		filterTitle = "Most reviewed";
    } else if (type == 'mch') {
        $("#filter_id").val(3);
        filterTitle = "Market cap (High to Low)";
    } else if (type == 'mcl') {
        $("#filter_id").val(4);
        filterTitle = "Market cap (Low to High)";
    } else if (type == 'sdtA') {
        $("#filter_id").val(5);
        filterTitle = "ICO start date (Asc to Desc)";
    } else if (type == 'sdtD') {
        $("#filter_id").val(6);
        filterTitle = "ICO start date (Desc to Asc)";
    } else if (type == 'edtA') {
        $("#filter_id").val(7);
        filterTitle = "Ending soon";
    } else if (type == 'edtD') {
        $("#filter_id").val(8);
        filterTitle = "ICO end date (Desc to Asc)";
    }
    var htmlReload = filterTitle + '<div class="arrow_down"><span class="caret"></span></div>';
    $("#filtername").html(htmlReload);
    var offsetpage = 0;
    var limitpage = $("#limitpage").val();
    var pageMode = $("#pageMode").val();
    var filterId = $("#filter_id").val();
		if($("#searchterms1").val() ==""){
				var searchterms = $("#searchterms").val();
			} else {
				var searchterms = $("#searchterms1").val();
			}
    if (searchterms.length >= 3) {
        searchterms = searchterms;
    } else {
        searchterms = "";
    }
    $('.company_list').html('');
    var url = baseUrl + 'Company/loadmoreCompanies?expireTime=' + time;
    var relaoding = '<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading'
    $('.company_list').html(relaoding);
    $('#loadingHash1').hide();
    $.ajax({
        type: "POST",
        url: url,
        cache: false,
        data: {
            limitpage: limitpage,
            offsetpage: offsetpage,
            pageMode: pageMode,
            filterId: filterId,
            filter: "filetrfrom",
            searchterms: searchterms
        },
        dataType: "json",
        success: function(data) {

            console.log(data.output);
            if (data.output == 'success') {
                setTimeout(function() {
									if($("#home_no_display").val()==3){
										  $(".company_list").fadeOut();
									}else{
                    $(".company_list").html(data.resData);
									}
                    $('#loadingHash1').show();
                    if (data.cnt > 6) {
                        $('#loadingHash1').show();
                        $('#loadingHash1').removeClass('mm_bttom hide');
                    }
                    $('#offsetpage').val(parseInt($('#limitpage').val()) + parseInt(offsetpage));
                    var $input = $('.rating-loading');
                    $input.rating();
                    $('.caption').hide();
                    $('.clear-rating').hide();
                }, 1000);

            } else if (data.output == 'norecoreds') {
                setTimeout(function() {
                    $(".company_list").html(data.resData);
                    // $('#offsetpage').val( parseInt($('#limitpage').val()) +parseInt(offsetpage) );
                }, 1000);
            }
        }
    });
    $(".hide_menu").css("display", "none");
}
function sreachterm2() {
    $("#offsetpage").val(1);
    // $("#limitpage").val(4);
  //  $('#loadingHash1').hide();

    var searchterms = $("#searchterms").val();
    if (searchterms == '' || searchterms == 'undefined') {
        var type = $("#filter_id").val();
        filterEvents(type);
    } else if (searchterms.length >= 3) {
        var offsetpage = 0;
        var limitpage = $("#limitpage").val();
        var pageMode = $("#pageMode").val();
        var filterId = $("#filter_id").val();
        $('.company_list').html('');
        var url = baseUrl + 'Company/loadmoreEvents?expireTime=' + time;
        var relaoding = '<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading'
        $('.company_list').html(relaoding);
        $.ajax({
            type: "POST",
            url: url,
            cache: false,
            data: {
                limitpage: limitpage,
                offsetpage: offsetpage,
                pageMode: pageMode,
                filterId: filterId,
                filter: "filetrfrom",
                searchterms: searchterms
            },
            dataType: "json",
            success: function(data) {
                console.log(data.output);
                if (data.output == 'success') {
                    setTimeout(function() {
                        $(".company_list").html(data.resData);
                        if (data.cnt > 12) {
                            $('#loadingHash1').show();
                            $('#loadingHash1').removeClass('mm_bttom hide');
                        }
                        $('#offsetpage').val(parseInt($('#limitpage').val()) + parseInt(offsetpage));
                        var $input = $('.rating-loading');
                        $input.rating();
                        $('.caption').hide();
                        $('.clear-rating').hide();
                    }, 1000);
                } else if (data.output == 'norecoreds') {
                    setTimeout(function() {
                        $(".company_list").html(data.resData);
                        // $('#offsetpage').val( parseInt($('#limitpage').val()) +parseInt(offsetpage) );
                    }, 1000);
                }
            }
        });
    }
}
function sreachterm() {
    $("#offsetpage").val(1);
    // $("#limitpage").val(4);
    $('#loadingHash1').hide();
		if($("#home_no_display").val()==3){
				$(".company_list").fadeIn();
		}
		if($("#searchterms1").val() ==""){
    		var searchterms = $("#searchterms").val();
			} else {
				var searchterms = $("#searchterms1").val();
			}
    if (searchterms == '' || searchterms == 'undefined') {
        var type = $("#filter_id").val();
        filterCompanies(type);
    } else if (searchterms.length >= 3) {
        var offsetpage = 0;
        var limitpage = $("#limitpage").val();
        var pageMode = $("#pageMode").val();
        var filterId = $("#filter_id").val();
		if(filterId == '1'){
			var type = "rating";
		}else if(filterId == '2'){
			var type = "viewed";
		}else if(filterId == '3'){
			var type = "mch";
		}else if(filterId == '4'){
			var type = "mcl";
		}else if(filterId == '5'){
			var type = "sdtA";
		}else if(filterId == '6'){
			var type = "sdtD";
		}else if(filterId == '7'){
			var type = "edtA";
		}else if(filterId == '8'){
			var type = "edtD";
		}
		if(pageMode=='digital'){
			var pagemodebtn = 1;
		}else if(pageMode=='icos'){
			var pagemodebtn = 2;
		}else if(pageMode=='mylist_digital'){
			var pagemodebtn = 3;
		}else if(pageMode=='mylist_icos'){
			var pagemodebtn = 4;
		}
		localStorage.setItem('type',type);
		localStorage.setItem('page_name',pagemodebtn);

        $('.company_list').html('');
        var url = baseUrl + 'Company/loadmoreCompanies?expireTime=' + time;
        var relaoding = '<i class="fa fa-spinner fa-pulse fa-fw"></i> Loading'
        $('.company_list').html(relaoding);
        $.ajax({
            type: "POST",
            url: url,
            cache: false,
            data: {
                limitpage: limitpage,
                offsetpage: offsetpage,
                pageMode: pageMode,
                filterId: filterId,
                filter: "filetrfrom",
                searchterms: searchterms
            },
            dataType: "json",
            success: function(data) {
                console.log(data.output);
                if (data.output == 'success') {
                    setTimeout(function() {
                        $(".company_list").html(data.resData);
                        if (data.cnt > 6) {
                            $('#loadingHash1').show();
                            $('#loadingHash1').removeClass('mm_bttom hide');
                        }
                        $('#offsetpage').val(parseInt($('#limitpage').val()) + parseInt(offsetpage));
                        var $input = $('.rating-loading');
                        $input.rating();
                        $('.caption').hide();
                        $('.clear-rating').hide();
                    }, 1000);
                } else if (data.output == 'norecoreds') {
                    setTimeout(function() {
                        $(".company_list").html(data.resData);
                        // $('#offsetpage').val( parseInt($('#limitpage').val()) +parseInt(offsetpage) );
                    }, 1000);
                }
            }
        });
    }
}

function eidtCompanyView(cm_id, cmtype) {
    if (cmtype == '1') {
        window.location = baseUrl + 'digital-asset-edit/' + cmtype + '-' + cm_id;
    } else {
        window.location = baseUrl + 'ico-tracker-edit/' + cmtype + '-' + cm_id;
    }
}

function deleteCompanyview(cm_id, cmtype) {
    $("#hidcmid").val(cm_id);
    $("#hidcType").val(cmtype);
    if (cmtype == 1) {
        var textType = 'digital asset';
    } else {
        var textType = 'ico tracker';
    }
    $('#confirmation_delete_heading').html('Delete Confirmation');
    $('#confirmation_delete_message').html('Are you sure want to delete the ' + textType + '.');
    $("#delete_confirmation_modal_pop").modal('show');
}

function confirmDeleteActions() {
    var hidcmid = $("#hidcmid").val();
    var hidcType = $("#hidcType").val();
    $("#successfullDelete").html('');
    $("#delete_confirmation_modal_pop").modal('hide');
    var url = baseUrl + 'Company/deleteCompaniesMethod?expireTime=' + time;
    $.ajax({
        type: "POST",
        url: url,
        cache: false,
        data: { hidcType: hidcType, hidcmid: hidcmid },
        dataType: "json",
        success: function(data) {
            console.log(data.output);
            if (data.output == 'success') {
                $("#successfullDelete").html('Company deleted successfully.');
                setTimeout(function() {
                    if (hidcType == 1) {
                        window.location = baseUrl + 'my-digital-assets';
                    } else {
                        window.location = baseUrl + 'my-ico-trackers';
                    }
                }, 2000);
            }
        }
    });
}

function contactMails() {
    $('#errMesg').html('');
    $('#s').html('');
    $("#sucess_msg").html('');
    var flag = true;
    $('#cont_us_mail').formValidation().on('success.form.fv', function(e) {
        e.stopImmediatePropagation();
        var message_sub = $("#message_sub").val();
        var type = $("#type").val();
        var email = $("#email").val();
        var body = $("#body").val();
        //alert(email);
        $.ajax({
            type: 'POST',
            url: baseUrl + '/Careers/contactMail?expireTime=' + time,
            data: { message_sub: message_sub, type: type, email: email, body: body },
            dataType: 'json',
            success: function(data) {
                console.log(data.output);
                if (data.output == 'success') {
                    $("#sucess_msg").html('Email sent sucessfully.');
                    setTimeout(function() {

                        window.location = baseUrl + 'contact-us';

                    }, 2000);
                } else {
                    $("#sucess_msg").html('Email sent failed.');
                }
            }
        });
        e.preventDefault();
    });
}

function subFeedback() {
    $('#err_msg').html('');
    $('#s').html('');
    $("#sucess_msg").html('');
    var flag = true;
    $('#suggeform').formValidation().on('success.form.fv', function(e) {
        e.stopImmediatePropagation();
        var feedbackemail = $("#feedbackemail").val();
        var comments = $("#comments").val();
        var countryid = $("#countryid").val();
        $.ajax({
            type: 'POST',
            url: baseUrl + '/Careers/feedbackMail?expireTime=' + time,
            data: { feedbackemail: feedbackemail, comments: comments, countryid: countryid },
            dataType: 'json',
            success: function(data) {
                console.log(data.output);
                if (data.output == 'success') {
                    $("#sucess_msg").html('Email sent sucessfully.');
                    setTimeout(function() {

                        window.location = baseUrl;

                    }, 2000);
                } else {
                    $("#err_msg").html('Email sent failed.');
                }
            }
        });
        e.preventDefault();
    });
}
/* function addEmail(){
	//alert();
	$('#successMsg').html('');
	var flag = true;
	$('#add_email').formValidation().on('success.form.fv', function(e) {
		e.stopImmediatePropagation();
		var email     = $("#email").val();
		$('#loadAddUser').show();
		$.ajax({
			type:'POST',
			url:  baseUrl+'/Careers/addEmails?expireTime='+time,
			data:{email:email},
			dataType	:	'json',
			success: function(data){
				console.log(data.output);
				if(data.output=='success'){
				$("#successMsg").html('Email added sucessfully.');
				setTimeout(function(){

						window.location=baseUrl;

				}, 1000);
			}
			}
		});
		e.preventDefault();
	});
} */
function subscriber() {
    $('#successMsg').html('');
    var email = $("#subemail").val();
    var flag = true;
    if (email == "") {
        $("#successMsg").html('Email Required').css("color", "#BD3518");
        flag = false;
    } else if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email))) {
        $("#successMsg").html('Please enter the correct email address').css("color", "#BD3518");
        flag = false;
    } else if (flag == true) {
        $("#successMsg").html('');
        $.ajax({
            type: 'POST',
            url: baseUrl + '/Careers/addEmails?expireTime=' + time,
            data: { email: email },
            dataType: 'json',
            success: function(data) {
                console.log(data.output);
                if (data.output == 'success') {
                    $("#successMsg").html('You have Successfully subscribed').css("color", "green");
                    setTimeout(function() {
                        window.location = baseUrl;
                    }, 1000);
                } else {
                    $("#successMsg").html('There is some error while adding your email, please contact us later').css("color", "#BD3518");

                }
            }
        });
    }
    //e.preventDefault();
    //});
}
