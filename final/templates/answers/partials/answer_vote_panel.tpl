<blockquote class="vote-up-down text-right">
    <div class="vote chev" data-type="a" data-id="{$answer['id']}">

        <div class="increment up{if $answer['voted' == 1]} active{/if}"></div>
        <div class="increment down{if $answer['voted' == -1]} active{/if}"></div>

        <div class="count vote-count" id="value">
            {$answer['votes']}
        </div>
    </div>

</blockquote>