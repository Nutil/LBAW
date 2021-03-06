$(document).ready(function () {
    $(".load-more").on('click', function () {
        var next_page = $(this).data('next-page');
        var tab = $(this).data('tab');

        $.get($(this).data('url') + '?tab=' + tab + '&page=' + next_page, function (data) {
            addNewQuestions($.parseJSON(data));
        });
        $(this).data('next-page', parseInt(next_page) + 1);
    });
});

function addNewQuestions(objects) {
    var chunks = arrayChunk(objects, 2);

    $.each(chunks, function (j, chunk) {
        var lastItem = $('div.active[role="tabpanel"] .question-line:last');
        var newLine = lastItem.clone(true);
        $.each(chunk, function (i, object) {
            var newObject = newLine.find('.question-col:eq(' + i + ')');

            newObject.find('.question-info-container').attr('data-id', object.id);
            newObject.find('.vote-count').html(object.votes);
            updateTitleAndLink(newObject.find('.question-title'), object);
            updateBodyAndLink(newObject.find('.question-body'), object);
            updateUsername(newObject.find('.question-user'), object);
            updateSolvedStatus(newObject.find('.question-solved-status'), object.solved);
            updateDate(newObject.find('.question-updated-at'), object);
            updateNumberAnswers(newObject.find('.question-answers'), object.number_answers);
            updateVotes(newObject.find('.vote.chev'), object);
        });

        lastItem.after(newLine);
    });
}

function updateVotes(votes, object) {
    votes.attr('data-id', object.id);

    votes.find('.increment').removeClass('active');

    if(object.voted == 1) {
        $('.increment.up', votes).addClass('active');
    }

    if(object.voted == -1) {
        $('.increment.down', votes).addClass('active');
    }
}

function updateTitleAndLink(questionTitle, object) {
    questionTitle.attr('href', questionTitle.data('base-question-url') + object.id);
    questionTitle.html(object.title);
}

function updateUsername(userObject, object) {
    userObject.attr('href', userObject.data('url') + object.user_id);
    userObject.html(object.username);
}

function updateBodyAndLink(questionTitle, object) {
    questionTitle.attr('href', questionTitle.data('base-question-url') + object.id);
    questionTitle.html(object.body);
}

function updateSolvedStatus(solvedObject, solved) {
    solvedObject.removeClass('text-success text-danger').addClass(solved ? 'text-success' : 'text-danger');
    solvedObject.find('span').html(solved ? 'Solved' : 'Not Solved');
}

function updateNumberAnswers(questionAnswers, number) {
    var answer = number + ' answer';
    if (number != 1) answer += 's';
    questionAnswers.html(answer);
}

function updateDate(questionDate, object) {
    if (object.updated_at === null || object.updated_at == '')
        questionDate.html(object.created_at);
    else
        questionDate.html(object.updated_at);
}

function arrayChunk(array, size) {
    //declare vars
    var output = [];
    var i = 0; //the loop counter
    var n = 0; //the index of array chunks

    for (var item in array) {

        //if i is > size, iterate n and reset i to 0
        if (i >= size) {
            i = 0;
            n++;
        }

        //set a value for the array key if it's not already set
        if (!output[n] || output[n] == 'undefined') {
            output[n] = [];
        }

        output[n][i] = array[item];

        i++;

    }

    return output;

}
;