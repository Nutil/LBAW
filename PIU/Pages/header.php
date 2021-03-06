<nav class = "navbar navbar-default">
    <div class="container">
    <div class = "container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class = "navbar-header">
            <button type = "button" class = "navbar-toggle collapsed" data-toggle = "collapse" data-target = "#bs-example-navbar-collapse-1" aria-expanded = "false">
                <span class = "sr-only">Toggle navigation</span>
                <span class = "icon-bar"></span>
                <span class = "icon-bar"></span>
                <span class = "icon-bar"></span>
            </button>
            <a class = "navbar-brand" href = "/" style = "padding: 2px 0">
                <img src = "<?= resource("logo.png") ?>" height = "100%">
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class = "collapse navbar-collapse" id = "bs-example-navbar-collapse-1">
            <ul class = "nav navbar-nav navbar-right">
                <?php
                importHeaderRightComponent();
                ?>
                <form class = "navbar-form navbar-left" role = "search">
                    <div class = "form-group">
                        <input type = "text" class = "form-control navbar-search" placeholder = "Search">
                    </div>
                    <a href = "?page=search">
                        <button type = "button" class = "search-submit">
                            <span class = "glyphicon glyphicon-search"></span>
                        </button>
                    </a>
                </form>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
    </div>
</nav>

 