<div class="modal fade" id="addFaqForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form  name="add_faq" class="form-horizontal" method="POST" action="">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add new FAQ</h4>
                </div>

                <div class="modal-body panel-body">
                    <div class="form-group" >
                        <label class="col-sm-1 control-label" style="font-weight: bold;">Question</label>
                        <div class="col-sm-12">
                            <input name="question" type="text" class="form-control input-medium" value="" required/>
                        </div>
                    </div>
                    
                    <label class="control-label" style="font-weight: bold;">Answer</label>
                     <div class="col-md-12" >
                         
                            <textarea rows="10" name="answer" style="width: 90%"></textarea>

                            
                        </div>
                </div>
                <div class="modal-footer" style="padding: 10px 10px 10px;margin-top: 0;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" value="add_faq" name="add_faq" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="addCountryForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form  name="add_country" class="form-horizontal" method="POST" action="">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add new Country</h4>
                </div>

                <div class="modal-body panel-body">
                    <div class="form-group" >
                        <label class="col-sm-3 control-label" style="font-weight: bold;">Name</label>
                        <div class="col-sm-6">
                            <input name="country_name" type="text" class="form-control input-medium" value="" required/>
                        </div>
                    </div>
                     <div class="form-group" >
                        <label class="col-sm-3 control-label" style="font-weight: bold;">Country Code</label>
                        <div class="col-sm-6">
                            <input name="country_code" type="text" class="form-control input-medium" value="" required/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding: 10px 10px 10px;margin-top: 0;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" value="add_country" name="add_country" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="addIndustryForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form  name="add_country" class="form-horizontal" method="POST" action="">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add new Industry</h4>
                </div>

                <div class="modal-body panel-body">
                    <div class="form-group" >
                        <label class="col-sm-3 control-label" style="font-weight: bold;">Name</label>
                        <div class="col-sm-6">
                            <input name="industry_name" type="text" class="form-control input-medium" value="" required/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding: 10px 10px 10px;margin-top: 0;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" value="add_industry" name="add_industry" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="addStateForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form  name="add_state" class="form-horizontal" method="POST" action="">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add new State</h4>
                </div>

                <div class="modal-body panel-body">
                    <div class="form-group" >
                        <label class="col-sm-3 control-label" style="font-weight: bold;">Name</label>
                        <div class="col-sm-6">
                            <input name="state_name" type="text" class="form-control input-medium" value="" required/>
                        </div>
                    </div>
                    <div class="form-group" >
                        <label class="col-sm-3 control-label" style="font-weight: bold;">Country</label>
                        <div class="col-sm-6">
                            <select name="state_country" id="ajaxcall_select_category_services" class="form-control category_listing_select select3" style="width:100% !important">
                                <?php foreach ($countries as $country) { ?>

                                    <option value = "<?= $country->country_id; ?>" ><?= $country->country_name; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer" style="padding: 10px 10px 10px;margin-top: 0;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" value="add_state" name="add_state" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="addCityForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form  name="add_city" class="form-horizontal" method="POST" action="">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add new City</h4>
                </div>

                <div class="modal-body panel-body">
                    <div class="form-group" >
                        <label class="col-sm-3 control-label" style="font-weight: bold;">Name</label>
                        <div class="col-sm-6">
                            <input name="city_name" type="text" class="form-control input-medium" value="" required/>
                        </div>
                    </div>
                    <div class="form-group" >
                        <label class="col-sm-3 control-label" style="font-weight: bold;">State</label>
                        <div class="col-sm-6">
                            <select name="city_state" id="ajaxcall_select_category_services" class="form-control category_listing_select select3" style="width:100% !important">
                                <?php foreach ($states as $state) { ?>

                                    <option value = "<?= $state->state_id; ?>" ><?= $state->state_name; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="modal-footer" style="padding: 10px 10px 10px;margin-top: 0;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" value="add_city" name="add_city" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<div class="modal fade" id="addBusinessTypeForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form  name="add_business_type" class="form-horizontal" method="POST" action="">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add new Business Type</h4>
                </div>

                <div class="modal-body panel-body">
                    <div class="form-group" >
                        <label class="col-sm-3 control-label" style="font-weight: bold;">Business Name</label>
                        <div class="col-sm-6">
                            <input name="business_type_name" type="text" class="form-control input-medium" value="" required/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding: 10px 10px 10px;margin-top: 0;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" value="add_business_type" name="add_business_type" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="addQuestionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form  name="add_question" class="form-horizontal" method="POST" action="">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add new Question</h4>
                </div>

                <div class="modal-body panel-body">
                    <div class="form-group" >
                        <label class="col-sm-3 control-label" style="font-weight: bold;">Security Question</label>
                        <div class="col-sm-8">
                            <input name="security_question" type="text" class="form-control input-large" value="" required/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding: 10px 10px 10px;margin-top: 0;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" value="add_security_question" name="add_security_question" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="addDepartmentForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form  name="add_department" class="form-horizontal" method="POST" action="">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add New Department</h4>
                </div>

                <div class="modal-body panel-body">
                    <div class="form-group" >
                        <label class="col-sm-3 control-label" style="font-weight: bold;">Department Name</label>
                        <div class="col-sm-6">
                            <input name="department_name" type="text" class="form-control input-medium" value="" required/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding: 10px 10px 10px;margin-top: 0;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" value="add_department" name="add_department" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="addPaymentTermForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form  name="add_payment_type" class="form-horizontal" method="POST" action="">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add new Payment Type</h4>
                </div>

                <div class="modal-body panel-body">
                    <div class="form-group" >
                        <label class="col-sm-3 control-label" style="font-weight: bold;">Name</label>
                        <div class="col-sm-6">
                            <input name="p_term_description" type="text" class="form-control input-medium" value="" required/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding: 10px 10px 10px;margin-top: 0;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" value="add_payment_term" name="add_payment_term" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="update_business_type" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form  name="update_business_type" class="form-horizontal" method="POST" action="">
                    <input type="hidden" id="business_type_id" name="business_type_id">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Business Type</h4>
                </div>
                <div class="modal-body panel-body">

                    <div class="form-group" >
                        <label class="col-sm-3 control-label" style="font-weight: bold;">Business Name</label>
                        <div class="col-sm-6">
                            <input id="business_type_name" name="business_type_name" type="text" class="form-control input-medium" required="required"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding: 10px 10px 10px;margin-top: 0;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="update" value="update" name="edit_business_type" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="update_security_question" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form  name="edit_security_question" class="form-horizontal" method="POST" action="">
                    <input type="hidden" id="id" name="id">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Security Question</h4>
                </div>
                <div class="modal-body panel-body">

                    <div class="form-group" >
                        <label class="col-sm-3 control-label" style="font-weight: bold;">Question</label>
                        <div class="col-sm-6">
                            <input id="security_question" name="security_question" type="text" class="form-control input-medium" required="required"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding: 10px 10px 10px;margin-top: 0;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="update" value="update" name="edit_security_question" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editCountry" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form  name="edit_country" class="form-horizontal" method="POST" action="">
                    <input type="hidden" id="country_id" name="country_id">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Country</h4>
                </div>
                <div class="modal-body panel-body">

                    <div class="form-group" >
                        <label class="col-sm-3 control-label" style="font-weight: bold;">Name</label>
                        <div class="col-sm-6">
                            <input id="country_name" name="country_name" type="text" class="form-control input-medium" required="required"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding: 10px 10px 10px;margin-top: 0;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="update" value="update" name="edit_country" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editFaq" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form  name="edit_faq" class="form-horizontal" method="POST" action="">
                    <input type="hidden" id="faq_id" name="faq_id">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit FAQ</h4>
                </div>
                <div class="modal-body panel-body">
                    <div class="form-group" >
                        <label class="col-sm-1 control-label" style="font-weight: bold;">Question</label>
                        <div class="col-sm-12">
                            <input id="question" name="question" type="text" class="form-control input-medium" value="" required/>
                        </div>
                    </div>
                    
                    <label class="control-label" style="font-weight: bold;">Answer</label>
                     <div class="col-md-12" >
                         
                            <textarea id="faq_answer" rows="10" name="answer" style="width: 90%"></textarea>

                            
                        </div>
                </div>
                <div class="modal-footer" style="padding: 10px 10px 10px;margin-top: 0;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="update" value="update" name="edit_faq" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editIndustry" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form  name="edit_industry" class="form-horizontal" method="POST" action="">
                    <input type="hidden" id="industry_id" name="industry_id">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Industry</h4>
                </div>
                <div class="modal-body panel-body">

                    <div class="form-group" >
                        <label class="col-sm-3 control-label" style="font-weight: bold;">Name</label>
                        <div class="col-sm-6">
                            <input id="industry_name" name="industry_name" type="text" class="form-control input-medium" required="required"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding: 10px 10px 10px;margin-top: 0;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="update" value="update" name="edit_industry" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editState" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form  name="edit_state" class="form-horizontal" method="POST" action="">
                    <input type="hidden" id="state_id" name="state_id">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit State</h4>
                </div>
                <div class="modal-body panel-body">

                    <div class="form-group" >
                        <label class="col-sm-3 control-label" style="font-weight: bold;">Name</label>
                        <div class="col-sm-6">
                            <input id="state_name" name="state_name" type="text" class="form-control input-medium" required="required"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding: 10px 10px 10px;margin-top: 0;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="update" value="update" name="edit_state" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="rejectJob" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form  name="reject_job" class="form-horizontal" method="POST" action="">
                    <input type="hidden" id="job_id" name="job_id">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Rejection Reason</h4>
                </div>
                <div class="modal-body panel-body">

                    <div class="form-group" >
                        <label class="col-sm-3 control-label" style="font-weight: bold;">Reason</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" id="reject_reason" name="reject_reason" style="height: 150px;"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding: 10px 10px 10px;margin-top: 0;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="update" value="update" name="reject_job_submit" class="btn btn-primary">Go</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editCity" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form  name="edit_city" class="form-horizontal" method="POST" action="">
                    <input type="hidden" id="state_id" name="city_id">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit City</h4>
                </div>
                <div class="modal-body panel-body">

                    <div class="form-group" >
                        <label class="col-sm-3 control-label" style="font-weight: bold;">Name</label>
                        <div class="col-sm-6">
                            <input id="city_name" name="city_name" type="text" class="form-control input-medium" required="required"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding: 10px 10px 10px;margin-top: 0;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="update" value="update" name="edit_state" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editDepartment" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form  name="edit_department" class="form-horizontal" method="POST" action="">
                    <input type="hidden" id="department_id" name="id">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Department</h4>
                </div>
                <div class="modal-body panel-body">

                    <div class="form-group" >
                        <label class="col-sm-3 control-label" style="font-weight: bold;">Department Name</label>
                        <div class="col-sm-6">
                            <input id="department_name" name="department_name" type="text" class="form-control input-medium" required="required"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding: 10px 10px 10px;margin-top: 0;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="update" value="update" name="edit_department" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editPaymentType" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form  name="edit_payment_type" class="form-horizontal" method="POST" action="">
                    <input type="hidden" id="p_term_id" name="p_term_id">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Country</h4>
                </div>
                <div class="modal-body panel-body">

                    <div class="form-group" >
                        <label class="col-sm-3 control-label" style="font-weight: bold;">Name</label>
                        <div class="col-sm-6">
                            <input id="p_term_description" name="p_term_description" type="text" class="form-control input-medium" required="required"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding: 10px 10px 10px;margin-top: 0;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="update" value="update" name="edit_payment" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editCategoty" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <form  name="edit_country" class="form-horizontal" method="POST" action="">
                    <input type="hidden" id="category_id" name="category_id">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Category</h4>
                </div>
                <div class="modal-body panel-body">

                    <div class="form-group" >
                        <label class="col-sm-3 control-label" style="font-weight: bold;">Name</label>
                        <div class="col-sm-6">
                            <input id="category_name" name="category_name" type="text" class="form-control input-medium" required="required"/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="padding: 10px 10px 10px;margin-top: 0;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="update" value="update" name="edit_category" class="btn btn-primary">Save</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
