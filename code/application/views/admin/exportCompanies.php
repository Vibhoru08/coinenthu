<div class="content-wrapper">
<section class="content">
    <div class="row">
     <div class="col-md-12">
        <div class="box">
            <section class="content-header">
              <h1>
             Export Companies
              </h1>
              <ol class="breadcrumb">
                <li class="" style="margin-top:-10px;"><a href="<?php echo $baseUrl?>user-management" class="btn btn-info pull-right" style="color:#fff;"><i class="glyphicon glyphicon-arrow-left"></i> Back</a></li>
              </ol>
            </section>
            
            <form class="form-horizontal" method="POST" name="exportCompanies" id="exportCompanies" enctype="multipart/form-data"  data-fv-message="This value is not valid"
                  data-fv-icon-valid="glyphicon"
                  data-fv-icon-invalid="glyphicon"
                  data-fv-icon-validating="glyphicon glyphicon-refresh" onSubmit="exportCompaniesOn();">
                  <div class="box-body mandatory_color">
                      <div class="col-md-9">                   
                            <div class="form-group">
                              <label for="excelFile" class="col-sm-3 control-label">Export Data<sup>*</sup></label>
                              <div class="col-sm-8">
                              <input type="radio" id="companyType" name="companyType" value="1" checked> Digital Assets<br>
                              <input type="radio" id="companyType" name="companyType" value="2"> ICO Trackers<br>
                              </div>
                            </div>			
                        </div>					
                    </div>
                    
              <div class="clearfix"></div>
              <div class="box-footer">
                  <span id="exportMsg"></span>
                  <span id="exportLoader"  style="float:left;display:none"><i class="fa fa-refresh fa-spin"></i></span>
                <button type="submit" class="btn btn-info pull-right">Save</button>
                <a href="<?php echo $baseUrl?>user-management"><button type="button" class="btn btn-default pull-right" style="margin-right:10px;">Cancel</button></a>
              </div>
              
            </form>
            <!-- Form End -->
        </div>
        </div>
        </div>
     </section>
</div>
<script>
$(document).ready(function() {
    $('#exportCompanies').formValidation();
});
</script>