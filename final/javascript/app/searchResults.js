$(document).ready(function () {
    var next_page = 1;
    $("#load_more_questions").on('click', function () {
        $.get($(this).data('url') + '?query={$query}&page=' + next_page, function (data) {
            addNewQuestions($.parseJSON(data));
            next_page++;
        });
    });
});

function addNewQuestions(objects) {
    $.each(objects, function (i, object) {
        var newObject = $('.question-info-container:last-child').clone(true);

        newObject.attr('data-id', object.id);
        newObject.find('.vote-count').html(object.votes);
        updateTitleAndLink(newObject.find('.question-title'), object);
        updateBodyAndLink(newObject.find('.question-body'), object);
        updateUsername(newObject.find('.question-user'), object);
        updateSolvedStatus(newObject.find('.question-solved-status'), object.solved);
        updateDate(newObject.find('.question-updated-at'), object);
        updateNumberAnswers(newObject.find('.question-answers'), object.number_answers);
        updateVotes(newObject.find('.vote.chev'), object);

        $('.question-space').append(newObject);
    });
}

function updateVotes(votes, object) {
    votes.data('id', object.id);

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