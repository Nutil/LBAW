<div class = "col-sm-11 container-white answer-info-container  pull-right sizeSelector" data-id="{$answer['id']}">
    <div class = "col-sm-2">
        {$votable_type='a'}
        {if $LOGGED_IN}
            {include file="answers/partials/answer_vote_panel.tpl"}
        {else}

            {include file="questions/partials/show_count.tpl"}
        {/if}
    </div>

    <div class = "col-sm-10">
        <p class = "answer-description">
            {nl2br($answer['body'])}
        </p>

        <div class = "options pull-right{if !$answer['isMine']} hidden{/if}">
            <button class = "btn btn-primary btn-xs edit-answer" data-url = "{editAnswerUrl('')}">Edit</button>
        </div>
    </div>

    <div class = "statistics col-sm-12 text-center">
        <span>
            <i class = "glyphicon glyphicon-user"></i>
            <a href = "{profileUrl($answer['user_id'])}" class = "question-body question-title"">
                {$answer['username']}
            </a>
        </span>
        <span>
            <i class = "glyphicon glyphicon-time"></i>
            <span class = "answer-updated-at">
                {if $answer['updated_at']}
                    {$answer['updated_at']}
                {else}
                    {$answer['created_at']}
                {/if}</span>
        </span>

    </div>
</div>