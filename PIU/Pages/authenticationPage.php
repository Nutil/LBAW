<div class = "container">

    <?php render('breadcrumb') ?>

    <div class = "col-sm-8 col-sm-offset-2">

        <!-- TABS START -->
        <ul class = "nav nav-tabs">
            <li class = "active">
                <a href = "#login" aria-controls = "login" role = "tab" data-toggle = "tab">Log In</a>
            </li>
            <li>
                <a href = "#register" aria-controls = "register" role = "tab" data-toggle = "tab">Sign Up</a>
            </li>
        </ul>
        <!-- END TABS -->

        <!-- TAB CONTENT -->
        <div class = "tab-content">

            <!-- LOGIN TAB PANEL -->
            <div id = "login" role = "tabpanel" class = "tab-pane active container-white">
                <form class = "form-horizontal">
                    <div class = "form-group">
                        <label for = "email" class = "col-sm-3 control-label">Email</label>
                        <div class = "col-sm-8">
                            <input type = "email" name = "email" class = "form-control" placeholder = "Email address" required = "" autofocus = "" autocomplete = "off">
                        </div>
                    </div>

                    <div class = "form-group">
                        <label for = "password" class = "col-sm-3 control-label">Password</label>
                        <div class = "col-sm-8">
                            <input type = "password" name = "password" class = "form-control" placeholder = "Password" required = "" autocomplete = "off">
                        </div>
                    </div>

                    <div class = "form-group">
                        <div class = "col-sm-3 col-sm-offset-3">
                            <a href = "?logged&notification=success">
                                <button class = "btn btn-primary" type = "button">Log In</button>
                            </a>
                        </div>
                        <div class = "col-sm-5 text-right">
                            <a href = "" class = "small" data-toggle = "modal" data-target = "#forgotPassword"> Forgot Password?</a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END LOGIN TAB PANEL -->

            <!-- REGISTER TAB PANEL -->
            <div role = "tabpanel" class = "tab-pane container-white" id = "register">
                <form class = "form-horizontal">
                    <div class = "form-group">
                        <label for = "email" class = "col-sm-3 control-label">Email</label>
                        <div class = "col-sm-8">
                            <input type = "email" name = "email" class = "form-control" placeholder = "Email address" required = "" autofocus = "" autocomplete = "off">
                        </div>
                    </div>

                    <div class = "form-group">
                        <label for = "username" class = "col-sm-3 control-label">Username</label>
                        <div class = "col-sm-8">
                            <input type = "text" name = "username" class = "form-control" placeholder = "Username" required = "" autofocus = "" autocomplete = "off">
                        </div>
                    </div>

                    <div class = "form-group">
                        <label for = "password" class = "col-sm-3 control-label">Password</label>
                        <div class = "col-sm-8">
                            <input type = "password" name = "password" class = "form-control" placeholder = "Password" required = "" autocomplete = "off">
                        </div>
                    </div>

                    <div class = "form-group">
                        <label for = "passwordConfirm" class = "col-sm-3 control-label">Confirm Password</label>
                        <div class = "col-sm-8">
                            <input type = "password" name = "passwordConfirm" class = "form-control" placeholder = "Confirm Password" required = "" autocomplete = "off">
                        </div>
                    </div>

                    <div class = "form-group">
                        <div class = "col-sm-3 col-sm-offset-3">
                            <a href = "?page=auth&notification=success">
                                <button class = "btn btn-primary" type = "button">Sign Up</button>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- END REGISTER TAB PANEL -->
        </div>
        <!-- END TAB CONTENT -->
    </div>

    <!-- FORGOT PASSWORD MODAL -->
    <div class = "modal fade" id = "forgotPassword" tabindex = "-1" role = "dialog" aria-labelledby = "exampleModalLabel">
        <div class = "modal-dialog" role = "document">
            <form>
                <div class = "modal-content">
                    <div class = "modal-header">
                        <button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close">
                            <span aria-hidden = "true">&times;</span></button>
                        <h4 class = "modal-title" id = "exampleModalLabel">Forgot Password?</h4>
                    </div>
                    <div class = "modal-body">
                        <form>
                            <div class = "form-group">
                                <label for = "email" class = "control-label">Email:</label>
                                <input type = "text" class = "form-control" id = "email" placeholder = "Type email address">
                            </div>
                        </form>
                    </div>
                    <div class = "modal-footer">
                        <a href = "?page=forgot">
                            <button type = "button" class = "btn btn-primary">Request</button>
                        </a>
                        <button type = "button" class = "btn btn-default" data-dismiss = "modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type = "text/javascript">
    $(document).ready(function () {
        $('#forgotPassword').on('shown.bs.modal', function () {
            $('#email').focus()
        });
    });

</script>
<!-- END FORGOT PASSWORD MODAL -->