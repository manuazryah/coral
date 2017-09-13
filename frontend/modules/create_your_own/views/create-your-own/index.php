<?php
/* @var $this yii\web\View */
?>
<h1>create-your-own</h1>

<form role="forl" id="rootwizard" class="form-wizard validate" novalidate>

    <ul class="tabs">
        <li class="active">
            <a href="#fwv-1" data-toggle="tab">
                GENDER
                <span>1</span>
            </a>
        </li>
        <li>
            <a href="#fwv-2" data-toggle="tab">
                CHARACTER
                <span>2</span>
            </a>
        </li>
        <li>
            <a href="#fwv-3" data-toggle="tab">
                SCENT
                <span>3</span>
            </a>
        </li>
        <li>
            <a href="#fwv-4" data-toggle="tab">
                NOTES
                <span>4</span>
            </a>
        </li>
        <li>
            <a href="#fwv-5" data-toggle="tab">
                BOTTLE
                <span>5</span>
            </a>
        </li>
        <li>
            <a href="#fwv-5" data-toggle="tab">
                LABEL
                <span>6</span>
            </a>
        </li>
        <li>
            <a href="#fwv-5" data-toggle="tab">
                DONE
                <span>7</span>
            </a>
        </li>
    </ul>

    <div class="progress-indicator">
        <span></span>
    </div>

    <div class="tab-content no-margin">

        <!-- Tabs Content -->
        <div class="tab-pane with-bg active" id="fwv-1">

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="full_name">Full Name</label>
                        <input class="form-control" name="full_name" id="full_name" data-validate="required" placeholder="Your full name" />
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="birthdate">Date of Birth</label>
                        <input class="form-control"  name="birthdate" id="birthdate" data-validate="required" data-mask="date" placeholder="Pre-formatted birth date" />
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label" for="about">Write Something About You</label>
                        <textarea class="form-control autogrow" name="about" id="about" data-validate="minlength[10]" rows="5" placeholder="Could be used also as Motivation Letter"></textarea>
                    </div>
                </div>

            </div>

        </div>

        <div class="tab-pane with-bg" id="fwv-2">

            <div class="row">

                <div class="col-md-8">
                    <div class="form-group">
                        <label class="control-label" for="street">Street</label>
                        <input class="form-control" name="street" id="street" data-validate="required" placeholder="Enter your street address" />
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="door_no">Door no.</label>
                        <input class="form-control" name="door_no" id="door_no" data-validate="number" placeholder="Numbers only" />
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label" for="address_line_2">Address Line 2</label>
                        <input class="form-control" name="address_line_2" id="address_line_2" placeholder="(Optional) Secondary Address" />
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-5">
                    <div class="form-group">
                        <label class="control-label" for="city">City</label>
                        <input class="form-control" name="city" id="city" data-validate="required" placeholder="Current city" />
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="state">State</label>

                        <select name="test" class="selectboxit">
                            <optgroup label="United States">
                                <option value="1">Alabama</option>
                                <option value="2">Boston</option>
                                <option value="3">Ohaio</option>
                                <option value="4">New York</option>
                                <option value="5">Washington</option>
                            </optgroup>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="zip">Zip</label>
                        <input class="form-control"  name="zip" id="zip" data-mask="** *** **" data-validate="required" placeholder="Zip Code" />
                    </div>
                </div>

            </div>

        </div>

        <div class="tab-pane with-bg" id="fwv-3">

            <strong>Primary School</strong>
            <br />
            <br />


            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="prim_subject">Subject</label>
                        <input class="form-control" name="prim_subject" id="prim_subject" data-validate="require" placeholder="Graduation Degree" />
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="prim_school">School Name</label>
                        <input class="form-control" name="prim_school" id="prim_school" placeholder="Which school did you attended" />
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label" for="prim_date_start">Start Date</label>
                        <input class="form-control datepicker" name="prim_date_start" id="prim_date_start" data-start-view="2" placeholder="(Optional)" />
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label" for="prim_date_end">End Date</label>
                        <input class="form-control datepicker" name="prim_date_end" id="prim_date_end" data-start-view="2" placeholder="(Optional)" />
                    </div>
                </div>

            </div>

            <br />

            <strong>Secondary School</strong>
            <br />
            <br />

            <div class="row">

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="second_subject">Subject</label>
                        <input class="form-control" name="second_subject" id="second_subject" data-validate="require" placeholder="High School" />
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="second_school">School Name</label>
                        <input class="form-control" name="second_school" id="second_school" placeholder="Which school did you attended" />
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label" for="second_date_start">Start Date</label>
                        <input class="form-control datepicker" name="second_date_start" id="second_date_start" data-start-view="2" placeholder="(Optional)" />
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label" for="second_date_end">End Date</label>
                        <input class="form-control datepicker" name="second_date_end" id="second_date_end" data-start-view="2" placeholder="(Optional)" />
                    </div>
                </div>

            </div>

            <br />

            <div class="row">

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label" for="other_qualifications"><strong>Other Qualifications</strong></label>
                        <textarea class="form-control autogrow" name="other_qualifications" id="other_qualifications" placeholder="List one subject per row"></textarea>
                    </div>
                </div>

            </div>

        </div>

        <div class="tab-pane with-bg" id="fwv-4">

            <strong>Current &amp; Past Jobs</strong>
            <br />
            <br />

            <div class="row">

                <div class="col-md-1">
                    <label class="control-label">&nbsp;</label>
                    <p class="text-right">
                        <span class="label label-info">1</span>
                    </p>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="job_position_1">Company Name</label>
                        <input class="form-control" name="job_position_1" id="job_position_1" data-validate="require" placeholder="Your current job" />
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="job_position_1">Job Position</label>
                        <input class="form-control" name="job_position_1" id="job_position_1" data-validate="require" placeholder="Your current position" />
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label" for="job_position_start_date_1">Start Date</label>
                        <input class="form-control datepicker" name="job_position_start_date_1" id="job_position_start_date_1" placeholder="(Optional)" />
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label" for="job_position_end_date_1">End Date</label>
                        <input class="form-control datepicker" name="job_position_end_date_1" id="job_position_end_date_1" placeholder="(Optional)" />
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-1">
                    <label class="control-label">&nbsp;</label>
                    <p class="text-right">
                        <span class="label label-info">2</span>
                    </p>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="job_position_2">Company Name</label>
                        <input class="form-control" name="job_position_2" id="job_position_2" data-validate="require" placeholder="(Optional)" />
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="job_position_2">Job Position</label>
                        <input class="form-control" name="job_position_2" id="job_position_2" data-validate="require" placeholder="(Optional)" />
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label" for="job_position_start_date_2">Start Date</label>
                        <input class="form-control datepicker" name="job_position_start_date_2" id="job_position_start_date_2" placeholder="(Optional)" />
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label" for="job_position_end_date_2">End Date</label>
                        <input class="form-control datepicker" name="job_position_end_date_2" id="job_position_end_date_2" placeholder="(Optional)" />
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-1">
                    <label class="control-label">&nbsp;</label>
                    <p class="text-right">
                        <span class="label label-info">3</span>
                    </p>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="job_position_3">Company Name</label>
                        <input class="form-control" name="job_position_3" id="job_position_3" data-validate="require" placeholder="(Optional)" />
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="job_position_3">Job Position</label>
                        <input class="form-control" name="job_position_3" id="job_position_3" data-validate="require" placeholder="(Optional)" />
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label" for="job_position_start_date_3">Start Date</label>
                        <input class="form-control datepicker" name="job_position_start_date_3" id="job_position_start_date_3" placeholder="(Optional)" />
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label" for="job_position_end_date_3">End Date</label>
                        <input class="form-control datepicker" name="job_position_end_date_3" id="job_position_end_date_3" placeholder="(Optional)" />
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-1">
                    <label class="control-label">&nbsp;</label>
                    <p class="text-right">
                        <span class="label label-info">4</span>
                    </p>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label class="control-label" for="job_position_4">Company Name</label>
                        <input class="form-control" name="job_position_4" id="job_position_4" data-validate="require" placeholder="(Optional)" />
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label" for="job_position_4">Job Position</label>
                        <input class="form-control" name="job_position_4" id="job_position_4" data-validate="require" placeholder="(Optional)" />
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label" for="job_position_start_date_4">Start Date</label>
                        <input class="form-control datepicker" name="job_position_start_date_4" id="job_position_start_date_4" placeholder="(Optional)" />
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label class="control-label" for="job_position_end_date_4">End Date</label>
                        <input class="form-control datepicker" name="job_position_end_date_4" id="job_position_end_date_4" placeholder="(Optional)" />
                    </div>
                </div>

            </div>

        </div>

        <div class="tab-pane with-bg" id="fwv-5">

            <div class="form-group">
                <label class="control-label">Choose Username</label>

                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="linecons-user"></i>
                    </div>

                    <input type="text" class="form-control" name="username" id="username" data-validate="required,minlength[5]" data-message-minlength="Username must have minimum of 5 chars." placeholder="Could also be your email" />
                </div>
            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Choose Password</label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="linecons-lock"></i>
                            </div>

                            <input type="password" class="form-control" name="password" id="password" data-validate="required" placeholder="Enter strong password" />
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Repeat Password</label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="linecons-lock"></i>
                            </div>

                            <input type="password" class="form-control" name="password" id="password" data-validate="required,equalTo[#password]" data-message-equal-to="Passwords doesn't match." placeholder="Confirm password" />
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Include Services</label>

                        <select multiple="multiple" name="my-select[]" class="form-control multi-select">
                            <option value="1">Web Builder</option>
                            <option value="2" selected>Server Side Scripting</option>
                            <option value="3">Secure Connection</option>
                            <option value="4" selected>Database Access</option>
                            <option value="5" selected>Email</option>
                            <option value="6">eCommerce</option>
                            <option value="7">Royalty Free Photos</option>
                            <option value="8">WordPress Installation</option>
                            <option value="9">Magento Installation</option>
                            <option value="10">Reseller Account</option>
                            <option value="11">WHM Client</option>
                            <option value="12">Nginx</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Gender</label>

                        <br />

                        <input type="checkbox" class="iswitch iswitch-red" checked>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Subscribe for Newsletter</label>

                        <br />

                        <input type="checkbox" class="iswitch iswitch-purple" checked>
                    </div>

                    <div class="form-group">
                        <label class="control-label">
                            Auto-renew Subscription
                            <span class="label label-warning">Yearly</span>
                        </label>

                        <br />

                        <input type="checkbox" class="iswitch iswitch-secondary" checked>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <input type="checkbox" class="cbr" name="chk-rules" id="chk-rules" data-validate="required" data-message-message="You must accept rules in order to complete this registration.">
                <label for="chk-rules">By registering I accept terms and conditions.</label>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Finish Registration</button>
            </div>

        </div>

        <div class="tab-pane with-bg" id="fwv-6">

            <div class="form-group">
                <label class="control-label">Choose Username</label>

                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="linecons-user"></i>
                    </div>

                    <input type="text" class="form-control" name="username" id="username" data-validate="required,minlength[5]" data-message-minlength="Username must have minimum of 5 chars." placeholder="Could also be your email" />
                </div>
            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Choose Password</label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="linecons-lock"></i>
                            </div>

                            <input type="password" class="form-control" name="password" id="password" data-validate="required" placeholder="Enter strong password" />
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Repeat Password</label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="linecons-lock"></i>
                            </div>

                            <input type="password" class="form-control" name="password" id="password" data-validate="required,equalTo[#password]" data-message-equal-to="Passwords doesn't match." placeholder="Confirm password" />
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Include Services</label>

                        <select multiple="multiple" name="my-select[]" class="form-control multi-select">
                            <option value="1">Web Builder</option>
                            <option value="2" selected>Server Side Scripting</option>
                            <option value="3">Secure Connection</option>
                            <option value="4" selected>Database Access</option>
                            <option value="5" selected>Email</option>
                            <option value="6">eCommerce</option>
                            <option value="7">Royalty Free Photos</option>
                            <option value="8">WordPress Installation</option>
                            <option value="9">Magento Installation</option>
                            <option value="10">Reseller Account</option>
                            <option value="11">WHM Client</option>
                            <option value="12">Nginx</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Gender</label>

                        <br />

                        <input type="checkbox" class="iswitch iswitch-red" checked>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Subscribe for Newsletter</label>

                        <br />

                        <input type="checkbox" class="iswitch iswitch-purple" checked>
                    </div>

                    <div class="form-group">
                        <label class="control-label">
                            Auto-renew Subscription
                            <span class="label label-warning">Yearly</span>
                        </label>

                        <br />

                        <input type="checkbox" class="iswitch iswitch-secondary" checked>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <input type="checkbox" class="cbr" name="chk-rules" id="chk-rules" data-validate="required" data-message-message="You must accept rules in order to complete this registration.">
                <label for="chk-rules">By registering I accept terms and conditions.</label>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Finish Registration</button>
            </div>

        </div>

        <div class="tab-pane with-bg" id="fwv-7">

            <div class="form-group">
                <label class="control-label">Choose Username</label>

                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="linecons-user"></i>
                    </div>

                    <input type="text" class="form-control" name="username" id="username" data-validate="required,minlength[5]" data-message-minlength="Username must have minimum of 5 chars." placeholder="Could also be your email" />
                </div>
            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Choose Password</label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="linecons-lock"></i>
                            </div>

                            <input type="password" class="form-control" name="password" id="password" data-validate="required" placeholder="Enter strong password" />
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Repeat Password</label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="linecons-lock"></i>
                            </div>

                            <input type="password" class="form-control" name="password" id="password" data-validate="required,equalTo[#password]" data-message-equal-to="Passwords doesn't match." placeholder="Confirm password" />
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Include Services</label>

                        <select multiple="multiple" name="my-select[]" class="form-control multi-select">
                            <option value="1">Web Builder</option>
                            <option value="2" selected>Server Side Scripting</option>
                            <option value="3">Secure Connection</option>
                            <option value="4" selected>Database Access</option>
                            <option value="5" selected>Email</option>
                            <option value="6">eCommerce</option>
                            <option value="7">Royalty Free Photos</option>
                            <option value="8">WordPress Installation</option>
                            <option value="9">Magento Installation</option>
                            <option value="10">Reseller Account</option>
                            <option value="11">WHM Client</option>
                            <option value="12">Nginx</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label">Gender</label>

                        <br />

                        <input type="checkbox" class="iswitch iswitch-red" checked>
                    </div>

                    <div class="form-group">
                        <label class="control-label">Subscribe for Newsletter</label>

                        <br />

                        <input type="checkbox" class="iswitch iswitch-purple" checked>
                    </div>

                    <div class="form-group">
                        <label class="control-label">
                            Auto-renew Subscription
                            <span class="label label-warning">Yearly</span>
                        </label>

                        <br />

                        <input type="checkbox" class="iswitch iswitch-secondary" checked>
                    </div>
                </div>

            </div>

            <div class="form-group">
                <input type="checkbox" class="cbr" name="chk-rules" id="chk-rules" data-validate="required" data-message-message="You must accept rules in order to complete this registration.">
                <label for="chk-rules">By registering I accept terms and conditions.</label>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Finish Registration</button>
            </div>

        </div>


        <!-- Tabs Pager -->

        <ul class="pager wizard">
            <li class="previous">
                <a href="#"><i class="entypo-left-open"></i> Previous</a>
            </li>

            <li class="next">
                <a href="#">Next <i class="entypo-right-open"></i></a>
            </li>
        </ul>

    </div>

</form>
