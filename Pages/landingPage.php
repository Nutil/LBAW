<?= HTML::style("css/landing-page.css") ?>

<div class = "intro-header">
    <div class = "row">
        <div class = "col-lg-12">
            <div class = "intro-message">
                <h1>Tidder</h1>
                <hr class = "intro-divider">
                <ul class = "list-inline intro-social-buttons">
                    <li>
                        <a href = "https://fe.up.pt/" class = "btn btn-default btn-lg"><i class = "fa fa-twitter fa-fw"></i>
                            <span class = "network-name">FEUP</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class = "container">

    <ul class = "nav nav-tabs" id="questions">
        <li class = "active">
            <a href = "#latest" aria-controls = "latest" role = "tab" data-toggle = "tab">Latest Questions</a>
        </li>
        <li>
            <a href = "#answered" aria-controls = "answered" role = "tab" data-toggle = "tab">Recently Answered</a>
        </li>
        <li>
            <a href = "#week" aria-controls = "week" role = "tab" data-toggle = "tab">Past Week</a>
        </li>
        <li>
            <a href = "#month" aria-controls = "month" role = "tab" data-toggle = "tab">Past Month</a>
        </li>
    </ul>

    <!-- TAB CONTENT -->
    <div class = "tab-content" style = "margin-top: 1em;">
        <div id = "latest" role = "tabpanel" class = "tab-pane active">
            <div class = "row">
                <div class = "col-sm-6">
                    <div class = "col-sm-12 question">
                        <h3>Check JS variable for both not null and true</h3>
                        <p class = "question-description">
                            What is the best way to check if a javascript variable is both not null and true?<br>
                        </p>

                        <div class = "statistics">
                        <span class="text-danger">
                            <i class = "glyphicon glyphicon-remove"></i>
                            Not Solved
                        </span>
                        <span>
                            <i class = "glyphicon glyphicon-time"></i>
                            1 min ago
                        </span>
                        <span class="text-star">
                            <i class = "glyphicon glyphicon-star"></i>
                            6 follows
                        </span>
                        <span>
                            <i class = "glyphicon glyphicon-comment"></i>
                            1 answer
                        </span>
                        </div>
                    </div>
                </div>

                <div class = "col-sm-6">
                    <div class = "col-sm-12 question">
                        <h3>twitter bootstrap grid system. Spacing between columns</h3>
                        <p class = "question-description">Im sure there is a simple solution to this problem. Basically if I have two columns how can i add a space between them.</p>

                        <div class = "statistics">
                        <span class="text-success">
                            <i class = "glyphicon glyphicon-ok"></i>
                            Not Solved
                        </span>
                        <span>
                            <i class = "glyphicon glyphicon-time"></i>
                            10 min ago
                        </span>
                        <span class="text-star">
                            <i class = "glyphicon glyphicon-star"></i>
                            6 follows
                        </span>
                        <span>
                            <i class = "glyphicon glyphicon-comment"></i>
                            1 answer
                        </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>